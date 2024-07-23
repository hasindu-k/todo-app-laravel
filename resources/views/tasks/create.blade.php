<!-- resources/views/tasks/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
<h1>Create Task</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" placeholder="add a title ...">
    <label for="description">Description:</label>
    <textarea name="description" id="description" placeholder="add a description ..."></textarea>
    <label for="completed">Completed:</label>
    <input type="checkbox" name="completed" id="completed"><br><br>
    <label for="tags">Tags:</label>
    <div id="tags"  style="display: grid; grid-template-columns: 10% 10% 10% 10%;" >
        @foreach ($tags as $tag)
            <div style="display: flex; justify-content: center; align-content: center">
                <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                <input type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
            </div>
        @endforeach
    </div>
    <button type="submit">Create</button>
</form>
</body>
</html>
