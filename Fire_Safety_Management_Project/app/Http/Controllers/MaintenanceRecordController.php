<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MaintenanceRecord;

class MaintenanceRecordController extends Controller
{
    public function index()
    {
        $maintenanceRecords = MaintenanceRecord::with('product', 'technician')->get();
        return view('admin.maintenanceRecords.index', compact('maintenanceRecords'));
    }

    public function create()
    {
        $forms = $this->FormInfor();
        return view('admin.maintenanceRecords.create', compact('forms'));
    }

    public function store(Request $request)
    {

        $validatedData = $this->Validation($request);
        
        MaintenanceRecord::create($validatedData);

        return redirect()->route('admin.maintenanceRecords.index')->with('success', 'Maintenance Record created successfully');
    }

    
    public function show(MaintenanceRecord $maintenanceRecord)
    {
        return view('admin.maintenanceRecords.show', compact('maintenanceRecord'));
    }


    public function edit(MaintenanceRecord $maintenanceRecord)
    {

        $forms = $this->FormInfor();

        $products = Product::all();

        return view('admin.maintenanceRecords.edit', compact('maintenanceRecord', 'forms'));
    }


    public function update(Request $request, MaintenanceRecord $maintenanceRecord)
    {
        $validatedData = $this->Validation($request);

        $maintenanceRecord->update($validatedData);

        return redirect()->route('admin.maintenanceRecords.index')->with('success', 'Maintenance Record updated successfully');
    }


    public function destroy(MaintenanceRecord $maintenanceRecord)
    {
        $maintenanceRecord->delete();
        return redirect()->route('admin.maintenanceRecords.index')->with('success', 'Maintenance Record deleted successfully');
    }

    
    //helpers private functions
    private function FormInfor(){

        $products = Product::all();
        $technicians = User::where('role', 'technician')->get();

        return compact('products', 'technicians');

    }
    private function Validation(Request  $request){

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'technician_id' => 'required|exists:users,id',
            'maintenance_date' => 'required|date',
            'status'        => 'required|in:completed,pending,overdue',
            'notes'     => 'nullable|string',
        ]);
        return $validatedData;

    }

}
