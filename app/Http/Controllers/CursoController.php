<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Professor;
use DB;

class CursoController extends Controller
{

    /**
     * Mostra o formulario de novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::orderBy('nome','asc')->paginate(5);
        return view('curso.listar')->with('cursos', $cursos);
    }

    /**
     * Mostra o registro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $curso = Curso::find($id);
        return view('curso.exibir')->with('curso', $curso);
    }

    /**
     * Mostra o formulario de novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        $selectProfessores = Professor::pluck('nome', 'id_professor');
        return view('curso.criar')->with('selectProfessores', $selectProfessores);
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
        ]);

        // Cria Curso
        $curso = new Curso;
        $curso->nome = $request->input('nome');
        if(!empty($request->input('id_professor'))){
            $curso->id_professor = $request->input('id_professor');
        }else{
            $curso->id_professor = null;
        }
        $curso->save();

        return redirect('/curso')->with('success', 'Novo curso cadastrado com sucesso');
    }

    /**
     * Mostra o formulario de edição.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $curso = Curso::find($id);
        
        //Verifica se o curso existe antes de editar
        if (!isset($curso)){
            return redirect('/curso')->with('error', 'Curso não encontrado');
        }

        $selectProfessores = Professor::pluck('nome', 'id_professor');
        return view('curso.editar')->with('curso', $curso)->with('selectProfessores', $selectProfessores);
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
        ]);

        // Atualiza Curso
        $curso = Curso::find($id);
        $curso->nome = $request->input('nome');
        if(!empty($request->input('id_professor'))){
            $curso->id_professor = $request->input('id_professor');
        }else{
            $curso->id_professor = null;
        }
        $curso->save();

        return redirect('/curso')->with('success', 'Curso alterado com sucesso');
    }

    /**
     * deleta o registro do banco.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $curso = Curso::find($id);
        
        //Verifica se o curso existe antes de excluir
        if (!isset($curso)){
            return redirect('/curso')->with('error', 'Curso não encontrado');
        }
        
        $curso->delete();
        return redirect('/curso')->with('success', 'Curso excluido com sucesso');
    }
}
