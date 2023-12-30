<?php

namespace App\Http\Controllers;

use App\Http\Services\ColaboradoresService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Colaborador",
 *     title="Colaborador",
 *     description="Modelo de dados para um Colaborador",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID do Colaborador"),
 *     @OA\Property(property="nome", type="string", description="Nome do Colaborador"),
 *     @OA\Property(property="cpf", type="string", description="CPF do Colaborador"),
 *     @OA\Property(property="email", type="string", description="E-mail do Colaborador"),
 *     @OA\Property(property="unidade_id", type="integer", format="int64", description="ID da Unidade do Colaborador"),
 *     @OA\Property(property="cargo_id", type="integer", format="int64", description="ID do Cargo do Colaborador"),
 *     @OA\Property(property="nota_desempenho", type="number", format="float", description="Nota de desempenho do Colaborador"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Data de criação"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Data da última atualização"),
 * )
 */
class ColaboradoresController extends Controller
{
    protected $colaboradoresService;

    public function __construct(ColaboradoresService $colaboradoresService)
    {
        $this->colaboradoresService = $colaboradoresService;
    }

    /**
     * @OA\Get(
     *     path="/colaboradores",
     *     tags={"Colaboradores"},
     *     summary="Listar todos os Colaboradores",
     *     description="Retorna uma lista de todos os Colaboradores",
     *     @OA\Response(response="200", description="Lista de Colaboradores", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Colaborador"))),
     * )
     */
    public function index()
    {
        $colaboradores = $this->colaboradoresService->index();
        return response()->json($colaboradores);
    }

    /**
     * @OA\Post(
     *     path="/colaboradores",
     *     tags={"Colaboradores"},
     *     summary="Criar um novo Colaborador",
     *     description="Cria um novo Colaborador com base nos dados fornecidos",
     *     @OA\RequestBody(required=true, description="Dados do novo Colaborador", @OA\JsonContent(ref="#/components/schemas/Colaborador")),
     *     @OA\Response(response="201", description="Colaborador criado com sucesso", @OA\JsonContent(ref="#/components/schemas/Colaborador")),
     * )
     */
    public function store(Request $request)
    {
        $colaborador = $this->colaboradoresService->store($request->all());
        return response()->json($colaborador, 201);
    }

    /**
     * @OA\Get(
     *     path="/colaboradores/{id}",
     *     tags={"Colaboradores"},
     *     summary="Obter detalhes de um Colaborador",
     *     description="Retorna os detalhes de um Colaborador com base no ID",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Colaborador", @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(response="200", description="Detalhes do Colaborador", @OA\JsonContent(ref="#/components/schemas/Colaborador")),
     *     @OA\Response(response="404", description="Colaborador não encontrado", @OA\JsonContent(type="array", @OA\Items(type="string", example="Colaborador não encontrado"))),
     * )
     */
    public function show($id)
    {
        $colaborador = $this->colaboradoresService->show($id);

        if ($colaborador) {
            return response()->json($colaborador);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    /**
     * @OA\Put(
     *     path="/colaboradores/{id}",
     *     tags={"Colaboradores"},
     *     summary="Atualizar um Colaborador",
     *     description="Atualiza um Colaborador com base no ID e nos dados fornecidos",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Colaborador", @OA\Schema(type="integer", format="int64")),
     *     @OA\RequestBody(required=true, description="Dados atualizados do Colaborador", @OA\JsonContent(ref="#/components/schemas/Colaborador")),
     *     @OA\Response(response="200", description="Colaborador atualizado com sucesso", @OA\JsonContent(ref="#/components/schemas/Colaborador")),
     *     @OA\Response(response="404", description="Colaborador não encontrado", @OA\JsonContent(type="array", @OA\Items(type="string", example="Colaborador não encontrado"))),
     * )
     */
    public function update(Request $request, $id)
    {
        $colaborador = $this->colaboradoresService->update($request->all(), $id);

        if ($colaborador) {
            return response()->json($colaborador);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    /**
     * @OA\Delete(
     *     path="/colaboradores/{id}",
     *     tags={"Colaboradores"},
     *     summary="Excluir um Colaborador",
     *     description="Exclui um Colaborador com base no ID",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID do Colaborador", @OA\Schema(type="integer", format="int64")),
     *     @OA\Response(response="200", description="Colaborador excluído com sucesso", @OA\JsonContent(type="array", @OA\Items(type="string", example="Colaborador excluído com sucesso"))),
     *     @OA\Response(response="404", description="Colaborador não encontrado", @OA\JsonContent(type="array", @OA\Items(type="string", example="Colaborador não encontrado"))),
     * )
     */
    public function destroy($id)
    {
        $result = $this->colaboradoresService->destroy($id);

        if ($result) {
            return response()->json(['message' => 'Colaborador excluído com sucesso']);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    /**
     * @OA\Get(
     *     path="/colaboradores/export",
     *     tags={"Colaboradores"},
     *     summary="Exportar Colaboradores",
     *     description="Exporta a lista de Colaboradores",
     *     @OA\Response(response="200", description="Lista de Colaboradores exportada com sucesso", @OA\JsonContent(type="array", @OA\Items(type="string", example="Lista de Colaboradores exportada com sucesso"))),
     * )
     */
    public function exportColaboradores()
    {
        return $this->colaboradoresService->exportColaboradores();
    }

    /**
     * @OA\Get(
     *     path="/colaboradores/export-total",
     *     tags={"Colaboradores"},
     *     summary="Exportar Total de Colaboradores por Unidade",
     *     description="Exporta o total de Colaboradores por Unidade",
     *     @OA\Response(response="200", description="Total de Colaboradores por Unidade exportado com sucesso", @OA\JsonContent(type="array", @OA\Items(type="string", example="Total de Colaboradores por Unidade exportado com sucesso"))),
     * )
     */
    public function exportTotalColaboradoresUnidade()
    {
        return $this->colaboradoresService->exportTotalColaboradoresUnidade();
    }

    /**
     * @OA\Get(
     *     path="/colaboradores/export-ranking",
     *     tags={"Colaboradores"},
     *     summary="Exportar Ranking de Colaboradores",
     *     description="Exporta o ranking de Colaboradores",
     *     @OA\Response(response="200", description="Ranking de Colaboradores exportado com sucesso", @OA\JsonContent(type="array", @OA\Items(type="string", example="Ranking de Colaboradores exportado com sucesso"))),
     * )
     */
    public function exportRankingColaboradores()
    {
        return $this->colaboradoresService->exportRankingColaboradores();
    }
}
