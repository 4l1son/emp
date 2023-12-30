<?php

namespace App\Http\Controllers;

use App\Http\Services\UnidadesService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Unidade",
 *     title="Unidade",
 *     description="Modelo de dados para uma Unidade",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID da Unidade"),
 *     @OA\Property(property="nome", type="string", description="Nome da Unidade"),
 *     @OA\Property(property="endereco", type="string", description="Endereço da Unidade"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data da última atualização"),
 * )
 */
class UnidadesController extends Controller
{
    protected $unidadesService;

    public function __construct(UnidadesService $unidadesService)
    {
        $this->unidadesService = $unidadesService;
    }

    /**
     * @OA\Post(
     *     path="/unidades",
     *     tags={"Unidades"},
     *     summary="Criar uma nova Unidade",
     *     description="Cria uma nova Unidade com base nos dados fornecidos",
     *     @OA\RequestBody(required=true, description="Dados da nova Unidade", @OA\JsonContent(ref="#/components/schemas/Unidade")),
     *     @OA\Response(response="201", description="Unidade criada com sucesso", @OA\JsonContent(ref="#/components/schemas/Unidade")),
     * )
     */
    public function store(Request $request)
    {
        return $this->unidadesService->store($request);
    }

    /**
     * @OA\Get(
     *     path="/unidades",
     *     tags={"Unidades"},
     *     summary="Listar todas as Unidades",
     *     description="Retorna uma lista de todas as Unidades",
     *     @OA\Response(response="200", description="Lista de Unidades", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Unidade"))),
     * )
     */
    public function index()
    {
        return $this->unidadesService->index();
    }

    /**
     * @OA\Get(
     *     path="/unidades/{id}",
     *     tags={"Unidades"},
     *     summary="Obter detalhes de uma Unidade",
     *     description="Retorna os detalhes de uma Unidade com base no ID",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da Unidade", @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(response="200", description="Detalhes da Unidade", @OA\JsonContent(ref="#/components/schemas/Unidade")),
     *     @OA\Response(response="404", description="Unidade não encontrada", @OA\JsonContent(type="array", @OA\Items(type="string", example="Unidade não encontrada"))),
     * )
     */
    public function show($id)
    {
        return $this->unidadesService->show($id);
    }

    /**
     * @OA\Put(
     *     path="/unidades/{id}",
     *     tags={"Unidades"},
     *     summary="Atualizar uma Unidade",
     *     description="Atualiza uma Unidade com base no ID e nos dados fornecidos",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da Unidade", @OA\Schema(type="integer", format="int64")),
     *     @OA\RequestBody(required=true, description="Dados atualizados da Unidade", @OA\JsonContent(ref="#/components/schemas/Unidade")),
     *     @OA\Response(response="200", description="Unidade atualizada com sucesso", @OA\JsonContent(ref="#/components/schemas/Unidade")),
     *     @OA\Response(response="404", description="Unidade não encontrada", @OA\JsonContent(type="array", @OA\Items(type="string", example="Unidade não encontrada"))),
     * )
     */
    public function update(Request $request, $id)
    {
        return $this->unidadesService->update($request, $id);
    }

    /**
     * @OA\Delete(
     *     path="/unidades/{id}",
     *     tags={"Unidades"},
     *     summary="Excluir uma Unidade",
     *     description="Exclui uma Unidade com base no ID",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da Unidade", @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(response="200", description="Unidade excluída com sucesso", @OA\JsonContent(type="array", @OA\Items(type="string", example="Unidade excluída com sucesso"))),
     *     @OA\Response(response="404", description="Unidade não encontrada", @OA\JsonContent(type="array", @OA\Items(type="string", example="Unidade não encontrada"))),
     * )
     */
    public function destroy($id)
    {
        return $this->unidadesService->destroy($id);
    }
}
