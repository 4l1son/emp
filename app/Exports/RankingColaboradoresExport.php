<?php

namespace App\Exports;

use App\Models\ColaboradoresModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RankingColaboradoresExport implements FromCollection, WithHeadings
{
    protected $colaboradores;

    public function __construct($colaboradores)
    {
        $this->colaboradores = $colaboradores;
    }

    public function collection()
    {
        return ColaboradoresModel::whereIn('id', $this->colaboradores->pluck('id'))
            ->with(['unidade', 'cargo', 'desempenho'])
            ->get()
            ->map(function ($colaborador) {
                return [
                    'Nome' => $colaborador->nome,
                    'CPF' => $colaborador->cpf,
                    'E-mail' => $colaborador->email,
                    'Unidade' => optional($colaborador->unidade)->unidade,
                    'Cargo' => optional($colaborador->cargo)->cargo,
                    'Nota de Desempenho' => optional($colaborador->desempenho)->nota_desempenho,
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
            'Nota de Desempenho',
        ];
    }
}
