<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolAllft extends Model
{
    use HasFactory;

    protected $fillable = [
        'call_sign',
        'a_dep',
        'a_des',
        'heure_de_reference',
        'date_de_reference',
        'immatriculation',
        'adresse_mac',
        'ifpl_id',
        'code_examption',
        'code_operateur',
        'finaltransaction',
        'case7',
        'case8',
        'case9',
        'case10',
        'case13',
        'case15',
        'case16',
        'case18',
        'heure',
        'minute',
        'accusetrttransaction',
        'ccrArrival',
    ];
}
