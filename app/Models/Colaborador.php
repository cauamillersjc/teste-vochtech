<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function cargoColaborador()
    {
        return $this->hasOne(CargoColaborador::class, 'colaborador_id');
    }

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id')
            ->withPivot('nota_desempenho');
    }
}
