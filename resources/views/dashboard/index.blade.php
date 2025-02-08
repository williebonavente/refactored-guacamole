<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-bold">Students</h2>
                <p>Total Students: {{ $totalStudents }}</p>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-bold">Faculty</h2>
                <p>Total Faculty: {{ $totalFaculty }}</p>
            </div>
        </div>
    </div>
</body>
</html>