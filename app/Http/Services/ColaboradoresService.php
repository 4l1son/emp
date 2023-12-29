<?php

namespace App\Http\Services;
use App\Models\Cargos;
use App\Models\CargoColaborador;
use App\Exports\RankingColaboradoresExport;
use App\Models\Colaboradores;
use App\Exports\ColaboradoresExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ColaboradoresService
{
    protected $colaboradores;

    protected $excel;

    public function __construct(Colaboradores $colaboradores, Excel $excel)
    {
        $this->colaboradores = $colaboradores;
        $this->excel = $excel;
    }

    public function index()
    {
        return $this->colaboradores->with(['cargo', 'unidade'])->get();
    }

    public function store(Request $request)
    {
        return $this->colaboradores->create($request->all());
    }


    public function show($id)
    {
        return $this->colaboradores->with(['cargo', 'unidade'])->find($id);
    }

    public function update(array $data, $id)
{
    $colaborador = $this->colaboradores->find($id);

    if ($colaborador) {
        $colaborador->update($data);
        return $colaborador;
    }

    return response()->json(['message' => 'Colaborador não encontrado'], 404);
}


public function destroy($id)
{
    try {
        $cargo = Cargos::findOrFail($id);

        $colaboradoresIds = $cargo->colaboradores->pluck('id')->toArray();

        $cargo->colaboradores()->detach();

        Colaboradores::whereIn('id', $colaboradoresIds)->delete();

        $cargo->delete();

        return response()->json(['message' => 'Cargo e colaboradores associados excluídos com sucesso']);
    } catch (ModelNotFoundException $e) {
        return response()->json(['message' => 'Cargo não encontrado'], 404);
    }
}



    public function exportColaboradores()
    {
        return Excel::download(new ColaboradoresExport, 'colaboradores.xlsx');
    }

    public function exportTotalColaboradoresUnidade()
    {
        return Excel::download(new TotalColaboradoresUnidadeExport, 'total_colaboradores_unidade.xlsx');
    }


    public function exportRankingColaboradores()
    {
        $colaboradores = CargoColaborador::orderByDesc('nota_desempenho')->get();
        return Excel::download(new RankingColaboradoresExport($colaboradores), 'ranking_colaboradores.xlsx');
    }
}

