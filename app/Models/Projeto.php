<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    public function desenvolvedores(){
        return $this->belongsToMany(Desenvolvedor::class, 'alocacoes')->withPivot('horas_trabalhadas');
    }
}
