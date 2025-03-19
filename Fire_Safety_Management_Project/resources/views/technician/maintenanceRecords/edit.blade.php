<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Edit Maintenance Record</h2>
                    
                    <form action="{{ route('technician.maintenanceRecords.update', $maintenanceRecord->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Read-only Product Info -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Product</label>
                            <p class="w-full border rounded py-2 px-3 bg-gray-100">
                                {{ $maintenanceRecord->product->name }}
                            </p>
                        </div>

                        <!-- Maintenance Date -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date</label>
                            <input type="date" name="maintenance_date" 
                                   value="{{ $maintenanceRecord->maintenance_date->format('Y-m-d') }}" 
                                   class="w-full border rounded py-2 px-3" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status" class="w-full border rounded py-2 px-3" required>
                                <option value="pending" {{ $maintenanceRecord->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $maintenanceRecord->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="overdue" {{ $maintenanceRecord->status === 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                        </div>

                        <!-- Notes -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
                            <textarea name="notes" rows="4" 
                                class="w-full border rounded py-2 px-3">{{ $maintenanceRecord->notes }}</textarea>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('technician.dashboard') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
