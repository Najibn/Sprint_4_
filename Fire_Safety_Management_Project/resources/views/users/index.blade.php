<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Users Management</h2>
            <div class="flex justify-end mb-4">
                <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New User</a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-4 border-b text-left text-gray-600">Name</th>
                            <th class="py-3 px-4 border-b text-left text-gray-600">Email</th>
                            <th class="py-3 px-4 border-b text-left text-gray-600">Role</th>
                            <th class="py-3 px-4 border-b text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                                <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-3 px-4 border-b">{{ ucfirst($user->role) }}</td>
                                <td class="py-3 px-4 border-b">
                                    <a href="{{ route('users.show', $user) }}" class="text-blue-500 hover:underline mr-2">View</a>
                                    <a href="{{ route('users.edit', $user) }}" class="text-green-500 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
