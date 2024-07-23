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
        function toggleDropdown(event, dropdownId) {
            event.stopPropagation(); // Prevent click event from closing the dropdown

            const allDropdowns = document.querySelectorAll('[id^="dropdownMenu"]');
            allDropdowns.forEach(dropdown => {
                if (dropdown.id !== dropdownId) {
                    dropdown.classList.add('hidden');
                }
            });

            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const allDropdowns = document.querySelectorAll('[id^="dropdownMenu"]');
            allDropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !event.target.matches('[alt="Menu button"]')) {
                    dropdown.classList.add('hidden');
                }
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
            <img src="{{asset('img/add.svg')}}" alt="task add button" class="size-8">
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
                <div class="ml-5 font-semibold">Add More Tag</div>
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
                        <div class="flex place-content-between">
                            <h3 class="font-bold">{{ $task->title }}</h3>
                            <div class="relative">
                                <!-- Menu Button -->
                                <img src="{{asset('img/menu.svg')}}" alt="Menu button" class="size-8 cursor-pointer" onclick="toggleDropdown(event, 'dropdownMenu{{ $task->id }}')">

                                <!-- Dropdown Menu -->
                                <div id="dropdownMenu{{ $task->id }}" class="absolute hidden right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{$task->description}} <br><br>
{{--                                Tags:--}}
                        <div class="flex flex-wrap gap-2 relative">
                            @forelse ($task->tags as $tag)
                                <div class="circle mb-2" style="background-color: {{ $tag->color }}" aria-label="{{ $tag->name }}" ></div>
                            @empty
                            @endforelse
                                <div class="mt-4 absolute right-0">
                                    <a href="{{ route('tasks.edit', $task->id) }}">
                                    <input type="checkbox" name="completed" class="cursor-pointer"
                                           @if($task->completed)
                                               checked
                                           @endif
                                           value="1" disabled>
                                    <label for="completed" class="cursor-pointer">Done</label>
                                    </a>
                                </div>
                        </div>
                    </div>
            @endforeach
        </div>
        {{--   end-container for tasks--}}
    </div>
</div>
</body>
</html>
