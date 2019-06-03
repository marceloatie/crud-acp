@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-3"><h1>Cursos</h1></div>
    <div class="col-md-9" style="margin-top:35px">
            <a href="{{url('/curso/novo')}}">NOVO</a>
    </div>
    </div>
    @if(count($cursos) > 0)
        @foreach($cursos as $curso)
            <div class="well">
                <div class="row">
                    <div class="col-md-5">
                        <h3><a href="{{url('/curso/editar').'/'.$curso->id_curso}}">{{$curso->nome}}</a></h3>
                    </div>
                    <div class="col-md-6">
                        Professor: <b>{{$curso->professor != null? $curso->professor->nome : 'Nenhum'}}</b><br>
                        Registrado em {{(new DateTime($curso->data_criacao))->modify("-4 hour")->format('d/m/Y H:i:s')}}
                    </div>
                    <div class="col-md-1">
                            <a href="{{url('/curso/delete').'/'.$curso->id_curso}}">EXCLUIR</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$cursos->links()}}
    @else
        <p>Nenhum curso cadastrado</p>
    @endif
@endsection