<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function index()
    {
        $users = Kandidat::all();
        return view('livewire.saw-component.tahap-4', compact('users'));
    }

    public function exportPDF()
    {
        $users = Kandidat::all();
        $pdf = PDF::loadView('livewire.saw-component.tahap-4', ['users' => $users]);
        return $pdf->download('Data Kandidat'.'.pdf');
    }
}
