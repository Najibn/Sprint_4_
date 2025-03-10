<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

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
                    <div><strong class="text-gray-700">Owner:</strong> {{ $product->user->name }}</div>

                    {{-- Status Badge --}}
                    <div>
                        <strong class="text-gray-700">Status:</strong>  
                        <span class="px-3 py-1 rounded-full text-white text-sm font-semibold 
                            @if($product->status == 'Active') bg-green-700 
                            @elseif($product->status == 'Expired') bg-red-700 
                            @else bg-yellow-500 @endif">
                            {{ $product->status }}
                        </span>
                    </div>
                </div>

                {{-- Edit Button --}}
                <div class="mt-6 flex justify-start">
                    <a href="{{ route('products.edit', $product) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Edit Product
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
