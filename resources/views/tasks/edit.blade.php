<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-yellow-50 flex items-center justify-center pt-20">
<div class="w-4/5 mx-auto border-2 p-8 rounded-lg bg-white shadow-lg">
    <div class="flex justify-between items-center pb-5">
        <h1 class="font-bold text-3xl">Update Task</h1>
    </div>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" placeholder="Add a title ..." value="{{$task->title}}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
            <textarea name="description" id="description" placeholder="Add a description ..." class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{$task->description}}</textarea>
        </div>
        <div class="mb-4">
            <label for="completed" class="block text-gray-700 font-bold mb-2">Completed:</label>
            <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }} class="mr-2 leading-tight">
            <span class="text-gray-700">Yes</span>
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-bold mb-2">Tags:</label>
            <div id="tags" class="grid grid-cols-4 gap-4">
                @foreach ($tags as $tag)
                    <div class="flex items-center">
                        <input type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" class="mr-2 leading-tight"
                               @if($task->tags->contains($tag->id)) checked @endif>
                        <label for="tag{{ $tag->id }}" class="text-gray-700">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        <a href="{{route('tasks.index')}}"><button type="button" class="btn bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</button></a>
    </form>
</div>
</body>
</html>
