@extends('adminlte::page')

@section('title', 'Welcome')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Selamat Datang <b>{{Auth::user()->name}}.</b></h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    Catatan Sistem (Program Bantu Seleksi Kandidat Calon Pimpinan Lembaga Kemahasiswaan):
                    <br> 
                    1. Validasi Tambah Data (+)
                    <br>
                    2. Session Login Berdasarkan Id yang Login (-)
                    <br>
                    3. CRUD (+)
                    <br>
                    4. Perhitungan [Normalisasi, Perankingan] (+)
                    <br>
                    5. Registrasi & Login User (+)
                    <br>
                    6. Cetak Data (?)
                </div>
            </div>
        </div>
    </div>
@stop