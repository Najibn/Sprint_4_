<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6 p-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-users mr-2"></i> Manage Users
                </a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-box mr-2"></i> Manage Products
                </a>
                <a href="{{ route('admin.maintenanceRecords.index') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-wrench mr-2"></i> Manage Records
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <h2 class="text-3xl font-semibold mb-4">Welcome! {{ Auth::user()->name }}.</h2>
            <p class="text-gray-600 mb-6">What do you need help with?</p>

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Team Members</h2>
                <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i> Add User
                </a>
            </div>

            <div class="grid grid-cols-3 gap-6">
                @foreach($users as $user)
                    <div class="bg-white p-4 rounded-lg shadow-md text-center">
                        @php
                            $avatar = 'images/dude.png';
                            if ($user->role == 'admin') {
                                $avatar = 'images/suit.png';
                            } elseif ($user->role == 'customer') {
                                $avatar = 'images/woman.png';
                            }
                        @endphp
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset($avatar) }}" alt="User Image" class="w-12 h-12 mx-auto rounded-full">
                        <h3 class="text-lg font-semibold mt-2 text-gray-800">{{ strtoupper($user->name) }}</h3>
                        <p class="text-sm text-gray-500">Role: {{ ucfirst($user->role) }}</p>
                        <p class="text-sm text-gray-500">Email: {{ $user->email }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout> 

