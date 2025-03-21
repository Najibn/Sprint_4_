<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = $this->getProductsByRole($user);

        return view('admin.products.index', compact('user', 'products'));

    }

    public function create()
    {
        $users = User::all();
        return view('admin.products.create', compact('users'));
    }

    //storing products after vetting
    public function store(Request $request)
    {
        $validatedData = $this->Validation($request);

        Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    // viewing specifics products
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Request $request, Product $product)
    {
        $users = User::all();

        // If the form was submitted, we retain the status
        $status = $request->has('status') ? $request->status : $product->status;
        return view('admin.products.edit', compact('product', 'users'));
    }

    public function update(Request $request, Product $product)
    {

        $validatedData = $this->Validation($request, $product->id);

        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    //helper private functions
    private function Validation(Request $request, $product = null)
    {

        $validatedData = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'name'           => 'required|in:Fire Extinguisher,Smoke Detector,Fire Alarm',
            'type'            => 'required|in:water,foam,CO2,DCP',
            'type_capacity'    => 'required|string',
            'serial_number'    => 'required|string|unique:products,serial_number,' . ($product ?? 'NULL'),
            'status'          => 'required|string',
            'technician_id'  => $request->status === 'Needs Maintenance' ? ['required', 'exists:users,id'] : ['nullable'],
            'location'     => 'required|string',
        ]);
        return $validatedData;
    }

    private function getProductsByRole($user)
    {
        $products = match ($user->role) {
            'customer' => Product::where('status', 'Active')->paginate(12),
            'technician' => Product::where('status', 'Needs Maintenance')->paginate(12),
            'admin'      => Product::with('user')->paginate(12),
            default    => Product::query()->paginate(12), //collect(),to return empty collection if role is unknown or default => abort(403)
        };
        return $products;
    }

}
