<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CargoColaboradorService;

class CargoColaboradorController extends Controller
{
    protected $cargoColaboradorService;

    public function __construct(CargoColaboradorService $cargoColaboradorService)
    {
        $this->cargoColaboradorService = $cargoColaboradorService;
    }

    public function atualizarNota(Request $request, $id)
    {
        $nota_desempenho = $request->input('nota_desempenho');
        $result = $this->cargoColaboradorService->atualizarNota($id, $nota_desempenho);
        return response()->json(['message' => 'Nota de desempenho atualizada com sucesso']);
    }
}
