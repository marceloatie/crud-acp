@extends('layouts.app')

@section('content')
    @if ($curso->id_curso == null)
        <h1>Novo Curso</h1>
        {!! Form::open(['action' => 'CursoController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @else
        <h1>Alterar Curso</h1>
        {!! Form::open(['action' => ['CursoController@update', $curso->id_curso], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @endif
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', $curso->nome, ['class' => 'form-control', 'placeholder' => 'Nome do curso'])}}
        </div>
        <div class="form-group">
                {{Form::label('id_professor', 'Professor')}}
                {{Form::select('id_professor', $selectProfessores, $curso->id_professor, ['class' => 'form-control', 'placeholder' => 'Nenhum'])}}
            </div>
        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection