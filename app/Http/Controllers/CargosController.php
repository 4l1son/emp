<?php

namespace App\Http\Controllers;

use App\Http\Services\CargosService;
use Illuminate\Http\Request;

use OpenApi\Annotations as OA;

class CargosController extends Controller
{
    protected $cargosService;

    public function __construct(CargosService $cargosService)
    {
        $this->cargosService = $cargosService;
    }

    /**
     * @OA\Get(
     *     path="/cargos",
     *     tags={"Cargos"},
     *     summary="Listar todos os Cargos",
     *     description="Retorna uma lista de todos os Cargos",
     *     @OA\Response(response="200", description="Lista de Cargos", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Cargo"))),
     * )
     */
    public function index()
    {
        $cargos = $this->cargosService->index();
        return response()->json($cargos);
    }

    /**
     * @OA\Post(
     *     path="/cargos",
     *     tags={"Cargos"},
     *     summary="Criar um novo Cargo",
     *     description="Cria um novo Cargo",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Cargo")
     *     ),
     *     @OA\Response(response="201", description="Cargo criado com sucesso", @OA\JsonContent(ref="#/components/schemas/Cargo")),
     *     @OA\Response(response="422", description="Erro de validação", @OA\JsonContent(type="object", @OA\Property(property="message", type="string"))),
     * )
     */
    public function store(Request $request)
    {
        $response = $this->cargosService->store($request->all());
        return response()->json($response, 201);
    }

    /**
     * @OA\Get(
     *     path="/cargos/{id}",
     *     tags={"Cargos"},
     *     summary="Obter detalhes de um Cargo",
     *     description="Retorna detalhes de um Cargo",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Cargo", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Detalhes do Cargo", @OA\JsonContent(ref="#/components/schemas/Cargo")),
     *     @OA\Response(response="404", description="Cargo não encontrado", @OA\JsonContent(type="object", @OA\Property(property="message", type="string"))),
     * )
     */
    public function show($id)
    {
        $cargo = $this->cargosService->show($id);

        if ($cargo) {
            return response()->json($cargo);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }

    
    /**
     * @OA\Put(
     *     path="/cargos/{id}",
     *     tags={"Cargos"},
     *     summary="Atualizar um Cargo",
     *     description="Atualiza um Cargo existente",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Cargo", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Cargo")
     *     ),
     *     @OA\Response(response="200", description="Cargo atualizado com sucesso", @OA\JsonContent(ref="#/components/schemas/Cargo")),
     *     @OA\Response(response="404", description="Cargo não encontrado", @OA\JsonContent(type="object", @OA\Property(property="message", type="string"))),
     * )
     */
    public function update(Request $request, $id)
    {
        $cargo = $this->cargosService->update($request, $id);

        if ($cargo) {
            return response()->json($cargo);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }

    /**
     * @OA\Delete(
     *     path="/cargos/{id}",
     *     tags={"Cargos"},
     *     summary="Excluir um Cargo",
     *     description="Exclui um Cargo existente",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Cargo", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Cargo excluído com sucesso"),
     *     @OA\Response(response="404", description="Cargo não encontrado", @OA\JsonContent(type="object", @OA\Property(property="message", type="string"))),
     * )
     */
    public function destroy($id)
    {
        $result = $this->cargosService->destroy($id);

        if ($result) {
            return response()->json(['message' => 'Cargo excluído com sucesso']);
        }

        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }
}
