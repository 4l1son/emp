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
        return $this->hasMany(Colaboradores::class);
    }
    protected $fillable = [
         'id',
        'Cargos',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
