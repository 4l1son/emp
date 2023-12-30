<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CargosModel;
use App\Models\UnidadesModel;

class ColaboradoresModel extends Model
{
    use HasFactory;

    protected $table ='colaboradores';
    public function unidade()
{
    return $this->belongsTo(UnidadesModel::class, 'unidade_id');
}
public function cargos()
{
    return $this->belongsToMany(CargoModel::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id');
}

public function cargo()
{
    return $this->belongsTo(CargosModel::class, 'id');
}

public function desempenho()
{
    return $this->hasOne(CargoColaboradorModels::class, 'colaborador_id');
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