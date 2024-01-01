<?php

namespace App\Models;
use App\Models\CargosModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoColaboradorModel extends Model
{
    use HasFactory;

    protected $table = 'Cargo_Colaborador';

    public function cargo()
    {
        return $this->belongsTo(CargosModel::class, 'cargo_id');
    }

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
