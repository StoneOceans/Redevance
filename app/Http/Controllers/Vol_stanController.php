<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolStan;

class Vol_stanController extends Controller
{
    public function index()
    {
        $vol_stan = VolStan::all();
        return view('vol_stan.index', ['vol_stan' => $vol_stan]);   
    }

    public function create()
    {
        return view('vol_stan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Call_sign' => 'nullable|string|max:25',
            'A_dep' => 'nullable|string|max:25',
            'A_des' => 'nullable|string|max:25',
            'heure_entree' => 'nullable|string|max:25',
            'Immatriculation' => 'nullable|string|max:25',
            'Date_file' => 'nullable|string|max:25',
            'Date_flight' => 'nullable|string|max:25',
            'pln_oaci' => 'nullable|string|max:25',
            'adresse_mac' => 'nullable|string|max:25',
            'ifpl_id' => 'nullable|string|max:25',
            'code_examption' => 'nullable|string|max:25',
            'code_operateur' => 'nullable|string|max:25',
        ]);

        $newVol = VolStan::create($data);

        return redirect(route('vol_stan.index'));
    }

    public function edit(VolStan $vol_stan)
    {
        return view('vol_stan.edit', ['vol_stan' => $vol_stan]);
    }

    public function update(VolStan $vol_stan, Request $request)
    {
        $data = $request->validate([
            'Call_sign' => 'nullable|string|max:25',
            'A_dep' => 'nullable|string|max:25',
            'A_des' => 'nullable|string|max:25',
            'heure_entree' => 'nullable|string|max:25',
            'Immatriculation' => 'nullable|string|max:25',
            'Date_file' => 'nullable|string|max:25',
            'Date_flight' => 'nullable|string|max:25',
            'pln_oaci' => 'nullable|string|max:25',
            'adresse_mac' => 'nullable|string|max:25',
            'ifpl_id' => 'nullable|string|max:25',
            'code_examption' => 'nullable|string|max:25',
            'code_operateur' => 'nullable|string|max:25',
        ]);

        $vol_stan->update($data);

        return redirect(route('vol_stan.index'))->with('success', 'Vol Stan Updated Successfully');
    }

    public function destroy(VolStan $vol_stan)
    {
        $vol_stan->delete();
        return redirect(route('vol_stan.index'))->with('success', 'Vol Stan Deleted Successfully');
    }
}