<?php

namespace App\Exports;

use App\Models\Colaboradores;
use App\Models\Unidades;

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
        return Colaboradores::with(['unidade', 'cargo', 'desempenho'])
            ->whereIn('id', $this->colaboradores->pluck('id'))
            ->get()
            ->map(function ($colaborador) {
                return [
                    'Nome' => $colaborador->nome,
                    'CPF' => $colaborador->cpf,
                    'E-mail' => $colaborador->email,
                    'Unidade' => optional($colaborador->unidade)->nome_fantasia,
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
