@extends('layouts.app')

@section('content')
    <h1>Novo Curso</h1>
    {!! Form::open(['action' => 'CursoController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do curso'])}}
        </div>
        <div class="form-group">
            {{Form::label('id_professor', 'Professor')}}
            {{Form::select('id_professor', $selectProfessores, '', ['class' => 'form-control', 'placeholder' => 'Nenhum'])}}
        </div>
        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection