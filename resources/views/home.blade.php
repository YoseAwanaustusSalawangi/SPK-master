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
                    Penelitian Yose
                </div>
            </div>
        </div>
    </div>
@stop