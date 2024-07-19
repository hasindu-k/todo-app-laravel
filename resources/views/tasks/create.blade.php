<!-- resources/views/tasks/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<h1>Create Task</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title">
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>
    <label for="completed">Completed:</label>
    <input type="checkbox" name="completed" id="completed">
    <label for="tags">Tags:</label>
    <select name="tags[]" id="tags" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>
</body>
</html>
