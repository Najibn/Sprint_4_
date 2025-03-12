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
        <div class="ml-64 p-8 w-full">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit User</h2>
                {{-- <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                    Back to Users List
                </a> --}}
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="text-gray-700 font-medium">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 mt-2 border rounded-md" required>
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="email" class="text-gray-700 font-medium">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 mt-2 border rounded-md" required>
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="role" class="text-gray-700 font-medium">Role</label>
                                <select id="role" name="role" class="w-full px-4 py-2 mt-2 border rounded-md" required>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="moderator" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>customer</option>
                                    <option value="user" {{ old('role', $user->role) == 'technician' ? 'selected' : '' }}>technician</option>
                                </select>
                                @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="phone" class="text-gray-700 font-medium">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-2 mt-2 border rounded-md">
                                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Save Changes
                        </button>
                        <a href="{{ route('users.index') }}" class="px-6 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
