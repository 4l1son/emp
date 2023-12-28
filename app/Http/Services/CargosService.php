<?php

namespace App\Http\Services;

use App\Models\Cargos;
use App\Models\Colaboradores;
use Illuminate\Http\Request;

class CargosService
{
    protected $cargos;

    public function __construct(Cargos $cargos)
    {
        $this->cargos = $cargos;
    }

    public function index()
    {
        return $this->cargos->all();
    }

    public function store(Request $request)
    {
        return $this->cargos->create($request->all());
    }

    public function show($id)
    {
        return $this->cargos->find($id);
    }

    public function update(Request $request, $id)
    {
        $cargo = $this->cargos->find($id);

        if ($cargo) {
            $cargo->update($request->all());
            return $cargo;
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }

    public function destroy($id)
    {
        $cargo = $this->cargos->find($id);

        if ($cargo) {
            $cargo->delete();
            return response()->json(['message' => 'Cargo excluído com sucesso']);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }
}
