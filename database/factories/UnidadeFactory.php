<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidade;

class UnidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_fantasia' => $this->faker->company,
            'razao_social' => $this->faker->company,
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
        ];
    }
}