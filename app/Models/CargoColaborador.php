<?php

namespace App\Models;
use App\Models\Cargos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoColaborador extends Model
{
    use HasFactory;

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }

    protected $table = 'cargo_colaborador';
    protected $fillable = [
        'id',
        'cargo_id',
        'colaborador_id',
        'nota_desempenho',
    ];

    protected $casts = [
        'id' => 'integer',
        'cargo_id' => 'integer',
        'colaborador_id' => 'integer',
        'nota_desempenho' => 'integer',
    ];

   
}
