<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienciasTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiencias_tipos')->insert([
            'descricao' => 'Experiências Profissionais'
        ]);

        DB::table('experiencias_tipos')->insert([
            'descricao' => 'Formações Acadêmicas'
        ]);
    }
}
