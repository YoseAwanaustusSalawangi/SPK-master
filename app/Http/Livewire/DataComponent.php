<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Auth;
use File;
use Storage;

class DataComponent extends Component
{
    public $isModal = 0;
    public $mahasiswa;
    public $mahasiswa_id, $nim_mhs, $nama_mhs, $cv, $transkrip_nilai, $sk, $foto, $status;
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
        $this->mahasiswa = Mahasiswa::where([
            ['id_user', '=', $session_id],
        ])->get();
    }

    public function render()
    {
        $this->renderData();
        return view('livewire.data-component' ,  [
            'mahasiswa' => Mahasiswa::all(),
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
            'nim_mhs' => 'required|max:8|unique:mahasiswa,nim_mhs,' . $this->mahasiswa_id,
            'nama_mhs' => 'required|string|max:255',
            'cv' => 'required|mimes:jpg,jpeg,png,pdf|max:2000',
            'foto' => 'required|image|max:2000',
            'transkrip_nilai' => 'required|mimes:pdf|max:2000',
            'sk' => 'required|mimes:pdf|max:2000',
        ];
    }

    protected function messages() {
        return[
            'nim_mhs.unique' => 'Nim Sudah Ada!!',
            'nim_mhs.required' => 'Nim Wajib Diisi!',
            'nim_mhs.max' => 'Nim Tidak Boleh Lebih dari 8!',
            'nama_mhs.required' => 'Nama Wajib Diisi!',
            'cv.required' => 'CV Wajib Diupload!',
            'cv.mimes' => 'CV Harus JPG,JPEG,PNG atau PDF!',
            'cv.max' => 'CV Tidak Boleh Lebih dari 2 MB',
            'foto.required' => 'Foto Wajib Diupload!',
            'foto.image' => 'Foto Harus Gambar (JPG,JPEG,PNG)',
            'foto.max' => 'Foto Tidak Boleh Lebih dari 2 MB',
            'transkrip_nilai.required' => 'Transkrip Nilai Wajib Diupload!',
            'transkrip_nilai.mimes' => 'Transkrip Nilai Harus PDF',
            'transkrip_nilai.max' => 'Transkrip Nilai Tidak Boleh Lebih dari 2 MB',
            'sk.required' => 'Surat Keterangan Wajib Diupload!',
            'sk.mimes' => 'Surat Keterangan Harus PDF!',
            'sk.max' => 'Surat Keterangan Tidak Boleh Lebih dari 2 MB',
        ];
    }


    public function save()
    {
        $validatedData = $this->validate();
        
        DB::beginTransaction();
        $mahasiswa_id = $this->mahasiswa_id;
        $session_id = Auth::user()->id;
        $filecv = $this->cv->getClientOriginalName();
        $cv = $this->cv->storeAs('cv_pdf', $filecv);
        $filetn = $this->transkrip_nilai->getClientOriginalName();
        $tn = $this->transkrip_nilai->storeAs('tn_pdf', $filetn);
        $filesk = $this->sk->getClientOriginalName();
        $sk = $this->sk->storeAs('sk_pdf', $filesk);
        $filefoto = $this->foto->getClientOriginalName();
        $foto = $this->foto->storeAs('photos', $filefoto);
        $mahasiswa = Mahasiswa::updateOrCreate([
            'id' => $mahasiswa_id,
            'id_user' => $session_id
        ], 
        [
            'nim_mhs' => $this->nim_mhs,
            'nama_mhs' => $this->nama_mhs,
            'cv' => $cv,
            'transkrip_nilai' => $tn,
            'sk' => $sk,
            'foto' => $foto
        ]);

        $mahasiswa_id ? $this->emit('success_message', 'Berhasil Memperbaharui Data')
            : $this->emit('success_message', 'Berhasil Menambah Data');

        DB::commit();

        $this->cleanInput();
        $this->closeModal();
    }

    public function ubah($mahasiswa_id)
    {
        $this->openModal();
        $this->cleanInput();
        $this->mahasiswa_id = $mahasiswa_id;

        $mahasiswa = Mahasiswa::find($mahasiswa_id);
        $this->nim_mhs = $mahasiswa->nim_mhs;
        $this->nama_mhs = $mahasiswa->nama_mhs;
        $this->cv = $mahasiswa->cv;
        $this->transkrip_nilai = $mahasiswa->transkrip_nilai;
        $this->sk = $mahasiswa->sk;
        $this->foto = $mahasiswa->foto;
    }

    public function hapus($mahasiswa_id)
    {
        $news = Mahasiswa::findOrFail($mahasiswa_id);
        unlink(storage_path('app/public/'.$news->cv));
        unlink(storage_path('app/public/'.$news->transkrip_nilai));
        unlink(storage_path('app/public/'.$news->sk)); 
        unlink(storage_path('app/public/'.$news->foto));    
        DB::beginTransaction();
        Mahasiswa::where('id', $mahasiswa_id)->delete();
        DB::commit();
        $this->emit('success_message', 'Berhasil Menghapus Data');
    }

    public function cleanInput()
    {
        $this->mahasiswa_id = null;
        $this->nim_mhs = null;
        $this->nama_mhs = null;
        $this->cv = null;
        $this->transkrip_nilai = null;
        $this->sk = null;
        $this->foto = null;
    }
}
