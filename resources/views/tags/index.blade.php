<!DOCTYPE html>
<html>
<head>
    <title>Tags</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
<div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Tags</h1>
    <a href="{{ route('tags.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mb-4 inline-block">
        Create Tag
    </a>
    <a href="{{ route('tasks.index') }}"
       class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded-lg mb-4 inline-block">
        Go to Task Page
    </a>
    <ul class="space-y-4">
        @foreach ($tags as $tag)
            <li class="bg-gray-200 p-4 rounded-lg flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="circle w-8 h-8 rounded-full" style="background-color: {{ $tag->color }}"></div>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-semibold mb-2">{{ $tag->name }}</h3>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('tags.edit', $tag->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded-lg">
                        Edit
                    </a>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
