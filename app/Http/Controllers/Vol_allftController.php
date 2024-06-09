<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolAllft;
use App\Imports\VolAllftImport;
use Maatwebsite\Excel\Facades\Excel;

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
            'heure_de_reference' => 'nullable|string',
            'date_de_reference' => 'nullable|string',
            'immatriculation' => 'nullable|string',
            'adresse_mac' => 'nullable|string',
            'ifpl_id' => 'nullable|string',
            'code_examption' => 'nullable|string',
            'code_operateur' => 'nullable|string',
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
        
    }

    public function destroy(VolAllft $vol_allft)
    {
        $vol_allft->delete();
        return redirect(route('vol_allft.index'))->with('success', 'Vol Deleted Successfully');
    }

    public function showImportForm()
    {
        return view('vol_allft.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_csv' => 'required|mimes:csv,txt',
        ]);

        Excel::import(new VolAllftImport, $request->file('file_csv'));

        return redirect()->route('vol_allft.index')->with('success', 'CSV data imported successfully!');
    }
}

