<?php

namespace App\Http\Controllers;

use App\Http\Services\ColaboradoresService;
use Illuminate\Http\Request;

class ColaboradoresController extends Controller
{
    protected $colaboradoresService;

    public function __construct(ColaboradoresService $colaboradoresService)
    {
        $this->colaboradoresService = $colaboradoresService;
    }

    public function index()
    {
        $colaboradores = $this->colaboradoresService->index();
        return response()->json($colaboradores);
    }

    public function store(Request $request)
    {
        $colaborador = $this->colaboradoresService->store($request->all());
        return response()->json($colaborador, 201);
    }

    public function show($id)
    {
        $colaborador = $this->colaboradoresService->show($id);

        if ($colaborador) {
            return response()->json($colaborador);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    public function update(Request $request, $id)
    {
        $colaborador = $this->colaboradoresService->update($request->all(), $id);

        if ($colaborador) {
            return response()->json($colaborador);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    public function destroy($id)
    {
        $result = $this->colaboradoresService->destroy($id);

        if ($result) {
            return response()->json(['message' => 'Colaborador excluído com sucesso']);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }
    public function exportColaboradores()
    {
        return $this->colaboradoresService->exportColaboradores();
    }

    public function exportTotalColaboradoresUnidade()
    {
        return $this->colaboradoresService->exportTotalColaboradoresUnidade();
    }

    public function exportRankingColaboradores()
    {
        return $this->colaboradoresService->exportRankingColaboradores();
    }
}

