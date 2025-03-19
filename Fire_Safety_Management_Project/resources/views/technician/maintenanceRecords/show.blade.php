<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Maintenance Record Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Details -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Product Information</h3>
                            <div class="space-y-2">
                                <p><strong>Name:</strong> {{ $maintenanceRecord->product->name }}</p>
                                <p><strong>Type:</strong> {{ $maintenanceRecord->product->type }}</p>
                                <p><strong>Current Status:</strong> {{ $maintenanceRecord->product->status }}</p>
                            </div>
                        </div>

                        <!-- Maintenance Details -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Maintenance Details</h3>
                            <div class="space-y-2">
                                <p><strong>Date:</strong> {{ $maintenanceRecord->maintenance_date->format('M d, Y') }}</p>
                                <p><strong>Status:</strong> <span class="px-2 py-1 text-sm rounded-full 
                                    @php
                                        $statusClasses = match($maintenanceRecord->status) {
                                            'completed' => 'bg-green-100 text-green-800',
                                            'overdue' => 'bg-red-100 text-red-800',
                                            default => 'bg-yellow-100 text-yellow-800',
                                        };
                                    @endphp
                                    class="{{ $statusClasses }}">
                                    {{ ucfirst($maintenanceRecord->status) }}
                                </span></p>
                                <p><strong>Technician:</strong> {{ $maintenanceRecord->technician->name }}</p>
                                <p><strong>Notes:</strong> {{ $maintenanceRecord->notes ?? 'No notes available' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-4">
                        <a href="{{ route('technician.dashboard') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Dashboard
                        </a>
                        <a href="{{ route('technician.maintenanceRecords.edit', $maintenanceRecord->id) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
