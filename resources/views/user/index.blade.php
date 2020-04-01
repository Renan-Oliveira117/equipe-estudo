@extends('adminlte::page')

@section('title', 'Curso')

@section('content_header')
    <h3> Lista de Usuário</h3>
@stop

@section('content')
    {{ $dataTable->table() }}
@stop

@section('css')
   
@stop

@section('js')
    {{ $dataTable->scripts() }}
@stop