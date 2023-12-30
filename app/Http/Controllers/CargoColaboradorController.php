<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CargoColaboradorService;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CargoColaborador",
 *     title="CargoColaborador",
 *     description="CargoColaborador model",
 *     @OA\Property(property="id", type="integer", format="int64", description="CargoColaborador ID"),
 *     @OA\Property(property="name", type="string", description="CargoColaborador name"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation date"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update date"),
 * )
 */
class CargoColaboradorController extends Controller
{
    protected $cargoColaboradorService;

    public function __construct(CargoColaboradorService $cargoColaboradorService)
    {
        $this->cargoColaboradorService = $cargoColaboradorService;
    }

    /**
     * Atualizar a nota de desempenho de um CargoColaborador
     *
     * @OA\Put(
     *     path="/api/cargo-colaboradores/{id}/atualizar-nota",
     *     summary="Atualizar a nota de desempenho de um CargoColaborador",
     *     tags={"CargoColaborador"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do CargoColaborador",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Corpo da solicitação",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nota_desempenho", type="number", format="float", description="Nova nota de desempenho")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Nota de desempenho atualizada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Nota de desempenho atualizada com sucesso")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="CargoColaborador não encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="CargoColaborador não encontrado")
     *         )
     *     )
     * )
     *
     * @param Request $request
     * @param int $id ID do CargoColaborador
     * @return \Illuminate\Http\JsonResponse
     */
    public function atualizarNota(Request $request, $id)
    {
        $nota_desempenho = $request->input('nota_desempenho');
        $result = $this->cargoColaboradorService->atualizarNota($id, $nota_desempenho);
        return response()->json(['message' => 'Nota de desempenho atualizada com sucesso']);
    }
}
