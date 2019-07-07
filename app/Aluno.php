<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    // Table Name
    protected $table = 'aluno';
    // Primary Key
    public $primaryKey = 'id_aluno';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    public function curso(){
        return $this->belongsTo('App\Curso', 'id_curso');
    }

    public static function camposObrigatorios(){
        return [
            'nome' => 'required',
            'data_nascimento' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
        ];
    }
}
