@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-3"><h1>Professores</h1></div>
    <div class="col-md-9" style="margin-top:35px">
            <a href="{{url('/professor/novo')}}">NOVO</a>
    </div>
    </div>
    @if(count($professores) > 0)
        @foreach($professores as $prof)
            <div class="well">
                <div class="row">
                    <div class="col-md-5">
                        <h3><a href="{{url('/professor/editar').'/'.$prof->id_professor}}">{{$prof->nome}}</a></h3>
                    </div>
                    <div class="col-md-6">
                        Data de nascimento: {{(new DateTime($prof->data_nascimento))->format('d/m/Y')}}<br>
                        Registrado em {{(new DateTime($prof->data_criacao))->modify("-4 hour")->format('d/m/Y H:i:s')}}
                    </div>
                    <div class="col-md-1">
                            <a href="{{url('/professor/delete').'/'.$prof->id_professor}}">EXCLUIR</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{$professores->links()}}
    @else
        <p>Nenhum professor cadastrado</p>
    @endif
@endsection