<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('customer.dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-list mr-2"></i> Dashboard
                </a>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-tools mr-2"></i> Maintenance Records
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-chart-bar mr-2"></i> Reports
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="py-12">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-3xl font-bold text-gray-800">Edit Product</h2>
                    <a href="{{ route('customer.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Back to Dashboard
                    </a>
                </div>

                <!-- Edit Product Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('customer.products.update', $product->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                                <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="water" {{ old('type', $product->type) === 'water' ? 'selected' : '' }}>Water</option>
                                    <option value="foam" {{ old('type', $product->type) === 'foam' ? 'selected' : '' }}>Foam</option>
                                    <option value="CO2" {{ old('type', $product->type) === 'CO2' ? 'selected' : '' }}>CO2</option>
                                    <option value="DCP" {{ old('type', $product->type) === 'DCP' ? 'selected' : '' }}>DCP</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="type_capacity" class="block text-gray-700 text-sm font-bold mb-2">Type Capacity:</label>
                                <input type="text" name="type_capacity" id="type_capacity" value="{{ old('type_capacity', $product->type_capacity) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $product->location) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Update Product
                                </button>
                                <a href="{{ route('customer.dashboard') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
