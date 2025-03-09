<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Maintenance Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('maintenanceRecords.update', $maintenanceRecord) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Product:</label>
                            <select name="product_id" id="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $maintenanceRecord->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="technician_id" class="block text-gray-700 text-sm font-bold mb-2">Technician:</label>
                            <select name="technician_id" id="technician_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach ($technicians as $technician)
                                    <option value="{{ $technician->id }}" {{ $maintenanceRecord->technician_id == $technician->id ? 'selected' : '' }}>{{ $technician->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="maintenance_date" class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date:</label>
                            <input type="date" name="maintenance_date" id="maintenance_date" value="{{ $maintenanceRecord->maintenance_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="pending" {{ $maintenanceRecord->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $maintenanceRecord->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="overdue" {{ $maintenanceRecord->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>
                            <textarea name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $maintenanceRecord->notes }}</textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Maintenance Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
