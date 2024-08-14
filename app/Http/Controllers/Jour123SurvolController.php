<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jour123Survol;

class Jour123SurvolController extends Controller
{
    // Display a listing of the resource
    public function index(Request $request)
    {
        $items = Jour123Survol::paginate(10); // Adjust pagination as needed
        $selectedItem = null;

        if ($request->has('id')) {
            $selectedItem = Jour123Survol::find($request->id);
        }

        return view('jour123survol.index', compact('items', 'selectedItem'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('jour123survol.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'sequence_number' => 'required|unique:jour_123_survol',
            'code' => 'required',
            'time_of_departure_entry' => 'required',
            'departure_aerodrome' => 'required',
            'arrival_aerodrome' => 'required',
            'flight_identification' => 'required',
            'main_Exemption_code' => 'required',
            'type_of_aircraft' => 'required',
            'operator' => 'required',
            'aircraft_Registration' => 'required',
            'comment1' => 'nullable',
            'flight_date' => 'nullable',
            'iFPLID' => 'nullable',
            'planned_aerodrome' => 'nullable',
            'charging_zone_overflow' => 'nullable',
            'entry_point' => 'nullable',
            'exit_point' => 'nullable',
            'sup_exemption_code' => 'nullable',
            'source_of_the_Aircraft_Address' => 'nullable',
            '24_bit_Aircraft_Address' => 'nullable',
            'comment2' => 'nullable',
            'case7' => 'nullable',
            'case8' => 'nullable',
            'case9' => 'nullable',
            'case10' => 'nullable',
            'case13' => 'nullable',
            'case15' => 'nullable',
            'case16' => 'nullable',
            'case18' => 'nullable',
            'ccrArrival' => 'nullable',
            'front_alg_fr' => 'nullable',
            'premier_plot_fr' => 'nullable',
            'modes_fr' => 'nullable',
            'type_Avion_Survol' => 'nullable',
        ]);

        Jour123Survol::create($validatedData);

        return redirect()->route('jour123survol.index')->with('success', 'Record created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $jour_123_survol = Jour123Survol::findOrFail($id);
    
        if (request()->expectsJson()) {
            return response()->json($jour_123_survol);
        }
    
        return view('jour123survol.show', compact('jour_123_survol'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $jour_123_survol = Jour123Survol::findOrFail($id);
        return view('jour123survol.edit', compact('jour_123_survol'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'sequence_number' => 'required',
            'code' => 'required',
            'time_of_departure_entry' => 'required',
            'departure_aerodrome' => 'required',
            'arrival_aerodrome' => 'required',
            'flight_identification' => 'required',
            'main_Exemption_code' => 'required',
            'type_of_aircraft' => 'required',
            'operator' => 'required',
            'aircraft_Registration' => 'required',
            'comment1' => 'nullable',
            'flight_date' => 'nullable',
            'iFPLID' => 'nullable',
            'planned_aerodrome' => 'nullable',
            'charging_zone_overflow' => 'nullable',
            'entry_point' => 'nullable',
            'exit_point' => 'nullable',
            'sup_exemption_code' => 'nullable',
            'source_of_the_Aircraft_Address' => 'nullable',
            '24_bit_Aircraft_Address' => 'nullable',
            'comment2' => 'nullable',
            'case7' => 'nullable',
            'case8' => 'nullable',
            'case9' => 'nullable',
            'case10' => 'nullable',
            'case13' => 'nullable',
            'case15' => 'nullable',
            'case16' => 'nullable',
            'case18' => 'nullable',
            'ccrArrival' => 'nullable',
            'front_alg_fr' => 'nullable',
            'premier_plot_fr' => 'nullable',
            'modes_fr' => 'nullable',
            'type_Avion_Survol' => 'nullable',
        ]);

        $jour_123_survol = Jour123Survol::findOrFail($id);
        $jour_123_survol->update($validatedData);

        return redirect()->route('jour123survol.index')->with('success', 'Record updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $item = Jour123Survol::findOrFail($id);
        $item->delete();

        return redirect()->route('jour123survol.index')->with('success', 'Item deleted successfully');
    }
}

