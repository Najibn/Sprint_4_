<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- User Management -->
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-4">Users</h3>
                            <div class="space-y-2">
                                @foreach($users as $user)
                                <div class="p-3 bg-gray-50 rounded">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $user->name }} ({{ $user->role }})</span>
                                        <div class="space-x-2">
                                            <a href="{{ route('admin.assign.product', $user->id) }}" 
                                               class="text-blue-600 hover:text-blue-900">
                                                Assign Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Product Management -->
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-4">Products</h3>
                            <div class="space-y-2">
                                @foreach($products as $product)
                                <div class="p-3 bg-gray-50 rounded">
                                    <div class="space-y-1">
                                        <span class="font-medium">{{ $product->name }}</span>
                                        <span class="text-sm text-gray-600">
                                            Status: {{ $product->status }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>