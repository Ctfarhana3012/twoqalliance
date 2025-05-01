<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<body class="bg-gray-100 p-6">
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Companies</h1>
 
        <a href="{{ route('companies.create') }}" class="inline-block mb-4 bg-blue-500 text-white px-4 py-2 rounded">+ Add New</a>
 
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif
 
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-left">#</th>
                    <th class="border p-2 text-left">Name</th>
                    <th class="border p-2 text-left">Email</th>
                    <th class="border p-2 text-left">Website Link</th>
                    <th class="border p-2 text-left">Logo</th>
                    <th class="border p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr class="border-t">
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $company->name }}</td>
                        <td class="border p-2">{{ $company->email }}</td>
                        <td class="border p-2">
                            <a href="{{ $company->link }}" class="text-blue-600" target="_blank">{{ $company->link }}</a>
                        </td>
                        <td class="border p-2">
                            @if($company->logo)
                            <div class="w-[100px] h-[100px] overflow-hidden flex items-center justify-center border">
                              <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo"
                              class="max-w-full max-h-full object-contain" />
                     </div>
                            @else
                                <span class="text-gray-500">No Logo</span>
                            @endif
                        </td>
                        <td class="border p-2">
                            <a href="{{ route('companies.edit', $company->id) }}" class="text-yellow-500 mr-2">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this company?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">No companies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</x-app-layout>
   