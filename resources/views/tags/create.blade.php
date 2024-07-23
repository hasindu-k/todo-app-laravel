<!DOCTYPE html>
<html>
<head>
    <title>Create Tag</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Create Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name:</label>
            <input type="text" name="name" id="name" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="color" class="block text-gray-700 text-sm font-medium mb-2">Color:</label>
            <input type="color" name="color" id="color" required
                   class="w-full border-none rounded-lg cursor-pointer">
        </div>
        <div class="flex justify-center gap-4">
            <button type="button"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <a href="{{route('tags.index')}}">Cancel</a>
            </button>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create
            </button>
        </div>
    </form>
</div>
</body>
</html>
