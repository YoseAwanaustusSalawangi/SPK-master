@extends('adminlte::page')

@section('title', 'Data Nilai Kandidat')

@section('content_header')
    <h3> Data Nilai Kandidat Calon Pimpinan Lembaga Kemahasiswaan UKDW</h3>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('kandidat-component')
        </div>
    </div>
@stop