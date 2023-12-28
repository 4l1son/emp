<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Colaboradores;

class ColaboradoresExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Colaboradores::with(['unidade', 'cargo'])
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
