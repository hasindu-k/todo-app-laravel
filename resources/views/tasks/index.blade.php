<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
    @vite('resources/css/app.css')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hideTagsCheckbox = document.querySelector('input[name="hide-tags"]');
            const tagContainer = document.getElementById('tag-container');
            const showTagsButton = document.getElementById('show-tags-button');

            hideTagsCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    tagContainer.style.display = 'none';
                    showTagsButton.style.display = 'block';
                }
            });

            showTagsButton.addEventListener('click', function () {
                tagContainer.style.display = 'block';
                showTagsButton.style.display = 'none';
                hideTagsCheckbox.checked = false;
            });
        });
    </script>
</head>
<body class="bg-red-50 min-h-screen">
<div class="w-4/5 mx-auto">
    {{--    start of top row with button and heading--}}
    <div class="flex padding-8 place-content-between place-items-center pt-10 pb-5 px-16">
        <h1 class="font-bold text-3xl">Tasks</h1>
        <a href="{{ route('tasks.create') }}">
            <img src="{{asset('img/add-circle.svg')}}" alt="task add button" class="size-10">
        </a>
    </div>
    {{--    end of top row with button and heading--}}

    {{--    container for tag and task both--}}
    <div class="flex flex-row">
        {{--   start-container for tags--}}
        <div id="tag-container" class="basis-1/4 flex flex-col p-10">
            @foreach($tags as $tag )
                <div class="tag-wrapper flex items-center p-5">
                    <div class="circle" style="background-color: {{$tag -> color}}"></div>
                    <div class="ml-5">{{$tag->name}}</div>
                </div>
            @endforeach
            <div class="flex items-center p-5">
                <a href="{{ route('tags.index') }}">
                    <div class="circle flex items-center justify-center" style="background-color: #cccccc; cursor: pointer;">
                        <span class="text-xs text-white">+</span>
                    </div>
                </a>
                <div class="ml-5">Add More Tag</div>
            </div>
            <div class="flex items-center p-6">
                <input class="ml-3 " type="checkbox" name="hide-tags" value="1" id="hide-tags-checkbox">
                <label class="ml-3" for="hide-tags" id="hide-tags-checkbox">Hide Tags</label>
            </div>
        </div>
        <button id="show-tags-button" class="bg-blue-500 h-auto hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5" style="display:none;">
            Show Tags
        </button>
        {{--   end-container for tags--}}

        {{--   start-container for tasks--}}
        <div id="task-container" class="basis-3/4 flex flex-wrap gap-4 p-5">
            @foreach ($tasks as $task)
                    <div class="card basis-1/2 max-w-[calc(50%-1rem)] bg-yellow-200 mb-5 flex flex-col p-5 shadow hover:shadow-2xl">
                        <h3 class="font-bold">{{ $task->title }}</h3><br>
                        {{$task->description}} <br><br>
{{--                                Tags:--}}
                        <div class="flex flex-wrap gap-2">
                            @forelse ($task->tags as $tag)
                                <div class="circle mb-2" style="background-color: {{ $tag->color }}" aria-label="{{ $tag->name }}" ></div>
                            @empty
                            @endforelse
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('tasks.edit', $task->id) }}">
                                <button type="button"
                                        class="btn mr-2 bg-blue-500 hover:bg-blue-600">
                                    Edit
                                </button>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn bg-red-500 hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <input type="checkbox" name="completed"
                                   @if($task->completed)
                                       checked
                                   @endif
                                   value="1" disabled>
                            <label for="completed">Done</label>
                        </div>
                    </div>
            @endforeach
        </div>
        {{--   end-container for tasks--}}
    </div>
</div>
</body>
</html>
