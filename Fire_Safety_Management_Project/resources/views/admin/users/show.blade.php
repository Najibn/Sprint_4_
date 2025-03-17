<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i>Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 bg-indigo-900">
                    <i class="fas fa-users mr-2"></i>Manage Users
                </a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('admin.maintenanceRecords.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-wrench mr-2"></i>Manage Records
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-chart-bar mr-2"></i>Reports
                </a>
            </nav>
            <div class="mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-comment mr-2"></i>Give Feedback
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-info-circle mr-2"></i>About
                </a>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-cog mr-2"></i>Settings
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            {{-- <x-slot name="header">
                <div class="flex items-center justify-between">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">
                    User: {{ $user->name }}
                    </h2>
                    
                </div>
            </x-slot> --}}

            <div class="py-12">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="border-b border-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">
                                    User Details
                                </h2>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7v1h14v-1a7 7 0 00-7-7z"/>
                                            </svg>
                                            <strong class="text-gray-600">Name:</strong>
                                        </div>
                                        <p class="text-gray-800">{{ $user->name }}</p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <strong class="text-gray-600">Email:</strong>
                                        </div>
                                        <p class="text-gray-800">{{ $user->email }}</p>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 2h12m6-6H6m6 1v1m-6 1h12m-6 1v1m7-5h-2m0 5v2m0-10V5a2 2 0 012-2h5a2 2 0 012 2v2a2 2 0 01-2 2h-5a2 2 0 01-2-2z"/>
                                            </svg>
                                            <strong class="text-gray-600">Role:</strong>
                                        </div>
                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                                            {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 
                                            ($user->role === 'customer' ? 'bg-blue-100 text-blue-800' : 
                                            'bg-green-100 text-green-800') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.151.27 11.226 11.226 0 003.07-4.679z"/>
                                            </svg>
                                            <strong class="text-gray-600">Phone:</strong>
                                        </div>
                                        <p class="text-gray-800">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 border-t pt-6">
                                <div class="flex justify-between space-x-3">
                                    <a href="{{ route('admin.users.index') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                        Back
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-7m0-5h.01M21 16a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2m0 0c0 1.1-.9 2-2 2s-2-.9-2-2-.9-2-2-2 1.1-.9 2-2z"/>
                                        </svg>
                                        Edit User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
