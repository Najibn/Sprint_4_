<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-4">User Details</h2>
            <div class="mb-4">
                <strong>Name:</strong> {{ $user->name }}
            </div>
            <div class="mb-4">
                <strong>Email:</strong> {{ $user->email }}
            </div>
            <div class="mb-4">
                <strong>Role:</strong> {{ ucfirst($user->role) }}
            </div>
            <div class="mb-4">
                <strong>Phone:</strong> {{ $user->phone }}
            </div>
            <a href="{{ route('users.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit User</a>
            <a href="{{ route('users.index') }}" class="ml-2 inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Back to List</a>
        </div>
    </div>
</x-app-layout>
