@extends('layouts.app')

@section('content')
    @if ($professor->id_professor == null)
        <h1>Novo Professor</h1>
        {!! Form::open(['action' => 'ProfessorController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @else
        <h1>Alterar Professor</h1>
        {!! Form::open(['action' => ['ProfessorController@update', $professor->id_professor], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @endif
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', $professor->nome, ['class' => 'form-control', 'placeholder' => 'Nome do professor'])}}
        </div>
        <div class="form-group">
            {{Form::label('data_nascimento', 'Data de Nascimento')}}
            {{Form::date('data_nascimento', $professor->data_nascimento, ['class' => 'form-control', 'placeholder' => 'Data de Nascimento'])}}
        </div>
        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection