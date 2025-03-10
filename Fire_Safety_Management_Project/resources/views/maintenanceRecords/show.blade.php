<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Maintenance Record Details') }}
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('maintenanceRecords.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-9h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    New Record
                </a>
                <a href="{{ route('maintenanceRecords.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="border-b border-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Maintenance Record #{{ $maintenanceRecord->id }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            maintenance record Detailed
                        </p>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Product
                                </label>
                                <div class="mt-1">
                                    <p class="text-gray-900">{{ $maintenanceRecord->product->name }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Technician
                                </label>
                                <div class="mt-1">
                                    <p class="text-gray-900">{{ $maintenanceRecord->technician->name }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Status
                                </label>
                                <div class="mt-1">
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                                        {{ $maintenanceRecord->status === 'Completed' ? 'bg-green-100 text-green-800' : 
                                           ($maintenanceRecord->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ $maintenanceRecord->status }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Maintenance Date
                                </label>
                                <div class="mt-1">
                                    <p class="text-gray-900">{{ $maintenanceRecord->maintenance_date }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Notes
                                </label>
                                <div class="mt-1">
                                    <textarea rows="4" 
                                              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                              readonly>{{ $maintenanceRecord->notes }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t pt-6">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('maintenanceRecords.edit', $maintenanceRecord->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Update Record
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>