<?php

namespace App\Imports;

use App\Models\VolAllft;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VolAllftImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new VolAllft([
            'call_sign'          => $row['call_sign'] ?? null,
            'a_dep'              => $row['a_dep'] ?? null,
            'a_des'              => $row['a_des'] ?? null,
            'heure_entree'       => $row['heure_entree'] ?? null,
            'immatriculation'    => $row['immatriculation'] ?? null,
            'date_file'          => $row['date_file'] ?? null,
            'date_flight'        => $row['date_flight'] ?? null,
            'adresse_mac'        => $row['adresse_mac'] ?? null,
            'ifpl_id'            => $row['ifpl_id'] ?? null,
            'code_examption'     => $row['code_examption'] ?? null,
            'code_operateur'     => $row['code_operateur'] ?? null,
            'rangTransaction'    => $row['rangTransaction'] ?? null,
            'case7'              => $row['case7'] ?? null,
            'case8'              => $row['case8'] ?? null,
            'case9'              => $row['case9'] ?? null,
            'case10'             => $row['case10'] ?? null,
            'case13'             => $row['case13'] ?? null,
            'case15'             => $row['case15'] ?? null,
            'case16'             => $row['case16'] ?? null,
            'case18'             => $row['case18'] ?? null,
            'heure'              => $row['heure'] ?? null,
            'minute'             => $row['minute'] ?? null,
            'accuseTransaction'  => $row['accuseTransaction'] ?? null,
            'ccrArrival'         => $row['ccrArrival'] ?? null,
        ]);
    }
}