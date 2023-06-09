<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FileExport implements FromCollection, WithHeadings
{

    protected $data;


    public function headings(): array
    {
        return [
            'NOMBRE',
            'DNI',
            'CUIL',
            'FECHA NAC',
            'ESTADO CIVIL',
            'SEXO',
            'DIRECCION',
            'TELEFONO',
            'FECHA INGRESO',
            'FECHA EGRESO',
            'CARGO',
            'SITUACION',
            'ESTADO',
            'BASICO',
            'ANTIGUEDAD',
            'TITULO',
            'PRESENTISMO',
            'ADICIONAL',
            'RESOLUCION',
            'MIN GARANTIZADO',
            'NO REMUNERATIVO',
            'ADICIONAL PLUS',
            'DEDICACION FUNCIONAL',
            'PROLONGACION DE JORNADA',
            'PRODUCTIVIDAD',
        ];
    }


    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
}
