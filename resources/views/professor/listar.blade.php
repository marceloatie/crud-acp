@extends('layouts.app')

@section('content')

    <script src="{{ asset('js/alertas.js') }}"></script>

    <div class="row">
    <div class="col-md-3"><h1>Professores</h1></div>
    <div class="col-md-9" style="margin-top:20px">
            <a class="btn btn-success" href="{{url('/professor/novo')}}">NOVO</a>
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
                        <button type="button" class="btn btn-danger" onclick="confirmaExclusao('{{$prof->nome}}','{{url('/professor/delete').'/'.$prof->id_professor}}')">EXCLUIR</button>
                    </div>
                </div>
            </div>
        @endforeach
        {{$professores->links()}}
    @else
        <p>Nenhum professor cadastrado</p>
    @endif
@endsection