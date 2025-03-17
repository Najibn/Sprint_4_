<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MaintenanceRecord;
use Illuminate\Support\Facades\Auth;  

class CustomerController extends Controller
{
    /**
     * Display the customer dashboard with available products.
     */
    public function index()
    {
        $products = Product::where('status', 'Active')->get();
        return view('customer.dashboard', compact('products'));
    }

    /**
     * Assign a product to the logged-in customer.
     */
    public function addProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->user_id = Auth::id();
        $product->save();

        return redirect()->route('customer.dashboard')->with('success', 'Product added successfully!');
    }

    /**
     * Show details for a specific product, including maintenance records.
     */
    public function showProductDetails($productId)
    {
        $product = Product::findOrFail($productId);
        $maintenanceRecords = MaintenanceRecord::where('product_id', $productId)->get();

        return view('customer.product_details', compact('product', 'maintenanceRecords'));
    }
    
}
