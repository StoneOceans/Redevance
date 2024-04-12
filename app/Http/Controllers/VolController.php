<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolController extends Controller
{
    public function index()
    {
        return view('vol.index');
    }
}
