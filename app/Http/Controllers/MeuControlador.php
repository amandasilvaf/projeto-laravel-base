<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
   public function intro(){
       return 'Oi, de dentro do controller!!';
   }
   public function getNome(){
       return "Amanda da Silva Ferreira";
   }
   public function getIdade(){
       return "26";
   }
   public function multiplicar($n1, $n2){
    return $n1 * $n2;
   }

}


