<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;

class ColaboradorFactory extends Factory
{
    protected $model = Colaborador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unidade_id' => Unidade::inRandomOrder()->first()->id,
            'nome' => $this->faker->name,
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
