<!-- resources/views/tags/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tag</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')

</head>
<body>
<h1>Edit Tag</h1>
<form action="{{ route('tags.update', $tag->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $tag->name }}">

    <button type="submit">Update</button>
</form>
</body>
</html>
