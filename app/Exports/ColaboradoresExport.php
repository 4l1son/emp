<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\ColaboradoresModel;
use App\Models\CargosModel;

class ColaboradoresExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ColaboradoresModel::with(['unidade', 'cargo'])
            ->get()
            ->map(function ($colaborador) {
                return [
                    'Nome' => $colaborador->nome,
                    'CPF' => $colaborador->cpf,
                    'E-mail' => $colaborador->email,
                    'Unidade' => optional($colaborador->unidade)->nome_fantasia,
                    'Cargo' => optional($colaborador->cargo)->cargo,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nome',
            'CPF',
            'E-mail',
            'Unidade',
            'Cargo',
        ];
    }
}
