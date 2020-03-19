@extends('adminlte::page')

@section('title', 'Formulário de Aluno')

@section('content')
    <div class="card">
            <div class="card-header"> <h3 class="card-title"> Formulário de Aluno</h3></div>
           
        <div class="card-body">

            @if(isset($aluno))
                {!! Form::model($aluno,['url' => route('aluno.update' ,$aluno), 'method'=>'put','files' => 'true'])!!}
            @else 
                {!! Form::open(['url'=>route('aluno.store'),'files' => 'true'])!!}
                
            @endif
                
            <div class="form-group">
                {!! Form::label('nome', 'Nome')!!}
                {!! Form::text('nome',null, ['class'=>'form-control','required']) !!}
                @error('nome') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('cpf', 'CPF')!!}
                {!! Form::text('cpf',null, ['class'=>'form-control','required']) !!}
                @error('cpf') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('data_nascimento', 'Data Nascimento')!!}
                {!! Form::date('data_nascimento',null, ['class'=>'form-control','required']) !!}
                @error('data_nascimento') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('cep', 'CEP')!!}
                {!! Form::text('cep',null, ['class'=>'form-control','required']) !!}
                @error('cep') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('logradouro', 'Logradouro')!!}
                {!! Form::text('logradouro',null, ['class'=>'form-control','required']) !!}
                @error('logradouro') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('numero', 'Numero')!!}
                {!! Form::number('numero',null, ['class'=>'form-control','required']) !!}
                @error('numero') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('bairro', 'Bairro')!!}
                {!! Form::text('bairro',null, ['class'=>'form-control','required']) !!}
                @error('bairro') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('cidade', 'Cidade')!!}
                {!! Form::text('cidade',null, ['class'=>'form-control','required']) !!}
                @error('cidade') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado')!!}
                {!! Form::text('estado',null, ['class'=>'form-control','required']) !!}
                @error('estado') <span class= "text-danger">{{ $message}}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('imagem_temp', 'Imagem') !!}
                {!! Form::file('imagem_temp', ['class' => 'form-control', $aluno?? 'required']) !!}
                @error('imagem_temp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                {!! Form::label('curso_id', 'Curso') !!}
                {!! Form::select('curso_id', $curso, null, ['class' => 'form-control',]) !!}
            </div>
           
         
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>

    </div>
@stop

@section('css')
 
@stop

@section('js')       

@stop