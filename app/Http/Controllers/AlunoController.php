<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Curso;
use DB;

class AlunoController extends Controller
{

    /**
     * Mostra o formulario de novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome','asc')->paginate(5);
        return view('aluno.listar')->with('alunos', $alunos);
    }

    /**
     * Mostra o registro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        $aluno = Aluno::find($id);
        return view('aluno.exibir')->with('aluno', $aluno);
    }

    /**
     * Mostra o formulario de novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        $selectCursos = Curso::pluck('nome', 'id_curso');
        return view('aluno.editar')->with('aluno', new Aluno)->with('selectCursos', $selectCursos);
    }

    /**
     * Faz insert no banco.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $this->validate($request, Aluno::camposObrigatorios());

        // Cria Aluno
        $aluno = new Aluno;
        $aluno->nome = $request->input('nome');
        $aluno->data_nascimento = $request->input('data_nascimento');
        $aluno->logradouro = $request->input('logradouro');
        $aluno->numero = $request->input('numero');
        $aluno->bairro = $request->input('bairro');
        $aluno->cidade = $request->input('cidade');
        $aluno->estado = $request->input('estado');
        $aluno->cep = $request->input('cep');
        if(!empty($request->input('id_curso'))){
            $aluno->id_curso = $request->input('id_curso');
        }else{
            $aluno->id_curso = null;
        }
        $aluno->save();

        return redirect('/aluno')->with('success', 'Novo aluno cadastrado com sucesso');
    }

    /**
     * Mostra o formulario de edição.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $aluno = Aluno::find($id);
        
        //Verifica se o aluno existe antes de editar
        if (!isset($aluno)){
            return redirect('/aluno')->with('error', 'Aluno não encontrado');
        }

        $selectCursos = Curso::pluck('nome', 'id_curso');
        return view('aluno.editar')->with('aluno', $aluno)->with('selectCursos', $selectCursos);
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
        $this->validate($request, Aluno::camposObrigatorios());

        // Atualiza Aluno
        $aluno = Aluno::find($id);
        $aluno->nome = $request->input('nome');
        $aluno->nome = $request->input('nome');
        $aluno->data_nascimento = $request->input('data_nascimento');
        $aluno->logradouro = $request->input('logradouro');
        $aluno->numero = $request->input('numero');
        $aluno->bairro = $request->input('bairro');
        $aluno->cidade = $request->input('cidade');
        $aluno->estado = $request->input('estado');
        $aluno->cep = $request->input('cep');
        if(!empty($request->input('id_curso'))){
            $aluno->id_curso = $request->input('id_curso');
        }else{
            $aluno->id_curso = null;
        }
        $aluno->save();

        return redirect('/aluno')->with('success', 'Aluno alterado com sucesso');
    }

    /**
     * deleta o registro do banco.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $aluno = Aluno::find($id);
        
        //Verifica se o aluno existe antes de excluir
        if (!isset($aluno)){
            return redirect('/aluno')->with('error', 'Aluno não encontrado');
        }
        
        $aluno->delete();
        return redirect('/aluno')->with('success', 'Aluno excluido com sucesso');
    }

    /**
     * Consulta um CEP
     *
     * @param  string  $cep
     */
    public function ajaxCep($cep)
    {
        if(!is_numeric($cep) | strlen($cep) != 8){
            return '{"readyState":4,"responseText":"","status":404,"statusText":"Not Found"}';
        }
        $u = 'https://api.postmon.com.br/v1/cep/'.$cep;

        $res = @file_get_contents($u);

        if(stripos($res,'estado') > 0){
            return $res;
        }else{
            return '{"readyState":4,"responseText":"","status":404,"statusText":"Not Found"}';
        }
    }
}