<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CargosModel;
use App\Models\UnidadesModel;
use App\Models\CargoColaboradorModel;

class ColaboradoresModel extends Model
{
    use HasFactory;


    protected $table = 'Colaboradores';


    public function unidade()
    {
        return $this->belongsTo(UnidadesModel::class, 'unidade_id');
    }

    public function cargos()
    {
        return $this->belongsToMany(CargosModel::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id')
            ->withPivot('nota_desempenho');
    }

    public function cargo()
    {
        return $this->belongsTo(CargosModel::class, 'id');
    }

    public function desempenho()
    {
        return $this->hasOne(CargoColaboradorModel::class, 'colaborador_id');
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
