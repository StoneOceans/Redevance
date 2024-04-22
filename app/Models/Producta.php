<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producta extends Model
{
    use HasFactory;

    protected $fillable = [
        'flpl_call_sign',
        'flpl_depr_airp',
        'flpl_arrv_airp',
        'airc_type',
        'aobt',
        'eobt',
        'file_date',
        'flight_state',
        'flight_type',
        'ifps_registration_mark',
        'initial_flight_rule',
        'nm_ifps_id',
        'nm_tactical_id',
        // Add more fields as needed
    ];
}
