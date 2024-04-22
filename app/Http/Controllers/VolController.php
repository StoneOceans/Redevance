<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol; // Import the Vol model

class VolController extends Controller
{
    public function index()
    {
        $products = Vol::all(); // Corrected
        return view('vol.index', ['products' => $products]);
    }

    public function create()
    {
        return view('vol.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $newProduct = Vol::create($data); // Corrected

        return redirect(route('vol.index'));
    }
}
