<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Available Products</h3>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Type</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->type }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->status }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                        <form action="{{ route('customer.products.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Add to My Products
                            </button>
                        </form>
                        <a href="{{ route('customer.products.details', $product->id) }}" 
                            class="bg-green-500 text-white px-4 py-2 rounded">
                            View Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
