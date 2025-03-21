<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('technician.dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-list mr-2"></i> Dashboard
                </a>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-tools mr-2"></i> Maintenance Tasks
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-chart-bar mr-2"></i> Reports
                </a>
            </nav>
            <div class="mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-comment mr-2"></i> Feedback
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-info-circle mr-2"></i> About
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="py-12">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Maintenance Record Details</h2>
                    <a href="{{ route('technician.maintenanceRecords.edit', $maintenanceRecord->id) }}" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit Record
                    </a>
                </div>

                <!-- Maintenance Record Details -->
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- Grid Layout -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Product Information -->
                                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                    <h3 class="text-lg font-semibold mb-4">Product Information</h3>
                                    <div class="space-y-2 text-sm text-gray-700">
                                        <p><strong>ID:</strong> {{ $maintenanceRecord->product->id }}</p>
                                        <p><strong>Serial Number:</strong> {{ $maintenanceRecord->product->serial_number }}</p>
                                        <p><strong>Name:</strong> {{ $maintenanceRecord->product->name }}</p>
                                        <p><strong>Type:</strong> {{ $maintenanceRecord->product->type }}</p>
                                        <p><strong>Type Capacity:</strong> {{ $maintenanceRecord->product->type_capacity }}</p>
                                        <p><strong>Status:</strong> {{ $maintenanceRecord->product->status }}</p>
                                        <p><strong>Assigned User:</strong> 
                                            {{ $maintenanceRecord->product->user->name ?? 'Not assigned' }}
                                            @if(isset($maintenanceRecord->product->user->role) && $maintenanceRecord->product->user->role === 'customer')
                                                (Customer)
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Maintenance Details -->
                                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                                    <h3 class="text-lg font-semibold mb-4">Maintenance Details</h3>
                                    <div class="space-y-2 text-sm text-gray-700">
                                        <p><strong>Date:</strong> {{ $maintenanceRecord->maintenance_date->format('M d, Y') }}</p>
                                        <p><strong>Status:</strong> 
                                            <span class="px-2 py-1 text-sm rounded-full 
                                                @php
                                                    $statusClasses = match($maintenanceRecord->status) {
                                                        'completed' => 'bg-green-100 text-green-800',
                                                        'overdue' => 'bg-red-100 text-red-800',
                                                        default => 'bg-yellow-100 text-yellow-800',
                                                    };
                                                @endphp
                                                {{ $statusClasses }}">
                                                {{ ucfirst($maintenanceRecord->status) }}
                                            </span>
                                        </p>
                                        <p><strong>Technician:</strong> {{ $maintenanceRecord->technician->name }}</p>
                                        <p><strong>Notes:</strong> {{ $maintenanceRecord->notes ?? 'No notes available' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-6 flex items-center justify-end gap-4">
                                <a href="{{ route('technician.dashboard') }}" 
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Back to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
