<?php

namespace App\Models;
use App\Models\Colaboradores;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;
    


    public function colaboradores()
{
    return $this->belongsToMany(Colaboradores::class, 'cargo_colaborador', 'cargo_id', 'colaborador_id')
        ->withPivot('nota_desempenho');
}

    
    protected $fillable = [
         'id',
        'Cargos',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
