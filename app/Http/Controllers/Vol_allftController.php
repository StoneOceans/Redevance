<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product3;

class Vol_allftController extends Controller
{
    public function index()
    {
        $vol_allft = Product3::all();
        return view('vol_allft.index', ['vol_allft' => $vol_allft]); // Changed variable name to 'vol_allft'
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

    $newVol = Product3::create($data);

    return redirect(route('vol_allft.index'));
}

public function edit(Product3 $vol_allft)
{
    return view('vol_allft.edit', ['vol_allft' => $vol_allft]);
}

public function update(Product3 $vol_allft, Request $request)
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


    public function destroy(Product3 $vol_allft)
    {
        $vol_allft->delete();
        return redirect(route('vol_allft.index'))->with('success', 'Product Deleted Successfully');
    }
}
