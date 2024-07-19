<!-- resources/views/tasks/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
    <select name="tags[]" id="tags" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" {{ in_array($tag->id, $task->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
</body>
</html>
