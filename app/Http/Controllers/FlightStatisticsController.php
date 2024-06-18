<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Log;

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
            ->limit(20)
            ->get();
    
        // Convert the data to an array and specify the key for the view.
        $data = ['firstFiveFlights' => $firstFiveFlights];
    
        // Pass the data array to the view
        $pdf = PDF::loadView('pdf.flights', $data);
    
        return $pdf->download('flights.pdf');
    }

    public function datetxt($date) {
        $Flights = DB::table('vol_allfts')
            ->select('call_sign', 'a_dep', 'a_des', 'heure_de_reference', 'immatriculation', 'date_de_reference')
            ->where('date_de_reference', '=', $date)
            ->orderBy('id')
            ->get();

        if($Flights->isEmpty()) {
            Log::info("No flights found for the date: {$date}");
            // Optionally, return a different response to indicate no data found
            return response("No flights data available for the selected date: {$date}")
                ->header('Content-Type', 'text/plain');
        }

        $content = "";

        foreach ($Flights as $flight) {
            $content .= "Call Sign: {$flight->call_sign}, Departure: {$flight->a_dep}, Destination: {$flight->a_des}, Time: {$flight->heure_de_reference}, Registration: {$flight->immatriculation}, Date: {$flight->date_de_reference}\n";
        }

        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename=\"flights-${date}.txt\"");
    }

    
    public function index()
    {
        return view('pdf.eurocontrol');
    }

    
    
}
