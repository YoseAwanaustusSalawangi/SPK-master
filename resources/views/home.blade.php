@extends('adminlte::page')

@section('title', 'Welcome')

@section('content_header')
    
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <b> 
                            Selamat Datang {{Auth::user()->name}} di Program Bantu Seleksi Kandidat Calon Pimpinan Lembaga Kemahasiswaan 
                            <br>
                            Universitas Kristen Duta Wacana :)
                        </b>
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>
                        Sistem ini dibuat untuk membantu Anda dalam melakukan penyeleksian terhadap kandidat calon pimpinan lembaga kemahasiswaa untuk dicalonkan dalam pemilihan umum raya (PEMIRA).
                        <br>
                        <br>
                        Langkah - langkah menggunakan sistem :
                        <br>
                        1. Masukan data kandidat beserta nilai setiap kriteria yang ada pada fitur "Data Nilai Kandidat".
                        <br>
                        2. Lihat hasil perhitungan pada fitur "Perhitungan SAW".
                    </h5>
                </div>
            </div>
        </div>
    </div>
@stop