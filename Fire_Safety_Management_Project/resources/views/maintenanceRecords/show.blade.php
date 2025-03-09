<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maintenance Record Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Maintenance Record Details</h3>
                        <a href="{{ route('maintenanceRecords.index') }}" class="text-blue-600 hover:text-blue-900">
                            Back to List
                        </a>
                    </div>

                    <div class="mb-4">
                        <label for="product" class="block text-gray-700 text-sm font-bold mb-2">Product:</label>
                        <p>{{ $maintenanceRecord->product->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="technician" class="block text-gray-700 text-sm font-bold mb-2">Technician:</label>
                        <p>{{ $maintenanceRecord->technician->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="maintenance_date" class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date:</label>
                        <p>{{ $maintenanceRecord->maintenance_date }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <p>{{ $maintenanceRecord->status }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>
                        <p>{{ $maintenanceRecord->notes }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
