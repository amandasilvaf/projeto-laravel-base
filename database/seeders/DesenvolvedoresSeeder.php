<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            "nome" => "Amanda Ferreira",
            "cargo" => "Estagiária em Programação back-end",
        ]);

        DB::table('desenvolvedores')->insert([
            "nome" => "Geovani Pereira",
            "cargo" => "Programador Pleno",
        ]);

        DB::table('desenvolvedores')->insert([
            "nome" => "Marcia Pascutti",
            "cargo" => "Programador Senior",
        ]);

    }
}
