<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;
    protected $fillable = ['nome','telefone'];
    
    public function endereco(){
        return $this->hasOne(Endereco::class);
    }
}
