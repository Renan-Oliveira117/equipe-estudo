@extends('adminlte::page')

@section('title', 'Curso')

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Lista de Curso</h3>
        </div>
        <div class="card-body">
            {{$dataTable->table() }}

        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
{!! $dataTable->scripts() !!}
@stop