<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    // Table Name
    protected $table = 'curso';
    // Primary Key
    public $primaryKey = 'id_curso';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = null;

    public function professor(){
        return $this->belongsTo('App\Professor', 'id_professor');
    }

    public function alunos()
    {
        return $this->hasMany('App\Aluno', 'id_curso');
    }
}
