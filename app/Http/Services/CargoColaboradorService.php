<?php

namespace App\Http\Services;

use App\Models\CargoColaborador;

class CargoColaboradorService
{
    public function atualizarNota($id, $nota_desempenho)
    {
        $cargoColaborador = CargoColaborador::find($id);

        if (!$cargoColaborador) {
            return ['success' => false, 'message' => 'CargoColaborador não encontrado'];
        }

        $cargoColaborador->nota_desempenho = $nota_desempenho;
        $cargoColaborador->save();

        return ['success' => true, 'message' => 'Nota de desempenho atualizada com sucesso'];
    }
}
