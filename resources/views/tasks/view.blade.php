<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #app {
            height: 100%;
        }
        .bg-custom {
            background-color: #2D2D2D;
            color: white; /* Ensure text is visible on the dark background */
        }
        span {
            color: greenyellow;
        }
        .h-auto {
            height: auto;
        }
        .custom-textarea {
            height: 200px;
        }
    </style>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div id="app" class="container-fluid bg-custom d-flex flex-column ">
        <div class="container w-100  d-flex justify-content-center align-items-center">
            <h1 class="display-3">Todo <span>L</span>is<span>t</span></h1>
        </div>
        <div class="container-fluid h-100 w-100 d-flex flex-row bg-custom d-flex justify-content-center p-3">
            <div class="card h-auto w-25 mt-2 p-2 ">
                <form class="card-body bg-white h-100 w-100 d-flex flex-column gap-2"  action="{{route('tasks.edit',$task->id)}}" method="post">
                    @csrf
                    @method('put')
                    <h3 class="text-center" for="">Title</h3>
                    <input class="form-control" type="text" name="task_name" value="{{$task->task_name}}">
                    <h3 class="text-center " for="">Description</h3>
                    <div class="form-floating">
                        <textarea class="form-control " style="height: 100px;" cols="1" rows="10" name="description" id="floatingTextarea">{{$task->description}}</textarea>
                        <label for="floatingTextarea">Type description: </label>
                    </div>
                    <select name="status" class="form-select form-select-lg mb-3" aria-label="Large select example"
                    >
                        <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Complete</option>
                        <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Incomplete</option>
                    </select>
                    <input class="btn btn-primary" type="submit" value="UPDATE">
                    <a href="{{ route('tasks.delete', ['id' => $task->id ])}}" class="btn btn-danger">DELETE</a>
                    <a href="{{ route('index')}}" class="p-1 rounded text-center" >Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>