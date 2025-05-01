<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">EDIT COMPANY</h1>
        <br>
        <center>
        <h2>COMPANY INFROMATION</h2>
         </center>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" value="{{ $company->name }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ $company->email }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Website Link</label>
                <input type="text" name="link" value="{{ $company->link }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Logo</label>
                <input type="file" name="logo" class="w-full border rounded p-2">
                @if ($company->logo)
                <div class="mb-4">
                    <br>
                    <label class="block text-gray-700 font-bold mb-2">Logo:</label>
                    <div class="w-[150px] h-[150px] border overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="max-w-full max-h-full object-contain">
                    </div>
                </div>
                @endif

            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</body>
</html>
