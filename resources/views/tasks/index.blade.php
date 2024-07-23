<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-amber-300 w-4/5 mx-auto">
    {{--    start of top row with button and heading--}}
    <div class="flex padding-8 place-content-between place-items-center pt-5 pb-5 px-4 bg-amber-100">
        <h1 class="">Tasks</h1>
        <a href="{{ route('tasks.create') }}">
            <img src="{{asset('img/add-circle.svg')}}" class="size-10">
        </a>
    </div>
    {{--    end of top row with button and heading--}}

    <div class="flex flex-row">
        {{--   start-container for tags--}}
        <div class="basis-1/4 flex flex-col bg-slate-300 p-5">
            <h2 class="self-center">Tags</h2>
            @foreach($tags as $tag )
                <li>{{$tag->name}}</li>
            @endforeach
        </div>
        {{--   end-container for tags--}}
        {{--   start-container for tasks--}}
        <div class="basis-3/4 flex flex-wrap gap-4 p-5 bg-red-500">
                    @foreach ($tasks as $task)
                            <div class="card bg-amber-600 mb-5 flex-shrink-0 p-5 shadow hover:shadow-2xl">
                                <h3 class="font-bold">{{ $task->title }}</h3><br>
                                {{$task->description}} <br><br>
                                Tags:
                                @foreach ($task->tags as $tag)
                                    {{ $tag->name }}
                                @endforeach
                                <div class="pt-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}">
                                        <button type="button"
                                                class="text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-5 py-2 mr-2">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                          style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-600 rounded-lg px-5 py-2">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                    @endforeach
        </div>
        {{--   end-container for tasks--}}
    </div>
</div>
</body>
</html>
