<!-- resources/views/tasks/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')

</head>
<body>
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}">

    <label for="description">Description:</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>

    <label for="completed">Completed:</label>
    <input type="checkbox" name="completed" id="completed" {{ $task->completed ? 'checked' : '' }}>

    <label for="tags">Tags:</label>
    <div id="tags">
        @foreach ($tags as $tag)
            <div>
                <input type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                       @if($task->tags->contains($tag->id)) checked @endif>
                <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit">Update</button>
</form>
</body>
</html>
