<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}">Create Task</a>
<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->title }} - Tags:
            @foreach ($task->tags as $tag)
                {{ $tag->name }}
            @endforeach
            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
