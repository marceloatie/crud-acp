@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-3"><h1>Alunos</h1></div>
    <div class="col-md-9" style="margin-top:35px">
            <a href="{{url('/aluno/novo')}}">NOVO</a>
    </div>
    </div>
    @if(count($alunos) > 0)
        @foreach($alunos as $aluno)
            <div class="well">
                <div class="row">
                    <div class="col-md-5">
                        <h3><a href="{{url('/aluno/editar').'/'.$aluno->id_aluno}}">{{$aluno->nome}}</a></h3>
                    </div>
                    <div class="col-md-6">
                        Curso: <b>{{$aluno->curso != null? $aluno->curso->nome : 'Nenhum'}}</b><br>
                        Registrado em {{(new DateTime($aluno->data_criacao))->modify("-4 hour")->format('d/m/Y H:i:s')}}
                    </div>
                    <div class="col-md-1">
                            <a href="{{url('/aluno/delete').'/'.$aluno->id_aluno}}">EXCLUIR</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$alunos->links()}}
    @else
        <p>Nenhum aluno cadastrado</p>
    @endif
@endsection