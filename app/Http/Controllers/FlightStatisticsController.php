<?php

namespace App\Http\Controllers;
use DB;

use PDF;

class FlightStatisticsController extends Controller
{
    public function downloadPDF() {
        $data = [
            'total_departures' => 670,
            'total_arrivals' => 695,
            'total_operations' => 10357,
            'total_ABI' => 688,
            'total_APL' => 1,
            'total_RPL' => 0,
            'total_pln_finale' => 10113,
        ];

        $pdf = PDF::loadView('pdf.flight_statistics', $data);
        return $pdf->download('flight-statistics.pdf');
    }

    public function downloadsPDF() {
        $firstFiveFlights = DB::table('vol_allfts')
            ->select('call_sign', 'a_dep', 'a_des', 'heure_de_reference', 'immatriculation',)
            ->orderBy('id')
            ->limit(5)
            ->get();
    
        // Convert the data to an array and specify the key for the view.
        $data = ['firstFiveFlights' => $firstFiveFlights];
    
        // Pass the data array to the view
        $pdf = PDF::loadView('pdf.flights', $data);
    
        return $pdf->download('flights.pdf');
    }
    
}
