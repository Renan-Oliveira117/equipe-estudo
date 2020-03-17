@extends('adminlte::page')

@section('title', 'Formulário')

@section('content_header')
    <div class="card-header">
        <h3 class="card-title">Formulário de Professor</h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (isset($professor))
                {!! Form::model($professor, ['route' => ['professor.update', $professor], 'method' => 'put']) !!}
            @else
            {!! Form::open(['url' => route('professor.store')]) !!}
            @endif
                <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('formacao', 'Formação') !!}
                    {!! Form::text('formacao', null, ['class' => 'form-control']) !!}
                    @error('formacao') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('date', 'Data Nascimento') !!}
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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