<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Product Information</h3>

        <table class="w-full border-collapse border border-gray-300 mb-6">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
            </tr>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Type</th>
                <td class="border border-gray-300 px-4 py-2">{{ $product->type }}</td>
            </tr>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <td class="border border-gray-300 px-4 py-2">{{ $product->status }}</td>
            </tr>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
            </tr>
        </table>

        <h3 class="text-lg font-semibold mb-4">Maintenance Records</h3>
        @if($maintenanceRecords->isEmpty())
            <p>No maintenance records found for this product.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Issue</th>
                        <th class="border border-gray-300 px-4 py-2">Technician Comments</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenanceRecords as $record)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $record->issue }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $record->technician_comments }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $record->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $record->updated_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('customer.dashboard') }}" class="text-blue-500">⬅ Back to Dashboard</a>
    </div>
</x-app-layout>
