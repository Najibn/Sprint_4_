<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i>Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="block py-2 px-4 bg-indigo-900">
                    <i class="fas fa-users mr-2"></i>Manage Users
                </a>
                <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-box mr-2"></i>Manage Products
                </a>
                <a href="{{ route('maintenanceRecords.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
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
        <div class="ml-64 flex-grow p-8">
            <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold mb-4">Create New User</h2>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                            <option value="technician">Technician</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('phone') }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create User
                        </button>
                        <a href="{{ route('users.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
