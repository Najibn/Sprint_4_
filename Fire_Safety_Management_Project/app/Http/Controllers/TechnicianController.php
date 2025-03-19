<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MaintenanceRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TechnicianController extends Controller
{
    use AuthorizesRequests;

        // Show technician dashboard with their maintenance records
        public function dashboard()
        {
            $maintenanceRecords = MaintenanceRecord::where('technician_id', Auth::id())
        ->with(['product', 'technician'])
        ->paginate(10);
    
            return view('technician.dashboard', compact('maintenanceRecords'));
        }
    
        // Show details of a specific maintenance record
        public function show($id)
        {
            $maintenanceRecord = MaintenanceRecord::where('technician_id', Auth::id())
                ->with(['product', 'technician'])
                ->findOrFail($id);
    
            return view('technician.maintenanceRecords.show', compact('maintenanceRecord'));
        }
    
        // Show edit form for a maintenance record
        public function edit($id)
        {
            $maintenanceRecord = MaintenanceRecord::where('technician_id', Auth::id())
                ->findOrFail($id);
    
            return view('technician.maintenanceRecords.edit', compact('maintenanceRecord'));
        }
    
        // Update a maintenance record
        public function update(Request $request, $id)
        {
            $maintenanceRecord = MaintenanceRecord::where('technician_id', Auth::id())
                ->findOrFail($id);
    
            $validatedData = $request->validate([
                'status' => 'required|in:pending,completed,overdue',
                'maintenance_date' => 'required|date',
                'notes' => 'nullable|string',
            ]);
    
            $maintenanceRecord->update($validatedData);
    
            return redirect()->route('technician.dashboard')
                ->with('success', 'Maintenance record updated successfully.');
        }
    
        // Create new maintenance record form
       /* public function create()
        {

            $products = Product::where('user_id', Auth::id())->get();
    
    $latestMaintenanceDates = MaintenanceRecord::whereIn('product_id', $products->pluck('id'))
        ->selectRaw('product_id, MAX(maintenance_date) as latest_date')
        ->groupBy('product_id')
        ->pluck('latest_date', 'product_id');

    return view('technician.maintenanceRecords.create', compact('products', 'latestMaintenanceDates'));

            /*$products = Product::whereHas('maintenanceRecords', function ($query) {
                $query->where('technician_id', Auth::id());
            })->get();
        
            return view('technician.maintenanceRecords.create', compact('products'));
        }
        */
    
        // Store new maintenance record
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'product_id' => [
                    'required',
                    // Checking for product thats is assigned to current technician
                    'exists:products,id,assigned_to,'.Auth::id() 
                ],
                'maintenance_date' => 'required|date',
                'status' => 'required|in:pending,completed,overdue',
                'notes' => 'nullable|string',
            ]);
        
            MaintenanceRecord::create([
                'technician_id' => Auth::id(),
                'product_id' => $validatedData['product_id'],
                'maintenance_date' => $validatedData['maintenance_date'],
                'status' => $validatedData['status'],
                'notes' => $validatedData['notes'],
            ]);
        
            return redirect()->route('technician.dashboard')
                ->with('success', 'Maintenance record created successfully.');
        }
}
