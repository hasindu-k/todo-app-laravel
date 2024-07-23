<!-- resources/views/tags/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Tag</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
<h1>Create Tag</h1>
<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="color">Color</label>
    <input type="color" name="color" id="color" required>
{{--    $table->string('color')->nullable();--}}
    <button type="submit">Create</button>
</form>
</body>
</html>
