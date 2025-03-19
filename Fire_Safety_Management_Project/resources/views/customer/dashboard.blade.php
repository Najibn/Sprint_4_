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
            <div class="mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-comment mr-2"></i> Feedback
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700 transition duration-200">
                    <i class="fas fa-info-circle mr-2"></i> About
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="py-12">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-3xl font-bold text-gray-800">Customer Dashboard</h2>
                </div>

                <!-- Products Table -->
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if($products->isEmpty())
                                <p class="text-gray-500">No products assigned yet!.... {{ Auth::user()->name}}</p>
                            @else
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial Number</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->type }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->serial_number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ match($product->status) {
                                                        'Active' => 'bg-green-100 text-green-800',
                                                        'Expired' => 'bg-red-100 text-red-800',
                                                        default => 'bg-yellow-100 text-yellow-800',
                                                    } }}">
                                                    {{ ucfirst($product->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('customer.products.view', $product->id) }}" 
                                                   class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                                                <a href="{{ route('customer.products.edit', $product->id) }}" 
                                                   class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                                @if($product->status === 'Needs Maintenance')
                                                    <a href="{{ route('customer.products.requestMaintenance', $product->id) }}" 
                                                       class="text-yellow-600 hover:text-yellow-900">Request Maintenance</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $products->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
