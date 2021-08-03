<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Blusa de lã',
            'valor_atual' => 100 ,
            'estoque' => 30,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'AllStar Converse',
            'valor_atual' => 180 ,
            'estoque' => 50,
            'categoria_id' => 2
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Pandora Ouro 18k',
            'valor_atual' => 600 ,
            'estoque' => 5,
            'categoria_id' => 3
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Batom Mac ultra mate',
            'valor_atual' => 90 ,
            'estoque' => 15,
            'categoria_id' => 4
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Base Vult',
            'valor_atual' => 50 ,
            'estoque' => 20,
            'categoria_id' => 4
        ]);
    }
}
