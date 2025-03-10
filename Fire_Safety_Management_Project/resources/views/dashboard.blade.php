<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-indigo-800 text-white shadow-md">
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Fire Safety</h1>
            </div>
            <nav class="mt-6 mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-search mr-2"></i>Find
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-list mr-2"></i>My Intents
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-wallet mr-2"></i>Wallet
                </a>
                {{-- for future prooverdor --}}
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-wallet mr-2"></i>orders
                </a>
            </nav>
            <div class="mt-auto p-4">
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-comment mr-2"></i>Give Feedback
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-info-circle mr-2"></i>about
                </a>
                {{-- connectedd to breeze profile --}}
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 hover:bg-indigo-700">
                    <i class="fas fa-cog mr-2"></i>Settings
                </a>
            </div>
        </div>


        
        <!-- Main Content -->
        <div class="ml-64 p-8">
            

            <!-- Welcome Message -->
            <h2 class="text-3xl font-semibold mb-4">Welcome! {{ Auth::user()->name }}.</h2>
            <p class="text-gray-600 mb-6">What do you need help with?</p>

            <!-- Search Bar for edition later -->
            <div class="mb-6">
                <input type="text" placeholder="not working yet! haha......" class="w-full p-3 rounded-lg shadow-sm">
            </div>

            <!-- Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('users.index') }}" class="bg-blue-100 hover:bg-blue-200 p-6 rounded-lg shadow-md text-center  h-48 flex flex-col justify-center">
                    <i class="fas fa-users text-2xl mb-2"></i>
                    <h3 class="font-semibold">Manage Users</h3>
                </a>

                <a href="{{ route('products.index') }}" class="bg-green-100 hover:bg-green-200 p-6 rounded-lg shadow-md text-center h-48 flex flex-col justify-center">
                    <i class="fas fa-box text-2xl mb-2"></i>
                    <h3 class="font-semibold">Manage Products</h3>
                </a>

                <a href="{{ route('maintenanceRecords.index') }}" class="bg-yellow-100 hover:bg-yellow-200 p-6 rounded-lg shadow-md text-center h-48 flex flex-col justify-center">
                    <i class="fas fa-wrench text-2xl mb-2"></i>
                    <h2 class="font-semibold">Manage Maintenance</h2>
                </a>
                <!-- Add more categories as needed -->
            </div>
        </div>
    </div>
</x-app-layout>
