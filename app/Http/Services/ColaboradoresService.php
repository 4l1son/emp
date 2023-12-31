<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;

use App\Models\CargosModel;
use App\Models\CargoColaboradorModel;
use App\Exports\RankingColaboradoresExport;
use App\Exports\TotalColaboradoresUnidadeExport;
use App\Models\ColaboradoresModel;
use App\Exports\ColaboradoresExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ColaboradoresService
{
    protected $colaboradores;

    protected $excel;

    public function __construct(ColaboradoresModel $colaboradores, Excel $excel)
    {
        $this->colaboradores = $colaboradores;
        $this->excel = $excel;
    }

    public function index()
    {
        return $this->colaboradores->with(['cargo', 'unidade'])->get();
    }
    public function store(array $data)
    {
        return $this->colaboradores->create($data);
    }
    
    public function show($id)
    {
        return $this->colaboradores->with(['cargo', 'unidade'])->find($id);
    }

    public function update(array $data, $id)
    {
        try {
            $colaborador = $this->colaboradores->findOrFail($id);
            
            if (isset($data['nota_desempenho'])) {
                $colaborador->desempenho()->update(['nota_desempenho' => $data['nota_desempenho']]);
            }
    
            $colaborador->update($data);
    
            return $colaborador;
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Colaborador não encontrado'], 404);
        }
    }
    
    public function destroy($id)
    {
    try {
        $cargo = CargosModel::findOrFail($id);

        $colaboradoresIds = $cargo->colaboradores->pluck('id')->toArray();

        $cargo->colaboradores()->detach();

        ColaboradoresModel::whereIn('id', $colaboradoresIds)->delete();

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
    $colaboradores = CargoColaboradorModel::orderByDesc('nota_desempenho')->get();
    return Excel::download(new RankingColaboradoresExport($colaboradores), 'ranking_colaboradores.xlsx');
}

}

