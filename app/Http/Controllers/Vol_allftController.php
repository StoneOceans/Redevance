<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolAllft;
use PDF;

class Vol_allftController extends Controller
{
    public function index($id = null)
    {
        $vol_allft = VolAllft::all();
        $vol_allft_paginate = VolAllft::simplePaginate(5);
        return view('vol_allft.index', ['vol_allft_paginate' => $vol_allft_paginate, 'vol_allft' => $vol_allft, 'id' => $id]);
    }
    
    public function create()
    {
        return view('vol_allft.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'call_sign' => 'nullable|string',
            'a_dep' => 'nullable|string',
            'a_des' => 'nullable|string',
            'heure_de_reference' => ['nullable', 'string', 'regex:/^(?:[01]\d|2[0-3])[0-5]\d$/'],
            'date_de_reference' => 'nullable|string',
            'immatriculation' => 'nullable|string',
            'adresse_mac' => 'nullable|string',
            'ifpl_id' => 'nullable|string',
            'finaltransaction' => 'nullable|string',
            'case7' => 'nullable|string',
            'case8' => 'nullable|string',
            'case9' => 'nullable|string',
            'case10' => 'nullable|string',
            'case13' => 'nullable|string',
            'case15' => 'nullable|string',
            'case16' => 'nullable|string',
            'case18' => 'nullable|string',
            'heure' => 'nullable|string',
            'minute' => 'nullable|string',
            'accusetrttransaction' => 'nullable|string',
            'ccrArrival' => 'nullable|string',
        ]);

        $newVol = VolAllft::create($data);

        return redirect(route('vol_allft.index'));
    }

    public function edit(VolAllft $vol_allft)
    {
        return view('vol_allft.edit', ['vol_allft' => $vol_allft]);
    }

    public function update(Request $request, VolAllft $vol_allft)
    {
        $data = $request->validate([
            'call_sign' => 'nullable|string',
            'a_dep' => 'nullable|string',
            'a_des' => 'nullable|string',
            'heure_de_reference' => ['nullable', 'string', 'regex:/^(?:[01]\d|2[0-3])[0-5]\d$/'],
            'date_de_reference' => 'nullable|string',
            'immatriculation' => 'nullable|string',
            'adresse_mac' => 'nullable|string',
            'ifpl_id' => 'nullable|string',
            'finaltransaction' => 'nullable|string',
            'case7' => 'nullable|string',
            'case8' => 'nullable|string',
            'case9' => 'nullable|string',
            'case10' => 'nullable|string',
            'case13' => 'nullable|string',
            'case15' => 'nullable|string',
            'case16' => 'nullable|string',
            'case18' => 'nullable|string',
            'heure' => 'nullable|string',
            'minute' => 'nullable|string',
            'accusetrttransaction' => 'nullable|string',
            'ccrArrival' => 'nullable|string',
        ]);

        $vol_allft = VolAllft::findOrFail($id);
        $vol_allft->update($data);

        return redirect(route('vol_allft.index'))->with('success', 'Vol Updated Successfully');
    }
    public function destroy(VolAllft $vol_allft)
    {
        $vol_allft->delete();
        return redirect(route('vol_allft.index'))->with('success', 'Vol Deleted Successfully');
    }

    public function downloadPdf($id)
    {
    $vol = VolAllft::findOrFail($id);
    $pdf = PDF::loadView('pdf.vol', compact('vol'));
    return $pdf->download('vol-' . $vol->call_sign . '.pdf');
    }
}

