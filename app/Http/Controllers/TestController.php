<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; 
use App\Models\VolAllft;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    

class TestController extends Controller
{
    public function pdf($id = null)
    {
        $vol_allft = VolAllft::all();
        $vol_allft_paginate = VolAllft::simplePaginate(5);
        return view('vol_allft.pdf', ['vol_allft_paginate' => $vol_allft_paginate, 'vol_allft' => $vol_allft, 'id' => $id]);
    }

    public function lastlogin(Request $request)
    {
        $data = User::latest()->paginate(5);
        return view('users.lastlogin',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function test()
    {
        $firstFiveFlights = DB::table('vol_allfts')
                              ->select('call_sign', 'a_dep', 'a_des', 'heure_de_reference', 'immatriculation')
                              ->orderBy('id')
                              ->limit(20)
                              ->get();
        $total_departures = DB::table('vol_allfts')->where('a_dep', 'LFPG')->count();
        $total_arrivals = DB::table('vol_allfts')->where('a_des', 'LFPG')->count();
        $total_operations = DB::table('vol_allfts')->count();
        $total_ABI = DB::table('vol_allfts')->where('typePlnRDVC', 'ABI')->count();
        $total_APL = DB::table('vol_allfts')->where('typePlnRDVC', 'APL')->count();
        $total_RPL = DB::table('vol_allfts')->where('typePlnRDVC', 'RPL')->count();
        $total_pln_finale = DB::table('vol_allfts')->where('typePlnStan', 'FPL')->count();

        return view('test', [
            'firstFiveFlights' => $firstFiveFlights,
            'total_departures' => $total_departures,
            'total_arrivals' => $total_arrivals,
            'total_operations' => $total_operations,
            'total_ABI' => $total_ABI,
            'total_APL' => $total_APL,
            'total_RPL' => $total_RPL,
            'total_pln_finale' => $total_pln_finale,
        ]);
}
}