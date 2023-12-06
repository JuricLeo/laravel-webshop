<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('dashboard', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv_proizvoda' => 'required',
            'opis' => 'nullable',
            'cijena' => 'required|numeric',
            'dostupna_kolicina' => 'required|integer',
        ]);

        $product = new Product;

        $product->naziv_proizvoda = $request->input('naziv_proizvoda');
        $product->opis = $request->input('opis');
        $product->cijena = $request->input('cijena');
        $product->dostupna_kolicina = $request->input('dostupna_kolicina');

        $product->user_id = auth()->id();

        $product->save();

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno dodan.');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv_proizvoda' => 'required',
            'opis' => 'nullable',
            'cijena' => 'required|numeric',
            'dostupna_kolicina' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno ažuriran.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Proizvod je uspješno izbrisan.');
    }
}
