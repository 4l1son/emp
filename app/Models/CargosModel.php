<?php

namespace App\Models;
use App\Models\ColaboradoresModel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargosModel extends Model



    {
        use HasFactory;

        protected $table = 'cargos';
    /**
     * @OA\Schema(
     *     schema="Cargo",
     *     title="Cargo",
     *     description="Modelo de dados para um Cargo",
     *     @OA\Property(property="id", type="integer", format="int64", description="ID do Cargo"),
     *     @OA\Property(property="nome", type="string", description="Nome do Cargo"),
     *     @OA\Property(property="descricao", type="string", description="Descrição do Cargo"),
     *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data da última atualização"),
     * )
     */    
    
    
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
