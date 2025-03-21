<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i>Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-users mr-2"></i>Manage Users
                </a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('admin.maintenanceRecords.index') }}" class="block py-2 px-4 bg-indigo-900">
                    <i class="fas fa-wrench mr-2"></i>Manage Records
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-chart-bar mr-2"></i>Reports
                </a>
            </nav>
            <div class="mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-comment mr-2"></i>Give Feedback
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-info-circle mr-2"></i>About
                </a>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-cog mr-2"></i>Settings
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-grow p-8">
            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-5">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Maintenance Record #{{ $maintenanceRecord->id }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Detailed maintenance record</p>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product</label>
                                <p class="mt-1 text-gray-900">{{ $maintenanceRecord->product->name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Technician</label>
                                <p class="mt-1 text-gray-900">{{ $maintenanceRecord->technician->name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                                    {{ $maintenanceRecord->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($maintenanceRecord->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($maintenanceRecord->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Maintenance Date</label>
                                <p class="mt-1 text-gray-900">{{ $maintenanceRecord->maintenance_date }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Notes</label>
                                <p class="mt-1 text-gray-900">{{ $maintenanceRecord->notes ?: 'No notes available' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t pt-6 flex justify-between">
                        <a href="{{ route('admin.maintenanceRecords.index') }}" 
                           class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                            Back to List
                        </a>
                        
                        <a href="{{ route('admin.maintenanceRecords.edit', $maintenanceRecord->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Edit Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
