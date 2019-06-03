<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use DB;

class RelatorioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome','asc')->get();
        //return view('relatorio.listagem')->with('alunos', $alunos);
        //return \PDF::loadView('relatorio.listagem', compact('alunos'))->download('nome-arquivo-pdf-gerado.pdf');
        return \PDF::loadView('relatorio.listagem', compact('alunos'))->stream();
    }
    
}
