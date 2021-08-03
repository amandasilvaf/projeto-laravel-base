<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nome' => 'Roupas']);
        DB::table('categorias')->insert(['nome' => 'Sapatos']);
        DB::table('categorias')->insert(['nome' => 'Acessórios']);
        DB::table('categorias')->insert(['nome' => 'Maquiagem']);
    }
}
