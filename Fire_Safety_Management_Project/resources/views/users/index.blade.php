<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">
                Users Management 
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('users.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-9h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Create New User
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="border-b border-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">
                            Users List
                        </h2>
                    </div>
                </div>

                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left text-gray-600 font-semibold">Name</th>
                                    <th class="py-3 px-4 border-b text-left text-gray-600 font-semibold">Email</th>
                                    <th class="py-3 px-4 border-b text-left text-gray-600 font-semibold">Role</th>
                                    <th class="py-3 px-4 border-b text-left text-gray-600 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                                        <td class="py-3 px-4 border-b">
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                                                {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : ($user->role === 'moderator' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 border-b">
                                            <div class="flex gap-2">
                                                <a href="{{ route('users.show', $user) }}" 
                                                   class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-md hover:bg-blue-200 transition-colors">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    View
                                                </a>
                                                <a href="{{ route('users.edit', $user) }}" 
                                                   class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-md hover:bg-green-200 transition-colors">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-7m0-5h.01M21 16a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2m0 0c0 1.1-.9 2-2 2s-2-.9-2-2-.9-2-2-2 1.1-.9 2-2z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" 
                                                            class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-md hover:bg-red-200 transition-colors">
                                                        <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4 0v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>