<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Faculty</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <style>
        .btn {
            transition: transform 0.2s, background-color 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Add Faculty</h1>
        <form action="{{ route('faculty.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            </div>
            {{-- Error Prone Area --}}
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Age</label>
                <input type="text" name="age" id="age" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="department" class="block text-gray-700">Department</label>
                <input type="text" name="department" id="department" class="w-full p-2 border rounded" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Faculty</button>
            </div>
        </form>
    </div>
</body>
</html>