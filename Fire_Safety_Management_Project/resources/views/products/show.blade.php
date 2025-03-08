<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ $product->name }}</h3>
                    
                    <div class="mb-4">
                        <strong>Type:</strong> {{ $product->type }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Type Capacity:</strong> {{ $product->type_capacity }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Serial Number:</strong> {{ $product->serial_number }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Status:</strong> {{ $product->status }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Location:</strong> {{ $product->location }}
                    </div>
                    
                    <div class="mb-4">
                        <strong>Owner:</strong> {{ $product->user->name }}
                    </div>

                    <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit Product
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
