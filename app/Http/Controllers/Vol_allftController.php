<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolAllft;

class Vol_allftController extends Controller
{
    public function index($id = null)
    {
        $vol_allft = VolAllft::all();
        $vol_allft_paginate = VolAllft::simplepaginate(5); // Paginate with 5 items per page
        return view('vol_allft.index', ['vol_allft_paginate' => $vol_allft_paginate,'vol_allft' => $vol_allft, 'id' => $id]); // Changed variable name to 'vol_allft'

    }

    public function create()
    {
        return view('vol_allft.create');
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
        'adresse_mac' => 'nullable|string|max:25',
        'ifpl_id' => 'nullable|string|max:25',
        'code_examption' => 'nullable|string|max:25',
        'code_operateur' => 'nullable|string|max:25',
    ]);

    $newVol = VolAllft::create($data);

    return redirect(route('vol_allft.index'));
}

public function edit(Vol_Allft $vol_allft)
{
    return view('vol_allft.edit', ['vol_allft' => $vol_allft]);
}

public function update(Vol_Allft $vol_allft, Request $request)
{
    $data = $request->validate([
        'Call_sign' => 'nullable|string|max:25',
        'A_dep' => 'nullable|string|max:25',
        'A_des' => 'nullable|string|max:25',
        'heure_entree' => 'nullable|string|max:25',
        'Immatriculation' => 'nullable|string|max:25',
        'Date_file' => 'nullable|string|max:25',
        'Date_flight' => 'nullable|string|max:25',
        'adresse_mac' => 'nullable|string|max:25',
        'ifpl_id' => 'nullable|string|max:25',
        'code_examption' => 'nullable|string|max:25',
        'code_operateur' => 'nullable|string|max:25',
    ]);

    $vol_allft->update($data);
        // var_dump($vol_allft);
        // die();

    return redirect(route('vol_allft.index'))->with('success', 'Vol Updated Successfully');
}


    public function destroy(Vol_Allft $vol_allft)
    {
        $vol_allft->delete();
        return redirect(route('vol_allft.index'))->with('success', 'Product Deleted Successfully');
    }
}
