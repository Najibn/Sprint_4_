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
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 bg-indigo-900">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('admin.maintenanceRecords.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
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
         <div class="ml-64 p-8 w-full">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Create New Product</h2>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                    Back to Products
                </a>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Customer Selection -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Customer</label>
                            <select name="user_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @foreach ($users->where('role', 'customer') as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Details -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Product Name</label>
                            <select name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @foreach(['Fire Extinguisher', 'Smoke Detector', 'Fire Alarm'] as $product)
                                    <option value="{{ $product }}" {{ old('name') == $product ? 'selected' : '' }}>
                                        {{ $product }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type and Capacity -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <select name="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @foreach(['water', 'foam', 'CO2', 'DCP'] as $type)
                                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Type Capacity</label>
                            <input type="text" name="type_capacity" value="{{ old('type_capacity') }}" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Serial Number and Location -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Serial Number</label>
                            <input type="text" name="serial_number" value="{{ old('serial_number') }}" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" value="{{ old('location') }}" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <!-- Status and Technician Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @foreach(['Active', 'Expired', 'Needs Maintenance'] as $status)
                                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2" id="technicianField">
                            <label class="block text-sm font-medium text-gray-700">Assign Technician (Required if Needs Maintenance)</label>
                            <select name="technician_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Select Technician</option>
                                @foreach ($users->where('role', 'technician') as $tech)
                                    <option value="{{ $tech->id }}" {{ old('technician_id') == $tech->id ? 'selected' : '' }}>
                                        {{ $tech->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>