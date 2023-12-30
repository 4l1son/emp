<?php

namespace App\Http\Services;

use App\Models\UnidadesModel;
use Illuminate\Http\Request;

class UnidadesService 
{
    protected $unidades;

    public function __construct(UnidadesModel $unidades)
    {
        $this->unidades = $unidades;
    }

    public function index()
    {
        return $this->unidades->all();
    }

    public function store(Request $request)
    {
        return $this->unidades->create($request->all());
    }

    public function show($id)
    {
        return $this->unidades->find($id);
    }

    public function update(Request $request, $id)
    {
        $unidade = $this->unidades->find($id);

        if ($unidade) {
            $unidade->update($request->all());
            return $unidade;
        }

        return response()->json(['message' => 'Unidade não encontrada'], 404);
    }

    public function destroy($id)
    {
        $unidade = $this->unidades->find($id);

        if ($unidade) {
            $unidade->delete();
            return response()->json(['message' => 'Unidade excluída com sucesso']);
        }

        return response()->json(['message' => 'Unidade não encontrada'], 404);
    }
}
