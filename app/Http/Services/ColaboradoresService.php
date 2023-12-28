<?php

namespace App\Http\Services;

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

    public function update(Request $request, $id)
    {
        $colaborador = $this->colaboradores->find($id);

        if ($colaborador) {
            $colaborador->update($request->all());
            return $colaborador;
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    public function destroy($id)
    {
        $colaborador = $this->colaboradores->find($id);

        if ($colaborador) {
            $colaborador->delete();
            return response()->json(['message' => 'Colaborador excluído com sucesso']);
        }

        return response()->json(['message' => 'Colaborador não encontrado'], 404);
    }

    public function exportColaboradores()
    {
        $colaboradores = $this->colaboradores->with(['unidade', 'cargo'])->get();
        return $this->excel::download(new ColaboradoresExport($colaboradores), 'colaboradores.xlsx');
    }
}
