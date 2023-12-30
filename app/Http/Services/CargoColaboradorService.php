<?php

namespace App\Http\Services;

use App\Models\CargoColaboradorModel;

class CargoColaboradorService
{
    public function atualizarNota($id, $nota_desempenho)
    {
        $cargoColaborador = CargoColaboradorModel::find($id);

        if (!$cargoColaborador) {
            return ['success' => false, 'message' => 'CargoColaborador não encontrado'];
        }

        $cargoColaborador->nota_desempenho = $nota_desempenho;
        $cargoColaborador->save();

        return ['success' => true, 'message' => 'Nota de desempenho atualizada com sucesso'];
    }
}
