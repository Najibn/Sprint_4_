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
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        {{-- Product Name --}}
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            {{ $product->name }}
                        </h3>

                        {{-- Grid Layout for Details --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div><strong class="text-gray-700">Type:</strong> {{ $product->type }}</div>
                            <div><strong class="text-gray-700">Type Capacity:</strong> {{ $product->type_capacity }}</div>
                            <div><strong class="text-gray-700">Serial Number:</strong> {{ $product->serial_number }}</div>
                            <div><strong class="text-gray-700">Location:</strong> {{ $product->location }}</div>
                            <div><strong class="text-gray-700">Technician:</strong> {{ $product->user->name }}</div>

                            {{-- Status Badge --}}
                            <div>
                                <strong class="text-gray-700">Status:</strong>  
                                <span class="px-3 py-1 rounded-full text-white text-sm font-semibold 
                                    {{ $product->status == 'Active' ? 'bg-green-700' : ($product->status == 'Expired' ? 'bg-red-700' : 'bg-yellow-500') }}">
                                    {{ $product->status }}
                                </span>
                            </div>
                        </div>

                        {{-- Back Button --}}
                        <div class="mt-6 flex justify-start space-x-4">
                            <a href="{{ route('admin.products.index') }}" 
                               class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Back to Products
                            </a>

                            {{-- Edit Button --}}
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Edit Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
