<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producta; // Changed to use Producta model

class ProductController extends Controller
{
    public function index()
    {
        $products = Producta::all(); // Changed to use Producta model
        return view('products.index', ['products' => $products]);   
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'flpl_call_sign' => 'nullable|string|max:9',
            'flpl_depr_airp' => 'nullable|string|max:4',
            'flpl_arrv_airp' => 'nullable|string|max:4',
            'airc_type' => 'nullable|string|max:25',
            'aobt' => 'nullable|integer',
            'eobt' => 'nullable|integer',
            'file_date' => 'nullable|integer',
            'flight_state' => 'nullable|string|max:25',
            'flight_type' => 'nullable|string|max:25',
            'ifps_registration_mark' => 'nullable|string|max:25',
            'initial_flight_rule' => 'nullable|string|max:25',
            'nm_ifps_id' => 'nullable|string|max:25',
            'nm_tactical_id' => 'nullable|string|max:25',
        ]);

        $newProduct = Producta::create($data); // Changed to use Producta model

        return redirect(route('product.index'));
    }

    public function edit(Producta $product) // Changed to use Producta model
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Producta $product, Request $request) // Changed to use Producta model
    {
        $data = $request->validate([
            'flpl_call_sign' => 'nullable|string|max:9',
            'flpl_depr_airp' => 'nullable|string|max:4',
            'flpl_arrv_airp' => 'nullable|string|max:4',
            'airc_type' => 'nullable|string|max:25',
            'aobt' => 'nullable|integer',
            'eobt' => 'nullable|integer',
            'file_date' => 'nullable|integer',
            'flight_state' => 'nullable|string|max:25',
            'flight_type' => 'nullable|string|max:25',
            'ifps_registration_mark' => 'nullable|string|max:25',
            'initial_flight_rule' => 'nullable|string|max:25',
            'nm_ifps_id' => 'nullable|string|max:25',
            'nm_tactical_id' => 'nullable|string|max:25',
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Producta $product) // Changed to use Producta model
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
