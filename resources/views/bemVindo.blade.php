@extends('layouts.app')

@section('content')
    <h1>Bem vindo</h1>
    <ul>
        <li>Ao excluir um professor, seus cursos não serão excluidos, apenas serão exibidos sem professor</li>
        <li>Ao excluir um curso, seus alunos não serão excluidos, apenas serão exibidos sem curso</li>
        <li>Os cadastros possuem páginação após 5 elementos</li>
    </ul>
@endsection