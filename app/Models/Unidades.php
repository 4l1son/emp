<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Colaboradores;

class Unidades extends Model
{
    use HasFactory;

    
    public function colaboradores()
    {
        return $this->hasMany(Colaboradores::class, 'unidade_id');
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
