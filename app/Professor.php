<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    // Table Name
    protected $table = 'professor';
    // Primary Key
    public $primaryKey = 'id_professor';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    public function cursos()
    {
        return $this->hasMany('App\Curso', 'id_professor');
    }

    public static function camposObrigatorios()
    {
        return [
            'nome' => 'required',
            'data_nascimento' => 'required'
        ];
    }
}
