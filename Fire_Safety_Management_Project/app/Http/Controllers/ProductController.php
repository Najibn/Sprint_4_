<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $users = User::all();
        return view('products.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|in:Fire Extinguisher,Smoke Detector,Fire Alarm',
            'type' => 'required|in:water,foam,CO2,DCP',
            'type_capacity' => 'required|string',
            'serial_number' => 'required|string|unique:products',
            'status' => 'required|in:Active,Expired,Needs Maintenance',
            'location' => 'required|string',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    // viewing specifics products
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $users = User::all();
        return view('products.edit', compact('product', 'users'));
    }


    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|in:Fire Extinguisher,Smoke Detector,Fire Alarm',
            'type' => 'required|in:water,foam,CO2,DCP',
            'type_capacity' => 'required|string',
            'serial_number' => 'required|string|unique:products,serial_number,' . $product->id,
            'status' => 'required|in:Active,Expired,Needs Maintenance',
            'location' => 'required|string',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
