<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                {{ __('Edit Product') }}
            </h2>
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
</x-app-layout>
