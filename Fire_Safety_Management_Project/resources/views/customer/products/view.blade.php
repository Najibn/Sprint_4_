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
                    <h2 class="text-3xl font-bold text-gray-800">Product Details</h2>
                    <a href="{{ route('customer.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Back to Dashboard
                    </a>
                </div>

                <!-- Product Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">{{ Auth::user()->name }}'s Product Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="mb-2"><strong class="text-gray-700">Name:</strong> <span class="text-gray-900">{{ $product->name }}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">Type:</strong> <span class="text-gray-900">{{ $product->type }}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">Type Capacity:</strong> <span class="text-gray-900">{{ $product->type_capacity }}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">Serial Number:</strong> <span class="text-gray-900">{{ $product->serial_number }}</span></p>
                            </div>
                            <div>
                                <p class="mb-2"><strong class="text-gray-700">Status:</strong> 
                                    <span class="px-2 py-1 text-sm rounded-full 
                                        {{ $product->status === 'Active' ? 'bg-green-100 text-green-800' : ($product->status === 'Expired' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </p>
                                <p class="mb-2"><strong class="text-gray-700">Location:</strong> <span class="text-gray-900">{{ $product->location }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maintenance Records -->
                 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Maintenance Records Status</h3>
                        @if($maintenanceRecords->isEmpty())
                            <p class="text-gray-500">No maintenance records found.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($maintenanceRecords as $record)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $record->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $record->maintenance_date->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-sm rounded-full 
                                                {{ $record->status === 'completed' ? 'bg-green-100 text-green-800' : ($record->status === 'overdue' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($record->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">{{ $record->notes ?? 'No notes available' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
