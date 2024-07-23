<!-- resources/views/tags/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tags</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
<h1>Tags</h1>
<a href="{{ route('tags.create') }}">Create Tag</a>
<ul>
    @foreach ($tags as $tag)
        <li>
            <h3>{{ $tag->name }}</h3>
            <div class="circle" style="background-color: {{$tag -> color}}"></div>
            <a href="{{ route('tags.edit', $tag->id) }}">Edit</a>
            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
