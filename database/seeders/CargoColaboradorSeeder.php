<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CargoColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cargos = Cargo::all(); // Obtém todos os cargos disponíveis
        $colaboradores = Colaborador::all(); // Obtém todos os colaboradores disponíveis

        foreach ($colaboradores as $colaborador) {
            $cargo = $cargos->random(); // Seleciona um cargo aleatório

            CargoColaborador::create([
                'cargo_id' => $cargo->id,
                'colaborador_id' => $colaborador->id,
                'nota_desempenho' => $faker->numberBetween(0, 10), // Gere uma nota aleatória de 0 a 10
            ]);
        }
    }
}
