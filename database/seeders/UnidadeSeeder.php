<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::factory()
            ->count(100)
            ->create();
    }
}
