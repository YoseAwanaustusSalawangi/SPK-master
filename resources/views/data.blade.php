@extends('adminlte::page')

@section('title', 'Data Diri')

@section('content_header')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4>Selamat Datang <b>{{Auth::user()->name}}. </b>Silahkan mengisi data yang diperlukan untuk mengikuti PEMIRA!</h4>
        </div>
      </div>
    </div>
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
        @livewire('data-component')
    </div>
  </div>
@stop