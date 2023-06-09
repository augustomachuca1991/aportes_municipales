<?php

namespace App\Imports;

use App\Models\DeclaracionJurada;
use App\Models\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class DeclaracionesJuradasRectify implements ToCollection, WithChunkReading, ShouldQueue,WithHeadingRow,WithCustomCsvSettings
{
    use Importable;

    protected $file;
    protected $declararacionJurada;

    public function __construct(File $file)
    {
        $this->file = $file;
        $this->declararacionJurada = $file->declaracionesjuradas->first();
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row)
        {
            $this->declararacionJurada->declaracionesjuradaslines[$key]->update([
                'nombre' => 'se actualizó',
                'cuil' => $row['cuil'],
                'fecha_nac' => date('Y-m-d', strtotime($row['fecha_nac'])),
                'sexo' => $row['sexo'],
                'cod_estado_civil' => $row['cod_estado_civil'],
                'puesto_laboral' => $row['puesto_laboral'],
                'cargo' => $row['cargo'],
                'fecha_ingreso' => date('Y-m-d', strtotime($row['fecha_ingreso'])),
                'fecha_egreso' => date('Y-m-d', strtotime($row['fecha_ingreso'])),
                'nl_desde_nro' => $row['nl_desde_nro'],
                'nl_hasta_nro' => $row['nl_hasta_nro'],
                'nl_desde_anio' => $row['nl_desde_anio'],
                'nl_hasta_anio' => $row['nl_hasta_anio'],
                'nl_desde_otro' => $row['nl_desde_otro'],
                'nl_hasta_otro' => $row['nl_hasta_otro'],
                'cod_categoria' => $row['cod_categoria'],
                'categoria' => $row['categoria'],
                'cod_clase' => $row['cod_clase'],
                'clase' => $row['clase'],
                'cod_estado' => $row['cod_estado'],
                'detalle' => '1@dfhsfkj@unidad en concepto@1@5000|2@qweqweqew@unidad en concepto@1@30000',
            ]);
        }

        $this->file->apply = true;
        $this->file->status = false;
        $this->file->save();
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '',
            'input_encoding' => 'UTF-8'
        ];
    }
}
