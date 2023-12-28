<?php

namespace App\Exports;

use App\Models\Unidades;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TotalColaboradoresUnidadeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Unidades::withCount('colaboradores')
            ->get()
            ->map(function ($unidade) {
                return [
                    'Nome Fantasia' => $unidade->nome_fantasia,
                    'Razão Social' => $unidade->razao_social,
                    'CNPJ' => $unidade->cnpj,
                    'Total de Colaboradores' => $unidade->colaboradores_count,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nome Fantasia',
            'Razão Social',
            'CNPJ',
            'Total de Colaboradores',
        ];
    }
}
