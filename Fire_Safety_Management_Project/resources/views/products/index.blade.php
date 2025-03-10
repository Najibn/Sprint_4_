<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Product List</h3>
                        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Product
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-sm mr-3">
                                            {{ substr($product->name, 0, 2) }}
                                        </div>
                                        <span class="font-medium text-gray-900">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ $product->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium">
                                        @switch($product->status)
                                            @case('Active')
                                                <span class="bg-green-100 text-green-800">{{ $product->status }}</span>
                                                @break
                                            @case('Needs Maintenance')
                                                <span class="bg-yellow-100 text-yellow-800">{{ $product->status }}</span>
                                                @break
                                            @case('Expired')
                                                <span class="bg-red-100 text-red-800">{{ $product->status }}</span>
                                                @break
                                        @endswitch
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 012.828-2.828l4.95 4.95c.397.397.923.697 1.462.697z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-gray-900">{{ $product->location }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-900 hover:underline transition-colors duration-200">
                                            <svg class="flex-shrink-0 h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" fill="currentColor" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.197 5.197 2 10 2c4.803 0 9.542 3.197 9.542 8.823 0 4.624-4.939 7.678-.458 12A1.454 1.454 0 0010 13.25c.836.065 1.158.886 1.158 1.77 0 1.054-879 1.724-10 10.934 0-.105.423-.768.892-1.506z" clip-rule="evenodd" />
                                            </svg>
                                            View
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 hover:underline transition-colors duration-200">
                                            <svg class="flex-shrink-0 h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM3.293 7.293L9 13.707V16h2a2 2 0 002-2V6a2 2 0 00-2-2H3.293z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 hover:underline transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this product?')">
                                                <svg class="flex-shrink-0 h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 00-.553-.894L11.618 4H13a1 1 0 000-2h-2zM6 8a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1H7a1 1 0 01-1-1V8zm6 0a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1V8z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>