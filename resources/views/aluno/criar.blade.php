@extends('layouts.app')

@section('content')
    <h1>Novo Aluno</h1>
    {!! Form::open(['action' => 'AlunoController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do aluno'])}}
        </div>
        <div class="form-group">
            {{Form::label('id_curso', 'Curso')}}
            {{Form::select('id_curso', $selectCursos, '', ['class' => 'form-control', 'placeholder' => 'Nenhum'])}}
        </div>
        <div class="form-group">
            {{Form::label('data_nascimento', 'Data de Nascimento')}}
            {{Form::date('data_nascimento', null, ['class' => 'form-control', 'placeholder' => 'Data de Nascimento'])}}
        </div>
        <div class="form-group">
            {{Form::label('cep', 'CEP')}}
            {{Form::text('cep', null, ['class' => 'form-control', 'placeholder' => '00000000', 'pattern' => "\d{8}" ])}}
            <a onclick="consultaCep('{{url('aluno/ajaxcep')}}',document.getElementById('cep').value)">Preenchimento por CEP</a>
        </div>
        <div class="form-group">
            {{Form::label('estado', 'Estado')}}
            {{Form::text('estado', '', ['class' => 'form-control', 'placeholder' => 'Estado'])}}
        </div>
        <div class="form-group">
            {{Form::label('cidade', 'Cidade')}}
            {{Form::text('cidade', '', ['class' => 'form-control', 'placeholder' => 'Cidade'])}}
        </div>
        <div class="form-group">
            {{Form::label('bairro', 'Bairro')}}
            {{Form::text('bairro', '', ['class' => 'form-control', 'placeholder' => 'Bairro'])}}
        </div>
        <div class="form-group">
            {{Form::label('logradouro', 'Logradouro')}}
            {{Form::text('logradouro', '', ['class' => 'form-control', 'placeholder' => 'Logradouro'])}}
        </div>
        <div class="form-group">
            {{Form::label('numero', 'Número')}}
            {{Form::number('numero', '', ['class' => 'form-control', 'placeholder' => 'numero'])}}
        </div>

        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection