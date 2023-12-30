<?php

namespace App\Http\Services;


use App\Models\CargosModel;
use Illuminate\Http\Request;

class CargosService
{
    protected $cargos;

    public function __construct(CargosModel $cargos)
    {
        $this->cargos = $cargos;
    }

    public function index()
    {
        return $this->cargos->all();
    }

    public function store(array $data)
    {
        return $this->cargos->create($data);
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
