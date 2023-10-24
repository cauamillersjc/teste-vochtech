<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            'Desenvolvedor Front-end',
            'Desenvolvedor Back-end',
            'Engenheiro de Software',
            'Analista de Sistemas',
            'Administrador de Banco de Dados (DBA)',
            'Gerente de Projetos de TI',
            'Analista de Qualidade de Software (QA)',
            'Designer de UI/UX',
            'Engenheiro de Dados',
            'Especialista em Cibersegurança',
        ];

        foreach ($cargos as $cargo) {
            Cargo::create(['cargo' => $cargo]);
        }
    }
}
