<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Auth;
use File;
use Storage;

class CalonComponent extends Component
{
    public $isModal = 0;
    public $mahasiswa;
    public $kriterias;
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
        $this->mahasiswa = Mahasiswa::all();
        $this->kriterias = Kriteria::where('id','1')
            ->get();
    }
    
    public function renderUser()
    {
        $user = new Mahasiswa();
        if ($this->search) $user = $user->where(function($user) {
            return $user->where('nim', 'like', '%'.$this->search.'%')
                ->orWhere('nama', 'like', '%'.$this->search.'%');
        });

        return $user->paginate(5);
    }

    public function render()
    {
        $this->renderData();
        return view('livewire.calon-component',[
            'mahasiswa' => $this->renderUser(),
        ]);
    }
}
