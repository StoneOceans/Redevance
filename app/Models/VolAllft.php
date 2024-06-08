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
        'heure_entree',
        'immatriculation',
        'date_file',
        'date_flight',
        'adresse_mac',
        'ifpl_id',
        'code_examption',
        'code_operateur',
        'rangTransaction',
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
        'accuseTransaction',
        'ccrArrival',
    ];
}
