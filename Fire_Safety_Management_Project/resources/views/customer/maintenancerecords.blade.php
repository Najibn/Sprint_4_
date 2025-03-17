<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maintenance Records') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Maintenance History</h3>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Product Name</th>
                    <th class="border border-gray-300 px-4 py-2">Issue</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maintenanceRecords as $record)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->product->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->issue }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->status }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->updated_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $maintenanceRecords->links() }}

        <a href="{{ route('customer.dashboard') }}" class="text-blue-500">⬅ Back to Dashboard</a>
    </div>
</x-app-layout>
