<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacoes')->insert([
            "projeto_id" => 1,
            "desenvolvedor_id" => 1,
            "horas_trabalhadas" => 100,
        ]);

        DB::table('alocacoes')->insert([
            "projeto_id" => 1,
            "desenvolvedor_id" => 2,
            "horas_trabalhadas" => 100,
        ]);

        DB::table('alocacoes')->insert([
            "projeto_id" => 2,
            "desenvolvedor_id" => 2,
            "horas_trabalhadas" => 1000,
        ]);

    }
}
