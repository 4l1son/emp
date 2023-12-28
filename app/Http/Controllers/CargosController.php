<?php

namespace App\Http\Controllers;

use App\Http\Services\CargosService;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    protected $cargosService;

    public function __construct(CargosService $cargosService)
    {
        $this->cargosService = $cargosService;
    }

    public function index()
    {
        $cargos = $this->cargosService->index();
        return response()->json($cargos);
    }

    public function store(Request $request)
    {
        $cargo = $this->cargosService->store($request->all());
        return response()->json($cargo, 201);
    }

    public function show($id)
    {
        $cargo = $this->cargosService->show($id);

        if ($cargo) {
            return response()->json($cargo);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $cargo = $this->cargosService->update($request->all(), $id);

        if ($cargo) {
            return response()->json($cargo);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }

    public function destroy($id)
    {
        $result = $this->cargosService->destroy($id);

        if ($result) {
            return response()->json(['message' => 'Cargo excluído com sucesso']);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }
}
