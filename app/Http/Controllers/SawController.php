<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use PDF;


class SawController extends Controller
{
    public function index()
    {
        return view('saw');
    }

    public function cetak()
    {
        $pdfContent = PDF::loadView('livewire/saw-component/tahap-4');
        return $pdfContent->download('laporan-pdf.pdf');
    }
}
