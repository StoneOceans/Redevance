<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour123Survol extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'jour_123_survol';

    protected $fillable = [
        'sequence_number',
        'code',
        'time_of_departure_entry',
        'departure_aerodrome',
        'arrival_aerodrome',
        'flight_identification',
        'main_Exemption_code',
        'type_of_aircraft',
        'operator',
        'aircraft_Registration',
        'comment1',
        'flight_date',
        'iFPLID',
        'planned_aerodrome',
        'charging_zone_overflow',
        'entry_point',
        'exit_point',
        'sup_exemption_code',
        'source_of_the_Aircraft_Address',
        '24_bit_Aircraft_Address',
        'comment2',
        'case7',
        'case8',
        'case9',
        'case10',
        'case13',
        'case15',
        'case16',
        'case18',
        'ccrArrival',
        'front_alg_fr',
        'premier_plot_fr',
        'modes_fr',
        'type_Avion_Survol',
    ];
}
