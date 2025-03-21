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
                    <i class="fas fa-wrench mr-2"></i>Manage Maintenance
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
        <div class="ml-64 p-8 w-full">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('admin.maintenanceRecords.update', $maintenanceRecord) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Product Selection -->
                                <div class="mb-4">
                                    <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Product:</label>
                                    <select name="product_id" id="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        @foreach ($forms['products'] as $product)
                                            <option value="{{ $product->id }}" {{ $maintenanceRecord->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Technician Selection -->
                                <div class="mb-4">
                                    <label for="technician_id" class="block text-gray-700 text-sm font-bold mb-2">Technician:</label>
                                    <select name="technician_id" id="technician_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        @foreach ($forms['technicians'] as $technician)
                                            <option value="{{ $technician->id }}" {{ $maintenanceRecord->technician_id == $technician->id ? 'selected' : '' }}>{{ $technician->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Maintenance Date -->
                                <div class="mb-4">
                                    <label for="maintenance_date" class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date:</label>
                                    <input type="date" name="maintenance_date" id="maintenance_date" value="{{ $maintenanceRecord->maintenance_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>

                                <!-- Status Selection -->
                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                                    <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        <option value="pending" {{ $maintenanceRecord->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="completed" {{ $maintenanceRecord->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="overdue" {{ $maintenanceRecord->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                    </select>
                                </div>

                                <!-- Notes -->
                                <div class="mb-4">
                                    <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>
                                    <textarea name="notes" id="notes" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $maintenanceRecord->notes }}</textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Update Maintenance Record
                                    </button>
                                    <a href="{{ route('admin.maintenanceRecords.index') }}" class="bg-gray-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
