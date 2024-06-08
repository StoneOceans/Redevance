<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol_Allft extends Model
{
    use HasFactory;

    protected $fillable = [
        'Call_sign',
        'A_dep',
        'A_des',
        'heure_entree',
        'Immatriculation',
        'Date_file',
        'Date_flight',
        'adresse_mac',
        'ifpl_id',
        'code_examption',
        'code_operateur',
    ];
}
