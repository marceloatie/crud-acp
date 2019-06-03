<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Professor;
use DB;

class ProfessorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::orderBy('nome','asc')->paginate(5);
        return view('professor.listar')->with('professores', $professores);
    }

    /**
     * Mostra o registro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $professor = Professor::find($id);
        return view('professor.exibir')->with('professor', $professor);
    }

    /**
     * Mostra o formulario de novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        return view('professor.criar');
    }

    /**
     * Faz insert no banco.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'data_nascimento' => 'required',
        ]);

        // Cria Professor
        $professor = new Professor;
        $professor->nome = $request->input('nome');
        $professor->data_nascimento = $request->input('data_nascimento');
        $professor->save();

        return redirect('/professor')->with('success', 'Novo professor cadastrado com sucesso');
    }

    /**
     * Mostra o formulario de edição.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $professor = Professor::find($id);
        
        //Verifica se o professor existe antes de editar
        if (!isset($professor)){
            return redirect('/professor')->with('error', 'Professor não encontrado');
        }

        return view('professor.editar')->with('professor', $professor);
    }

    /**
     * Faz update no banco.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'data_nascimento' => 'required'
        ]);

        // Atualiza Professor
        $professor = Professor::find($id);
        $professor->nome = $request->input('nome');
        $professor->data_nascimento = $request->input('data_nascimento');
        $professor->save();

        return redirect('/professor')->with('success', 'Professor alterado com sucesso');
    }

    /**
     * deleta o registro do banco.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $professor = Professor::find($id);
        
        //Verifica se o professor existe antes de excluir
        if (!isset($professor)){
            return redirect('/professor')->with('error', 'Professor não encontrado');
        }
        
        $professor->delete();
        return redirect('/professor')->with('success', 'Professor excluido com sucesso');
    }
}
