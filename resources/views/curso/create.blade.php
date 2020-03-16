@extends('adminlte::page')

@section('title', 'Formulário')

@section('content_header')
    <div class="card-header">
        <h3 class="card-title">Formulário de Curso</h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (isset($curso))
                {!! Form::model($curso, ['route' => ['curso.update', $curso], 'method' => 'put']) !!}
            @else
            {!! Form::open(['url' => route('curso.store')]) !!}
            @endif
                <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('professor_id', 'Professor') !!}
                    {!! Form::select('professor_id', $professor, null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop