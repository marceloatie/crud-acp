@extends('layouts.app')

@section('content')
    <h1>Alterar Aluno</h1>
    {!! Form::open(['action' => ['AlunoController@update', $aluno->id_aluno], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nome', 'Nome')}}
            {{Form::text('nome', $aluno->nome, ['class' => 'form-control', 'placeholder' => 'Nome do aluno'])}}
        </div>
        <div class="form-group">
            {{Form::label('id_curso', 'Curso')}}
            {{Form::select('id_curso', $selectCursos, $aluno->id_curso, ['class' => 'form-control', 'placeholder' => 'Nenhum'])}}
        </div>
        <div class="form-group">
                {{Form::label('data_nascimento', 'Data de Nascimento')}}
                {{Form::date('data_nascimento', $aluno->data_nascimento, ['class' => 'form-control', 'placeholder' => 'Data de Nascimento'])}}
            </div>
            <div class="form-group">
                {{Form::label('cep', 'CEP')}}
                {{Form::text('cep', $aluno->cep, ['class' => 'form-control', 'placeholder' => '00000000', 'pattern' => "\d{8}" ])}}
                <a onclick="consultaCep('{{url('aluno/ajaxcep')}}',document.getElementById('cep').value)">Preenchimento por CEP</a>
            </div>
            <div class="form-group">
                {{Form::label('estado', 'Estado')}}
                {{Form::text('estado', $aluno->estado, ['class' => 'form-control', 'placeholder' => 'Estado'])}}
            </div>
            <div class="form-group">
                {{Form::label('cidade', 'Cidade')}}
                {{Form::text('cidade', $aluno->cidade, ['class' => 'form-control', 'placeholder' => 'Cidade'])}}
            </div>
            <div class="form-group">
                {{Form::label('bairro', 'Bairro')}}
                {{Form::text('bairro', $aluno->bairro, ['class' => 'form-control', 'placeholder' => 'Bairro'])}}
            </div>
            <div class="form-group">
                {{Form::label('logradouro', 'Logradouro')}}
                {{Form::text('logradouro', $aluno->logradouro, ['class' => 'form-control', 'placeholder' => 'Logradouro'])}}
            </div>
            <div class="form-group">
                {{Form::label('numero', 'Número')}}
                {{Form::number('numero', $aluno->numero, ['class' => 'form-control', 'placeholder' => 'numero'])}}
            </div>
        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection