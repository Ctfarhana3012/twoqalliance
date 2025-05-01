<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN for styling (optional) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<br>
<br>
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-xl font-bold mb-4">CREATE COMPANY</h1>
        <br>
    <center>
        <h2>COMPANY INFROMATION</h2>
    </center>


        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
                
            </div>

            <div class="mb-4">
                <label class="block mb-1">Website Link</label>
                <input type="text" name="link" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Logo</label>
                <input type="file" name="logo" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>

</body>
</html>