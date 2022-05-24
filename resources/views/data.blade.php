@extends('adminlte::page')

@section('title', 'Data Diri')

@section('content_header')
<h3> Data Diri Kandidat</h3>
@stop

@section('content')
  <div class="row">
      <div class="col-12">
          @livewire('data-component')
      </div>
  </div>
@stop