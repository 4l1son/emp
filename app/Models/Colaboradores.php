<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cargos;
use App\Models\Unidades;

class Colaboradores extends Model
{
    use HasFactory;

    public function unidade()
{
    return $this->belongsTo(Unidades::class, 'unidade_id');
}
public function cargos()
{
    return $this->belongsToMany(Cargo::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id');
}

public function cargo()
{
    return $this->belongsTo(Cargos::class, 'id');
}

public function desempenho()
{
    return $this->hasOne(CargoColaborador::class, 'colaborador_id');
}

    protected $fillable = [
        'unidade_id',
        'nome',
        'cpf',
        'email',
    ];


    protected $casts = [
        'id' => 'integer',
        'unidade_id' => 'integer',
    ];
}