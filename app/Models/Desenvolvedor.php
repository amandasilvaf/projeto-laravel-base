<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';
    use HasFactory;

    function projetos(){
        return $this->belongsToMany(Projeto::class, 'alocacoes')->withPivot('horas_trabalhadas');
    }
}
