<?php

namespace App\Http\Livewire;

use App\Models\Atribut;
use App\Models\CripsDetail;
use App\Models\Kriteria;
use App\Models\Kandidat;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Auth;

class KandidatComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $kandidat;
    public $kandidat_id, $nim, $nama, $ipk, $keaktifan, $pengalaman_menjabat, $kesehatan, $komunikasi, $problem_solving, $kedisiplinan, $visi_misi;
    public $kriterias;
    public $isModal = 0;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function openModal()
    {
        $this->isModal = 1;
    }
    public function closeModal()
    {
        $this->isModal = 0;
    }

    
    public function renderData()
    {
        $session_id = Auth::user()->id;
        // $this->kandidat = Kandidat::where([
        //     ['id_user', '=', $session_id],
        // ])->get();
        $this->kriterias = Kriteria::all();
    }

    public function renderUser()
    {
        // $session_id = Auth::user()->id;
        // $this->kandidat = Kandidat::where([
        //     ['id_user', '=', $session_id],
        // ])->get();
        $user = new Kandidat();
        if ($this->search) $user = $user->where(function($user) {
            return $user->where('nim', 'like', '%'.$this->search.'%')
                ->orWhere('nama', 'like', '%'.$this->search.'%');
        });

        return $user->paginate(5);
    }
    
    public function render()
    {
        $this->renderData();
        return view('livewire.kandidat-component', [
            'users' => $this->renderUser()
        ]);
    }

    protected function rules() {
        return [
            'nim' => 'required|max:8|unique:kandidat,nim,' . $this->kandidat_id,
            'nama' => 'required|string|max:255',
            'ipk' => 'required|numeric|max:100',
            'keaktifan' => 'required|numeric|max:100',
            'pengalaman_menjabat' => 'required|numeric|max:100',
            'kesehatan' => 'required|numeric|max:100',
            'komunikasi' => 'required|numeric|max:100',
            'problem_solving' => 'required|numeric|max:100',
            'kedisiplinan' => 'required|numeric|max:100',
            'visi_misi' => 'required|numeric|max:100'
        ];
    }

    protected function messages() {
        return[
            'nim.unique' => 'Nim Sudah Ada!!',
            'nim.required' => 'Nim Wajib Diisi !',
        ];

    }

    public function simpan()
    {
        $validatedData = $this->validate();

        DB::beginTransaction();
        $kandidat_id = $this->kandidat_id;
        $session_id = Auth::user()->id;
        $kandidat = Kandidat::updateOrCreate([
            'id' => $kandidat_id,
            'id_user' => $session_id
        ], [
            'nim' => $this->nim,
            'nama' => $this->nama,
        ]);

        $ipk = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 1
        ], [
            'value' => number_format($this->ipk, 2)
        ]);

        $keaktifan = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 2
        ], [
            'value' => number_format($this->keaktifan)
        ]);

        $pengalaman_menjabat = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 3
        ], [
            'value' => number_format($this->pengalaman_menjabat)
        ]);

        $kesehatan = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 4
        ], [
            'value' => number_format($this->kesehatan)
        ]);

        $komunikasi = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 5
        ], [
            'value' => number_format($this->komunikasi)
        ]);

        $problem_solving = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 6
        ], [
            'value' => number_format($this->problem_solving)
        ]);

        $kedisiplinan = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 7
        ], [
            'value' => number_format($this->kedisiplinan)
        ]);

        $visi_misi = Atribut::updateOrCreate([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 8
        ], [
            'value' => number_format($this->visi_misi)
        ]);

        $kandidat_id ? $this->emit('success_message', 'Berhasil Memperbaharui Data')
            : $this->emit('success_message', 'Berhasil Menambah Data');

        DB::commit();

        $this->cleanInput();
        $this->closeModal();
    }

    public function edit($kandidat_id)
    {
        $this->openModal();
        $this->cleanInput();
        $this->kandidat_id = $kandidat_id;

        $kandidat = Kandidat::find($kandidat_id);
        $this->nim = $kandidat->nim;
        $this->nama = $kandidat->nama;

        $ipk = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 1
        ])->first();
        $this->ipk = $ipk ? number_format($ipk->real_value, 2) : '';

        $keaktifan = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 2
        ])->first();
        $this->keaktifan = $keaktifan ? number_format($keaktifan->real_value) : '';

        $pengalaman_menjabat = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 3
        ])->first();
        $this->pengalaman_menjabat = $pengalaman_menjabat ? number_format($pengalaman_menjabat->real_value) : '';

        $kesehatan = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 4
        ])->first();
        $this->kesehatan = $kesehatan ? number_format($kesehatan->real_value) : '';

        $komunikasi = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 5
        ])->first();
        $this->komunikasi = $komunikasi ? number_format($komunikasi->real_value) : '';

        $problem_solving = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 6
        ])->first();
        $this->problem_solving = $problem_solving ? number_format($problem_solving->real_value) : '';

        $kedisiplinan = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 7
        ])->first();
        $this->kedisiplinan = $kedisiplinan ? number_format($kedisiplinan->real_value) : '';

        $visi_misi = Atribut::where([
            'kandidat_id' => $kandidat->id,
            'kriteria_id' => 8
        ])->first();
        $this->visi_misi = $visi_misi ? number_format($visi_misi->real_value) : '';
    }

    public function tambah()
    {
        $this->cleanInput();
        $this->openModal();
    }

    public function batal()
    {
        $this->cleanInput();
        $this->closeModal();
    }

    public function delete($kandidat_id)
    {
        DB::beginTransaction();
        Atribut::where('kandidat_id', $kandidat_id)->delete();
        Kandidat::where('id', $kandidat_id)->delete();
        DB::commit();
        $this->emit('success_message', 'Berhasil Menghapus Data');
    }

    public function cleanInput()
    {
        $this->kandidat_id = null;
        $this->nim = null;
        $this->nama = null;
        $this->ipk = null;
        $this->keaktifan = null;
        $this->pengalaman_menjabat = null;
        $this->kesehatan = null;
        $this->komunikasi = null;
        $this->problem_solving = null;
        $this->kedisiplinan = null;
        $this->visi_misi = null;
    }
}
