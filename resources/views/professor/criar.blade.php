@extends('layouts.app')

@section('content')
    <h1>Novo Professor</h1>
    {!! Form::open(['action' => 'ProfessorController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do professor'])}}
        </div>
        <div class="form-group">
            {{Form::label('data_nascimento', 'Data de Nascimento')}}
            {{Form::date('data_nascimento', null, ['class' => 'form-control', 'placeholder' => 'Data de Nascimento'])}}
        </div>
        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection