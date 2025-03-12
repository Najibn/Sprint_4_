<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i>Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-users mr-2"></i>Manage Users
                </a>
                <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('maintenanceRecords.index') }}" class="block py-2 px-4 bg-indigo-900">
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
                    <h2 class="text-xl font-semibold text-gray-900">Create Maintenance Record</h2>
                </div>

                <div class="p-6">
                    <form action="{{ route('maintenanceRecords.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Product:</label>
                            <select name="product_id" id="product_id" class="block w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} (ID: {{ $product->id }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="technician_id" class="block text-gray-700 text-sm font-bold mb-2">Technician:</label>
                            <select name="technician_id" id="technician_id" class="block w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                @foreach ($technicians as $technician)
                                    <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="maintenance_date" class="block text-gray-700 text-sm font-bold mb-2">Maintenance Date:</label>
                            <input type="date" name="maintenance_date" id="maintenance_date" class="block w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select name="status" id="status" class="block w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="overdue">Overdue</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Notes:</label>
                            <textarea name="notes" id="notes" rows="4" class="block w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('maintenanceRecords.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                Create Maintenance Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
