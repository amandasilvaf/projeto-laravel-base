<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            "nome" => "Site IFPR",
            "horas_previstas" => 1000,
        ]);

        DB::table('projetos')->insert([
            "nome" => "Sistema Petiscaria Perez",
            "horas_previstas" => 3000,
        ]);

        DB::table('projetos')->insert([
            "nome" => "Site Digitron Eletrônica",
            "horas_previstas" => 1000,
        ]);

    }
}
