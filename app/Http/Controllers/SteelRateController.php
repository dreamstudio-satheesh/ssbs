<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SteelRate;
use App\Http\Requests\SteelRateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

class SteelRateController extends Controller
{
    public function index()
    {
        $steelRates = SteelRate::with('product')->latest()->paginate(10);
        return view('steel-rates.index', compact('steelRates'));
    }

    public function create()
    {
        $products = Product::whereDoesntHave('steelRates')->get(['id', 'title']);
        return view('steel-rates.create', compact('products'));
    }

    public function store(SteelRateRequest $request)
    {
        SteelRate::create($request->validated());

        return redirect()->route('steel-rates.index')->with('success', 'Steel rate added successfully.');
    }

    public function edit(SteelRate $steelRate)
    {
        $products = Product::all();
        return view('steel-rates.edit', compact('steelRate', 'products'));
    }

    public function update(SteelRateRequest $request, SteelRate $steelRate)
    {
        $steelRate->update($request->validated());

        return redirect()->route('steel-rates.index')->with('success', 'Steel rate updated successfully.');
    }

    public function destroy(SteelRate $steelRate)
    {
        $steelRate->delete();

        return redirect()->route('steel-rates.index')->with('success', 'Steel rate deleted successfully.');
    }
}