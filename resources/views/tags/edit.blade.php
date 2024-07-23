<!-- resources/views/tags/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tag</title>
    @vite('resources/css/app.css')

</head>
{{--<body>--}}
{{--<h1>Edit Tag</h1>--}}
{{--<form action="{{ route('tags.update', $tag->id) }}" method="POST">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}
{{--    <label for="name">Name:</label>--}}
{{--    <input type="text" name="name" id="name" value="{{ $tag->name }}">--}}
{{--    <label for="color">Color:</label>--}}
{{--    <input type="color" name="color" id="color" value="{{ $tag->color }}">--}}
{{--    <button type="submit">Update</button>--}}
{{--</form>--}}
{{--</body>--}}
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit Tag</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name:</label>
            <input type="text" name="name" id="name" value="{{ $tag->name }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="color" class="block text-gray-700 text-sm font-medium mb-2">Color:</label>
            <input type="color" name="color" id="color" value="{{ $tag->color }}" required
                   class="w-full border-none rounded-lg cursor-pointer">
        </div>
        <div class="flex justify-center gap-4">
            <a href="{{route('tags.index')}}">
                <button type="button"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Cancel
                </button>
            </a>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update
            </button>
        </div>
    </form>
</div>
</body>
</html>

