@extends('adminlte::page')

@section('title', 'Daftar Kandidat')

@section('content_header')
    <h4>Daftar Kandidat</h4>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @livewire('calon-component')
    </div>
  </div>
@stop