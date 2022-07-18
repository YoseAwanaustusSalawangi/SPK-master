@extends('adminlte::page')

@section('title', 'Data Diri')

@section('content_header')
  
@stop

@section('content')
  <div class="row">
    <div class="col-12">
        @livewire('data-component')
    </div>
  </div>
@stop