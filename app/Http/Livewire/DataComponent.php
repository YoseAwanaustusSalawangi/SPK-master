<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kandidat;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Auth;

class DataComponent extends Component
{
    public $isModal = 0;
    public $kandidat;
    public $kandidat_id, $nim, $nama;
    public $search;
    use WithFileUploads;

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
    }

    public function renderUser()
    {
        $session_id = Auth::user()->id;
        $this->kandidat = Kandidat::where([
            ['id_user', '=', $session_id],
        ])->get();
    }

    public function render()
    {
        $this->renderData();
        return view('livewire.data-component' ,  [
            'kandidat' => Kandidat::all(),
            $this->renderUser()
        ]);
    }

    public function create()
    {
        $this->cleanInput();
        $this->openModal();
    }

    public function cencel()
    {
        $this->cleanInput();
        $this->closeModal();
    }
    protected function rules() {
        return [
            'nim' => 'required|max:8|unique:kandidat,nim,' . $this->kandidat_id,
            'nama' => 'required|string|max:255',
        ];
    }

    protected function messages() {
        return[
            'nim.unique' => 'Nim Sudah Ada!!',
            'nim.required' => 'Nim Wajib Diisi!',
            'nim.max' => 'Nim Tidak Boleh Lebih dari 8!',
            'nama.required' => 'Nama Wajib Diisi!',
        ];
    }


    public function save()
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


        $kandidat_id ? $this->emit('success_message', 'Berhasil Memperbaharui Data')
            : $this->emit('success_message', 'Berhasil Menambah Data');

        DB::commit();

        $this->cleanInput();
        $this->closeModal();
    }

    public function ubah($kandidat_id)
    {
        $this->openModal();
        $this->cleanInput();
        $this->kandidat_id = $kandidat_id;

        $kandidat = Kandidat::find($kandidat_id);
        $this->nim = $kandidat->nim;
        $this->nama = $kandidat->nama;

    }

    public function hapus($kandidat_id)
    {
        DB::beginTransaction();
        Kandidat::where('id', $kandidat_id)->delete();
        DB::commit();
        $this->emit('success_message', 'Berhasil Menghapus Data');
    }

    public function cleanInput()
    {
        $this->kandidat_id = null;
        $this->nim = null;
        $this->nama = null;
    }
}
