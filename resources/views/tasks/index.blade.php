<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div id="app" class="container-fluid">
    <h1>Todo List</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
                Name: {{ $task->task_name }} 
            </li>
            <li>
                Price: {{ $task->description }}
            </li>
            <li>
                Status: {{ $task->status }}
            </li>
            <li>
                <a href="{{ route('tasks.details', ['task' => $task]) }}">edit</a>
            </li>
            <li>
                <a href="{{ route('tasks.delete', ['task' => $task]) }}">delete</a>
            </li>
            
        @endforeach
    </ul>
    <a href="{{ route('tasks.create') }}">go to creates</a>
    <button type="button" class="btn btn-primary">Primary</button>
</div>

</body>
</html> 