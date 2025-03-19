<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MaintenanceRecord;
use Illuminate\Support\Facades\Auth;  

class CustomerController extends Controller
{
    public function dashboard()
    {
        $products = Product::where('user_id', Auth::id())->paginate(10);
        return view('customer.dashboard', compact('products'));
    }

    public function viewProduct($id)
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);
        $maintenanceRecords = $product->maintenanceRecords()->latest()->get();
        return view('customer.products.view', compact('product', 'maintenanceRecords'));
    }

    public function editProduct($id)
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);
        return view('customer.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);
        
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'type'          => 'required|in:water,foam,CO2,DCP',
            'type_capacity' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $product->update($validatedData);

        return redirect()->route('customer.dashboard')->with('success', 'Product updated successfully');
    }
}
