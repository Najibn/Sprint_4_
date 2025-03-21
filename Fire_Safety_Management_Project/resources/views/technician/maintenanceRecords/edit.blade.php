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
                    <h2 class="text-xl font-bold text-gray-800">Edit Maintenance Record</h2>
                    <a href="{{ route('technician.dashboard') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                </div>

                <!-- Edit Maintenance Record Form -->
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('technician.maintenanceRecords.update', $maintenanceRecord->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Read-only Product Info -->
                                <div class="mb-4">
                                    <label for="product" class="block text-gray-700 text-sm font-bold mb-2">Product</label>
                                    <p id="product" class="w-full border rounded py-2 px-3 bg-gray-100 text-gray-700">
                                        {{ $maintenanceRecord->product->name }}
                                    </p>
                                </div>

                                <!-- Maintenance Date -->
                                <div class="mb-4">
                                    <label for="maintenance_date" class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date</label>
                                    <input type="date" name="maintenance_date" id="maintenance_date"
                                           value="{{ $maintenanceRecord->maintenance_date->format('Y-m-d') }}" 
                                           class="w-full border rounded py-2 px-3 focus:outline-none focus:ring focus:ring-indigo-500" required>
                                </div>

                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                                    <select name="status" id="status" 
                                            class="w-full border rounded py-2 px-3 focus:outline-none focus:ring focus:ring-indigo-500" required>
                                        <option value="pending" {{ $maintenanceRecord->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="completed" {{ $maintenanceRecord->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="overdue" {{ $maintenanceRecord->status === 'overdue' ? 'selected' : '' }}>Overdue</option>
                                    </select>
                                </div>

                                <!-- Notes -->
                                <div class="mb-4">
                                    <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
                                    <textarea name="notes" id="notes" rows="4"
                                              class="w-full border rounded py-2 px-3 focus:outline-none focus:ring focus:ring-indigo-500">{{ $maintenanceRecord->notes }}</textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex justify-end gap-x-4 mt-6">
                                    <button type="submit" 
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Update Record
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

