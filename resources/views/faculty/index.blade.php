<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faculty Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <style>
        body {
            position: relative;
            background-color: rgba(0, 0, 0, 0.5); /* Fallback color */
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://scontent.fmnl9-4.fna.fbcdn.net/v/t1.15752-9/473785471_611949268235687_5636987034536035668_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeF2RfOLDMVodOCERL0OEkrbl1wrhkvKHxmXXCuGS8ofGWi6o6V-_1lxfubrjnVgDPLP0Tun1AJWGr9Ybpyi0Ecw&_nc_ohc=UUaYgpBXHC8Q7kNvgFKi4OD&_nc_zt=23&_nc_ht=scontent.fmnl9-4.fna&oh=03_Q7cD1gEYVpEvUVxMprTNVL83W3KXmbchSvw6VkiUyzRjDuKeNA&oe=67BAFAF5");
            background-size: cover;
            background-position: center;
            opacity: 0.1; /* Adjust the opacity as needed */
            z-index: -1;
        }
        .btn {
            transition: transform 0.2s, background-color 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Faculty List</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('faculty.create') }}" class="btn bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Faculty</a>
        </div>
        <ul class="space-y-4">
            @foreach ($faculty as $member)
                <li class="p-4 bg-gray-50 rounded shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-lg font-semibold text-gray-700">{{ $member->name }}</p>
                            <p class="text-sm text-gray-500">{{ $member->age}}</p>
                            <p class="text-sm text-gray-500">{{ $member->email }}</p>
                            <p class="text-sm text-gray-500">Department: {{ $member->department }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('faculty.edit', $member->id) }}" class="btn bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('faculty.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{ $faculty->links() }}
        </div>
    </div>
</body>
</html>