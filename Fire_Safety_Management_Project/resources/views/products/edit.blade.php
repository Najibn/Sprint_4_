<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User:</label>
                            <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $product->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <select name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="Fire Extinguisher" {{ $product->name == 'Fire Extinguisher' ? 'selected' : '' }}>Fire Extinguisher</option>
                                <option value="Smoke Detector" {{ $product->name == 'Smoke Detector' ? 'selected' : '' }}>Smoke Detector</option>
                                <option value="Fire Alarm" {{ $product->name == 'Fire Alarm' ? 'selected' : '' }}>Fire Alarm</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                            <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="water" {{ $product->type == 'water' ? 'selected' : '' }}>Water</option>
                                <option value="foam" {{ $product->type == 'foam' ? 'selected' : '' }}>Foam</option>
                                <option value="CO2" {{ $product->type == 'CO2' ? 'selected' : '' }}>CO2</option>
                                <option value="DCP" {{ $product->type == 'DCP' ? 'selected' : '' }}>DCP</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="type_capacity" class="block text-gray-700 text-sm font-bold mb-2">Type Capacity:</label>
                            <input type="text" name="type_capacity" id="type_capacity" value="{{ $product->type_capacity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="serial_number" class="block text-gray-700 text-sm font-bold mb-2">Serial Number:</label>
                            <input type="text" name="serial_number" id="serial_number" value="{{ $product->serial_number }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Expired" {{ $product->status == 'Expired' ? 'selected' : '' }}>Expired</option>
                                <option value="Needs Maintenance" {{ $product->status == 'Needs Maintenance' ? 'selected' : '' }}>Needs Maintenance</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ $product->location }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Product
                            </button>
                            <a href="{{ route('products.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
