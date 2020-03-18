@extends('adminlte::page')

@section('title', 'Aluno')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Lista de Aluno</h3>
    </div>
    <div class="card-body">
        {{$dataTable->table() }}

    </div>
</div>
@stop

@section('css')
   
@stop

@section('js')
    {{ $dataTable->scripts()}}
@stop