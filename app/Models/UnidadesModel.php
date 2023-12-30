<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ColaboradoresModel;

class UnidadesModel extends Model
{
    use HasFactory;

    protected $table ='unidades';

    public function colaboradores()
    {
        return $this->hasMany(ColaboradoresModel::class, 'unidade_id');
    }
    protected $fillable = [
        'id',
        'nome_fantasia',
        'razao_social',
        'cnpj',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
