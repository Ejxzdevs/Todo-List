<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #app {
            height: auto;
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
        .floating-btn {
      position: absolute;
      top: 40px;
      right: 20px;
      z-index: 1000;
    }
    .floating-btn .btn {
      border-radius: 50%;
      width: 60px;
      height: 60px;
      padding: 0;
      font-size: 24px;
    }
    .fixed-height-description{
            height: 100px; /* Set the fixed height */
            overflow-y: auto; /* Add vertical scroll if content exceeds height */
    }
    </style>
    <!-- Include Vite assets -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <a  href="{{ route('tasks.create') }}" class="btn btn-primary floating-btn">
        Create Task
    </a>
    <div id="app" class="container-fluid bg-custom d-flex flex-column ">
        <div class="container h-25 w-100  d-flex justify-content-center align-items-center">
            <h1 class="display-3">Todo <span>L</span>is<span>t</span></h1>
        </div>
        <div class="container-fluid h-auto w-100 bg-custom d-flex flex-row flex-wrap gap-4 p-3">
            @foreach ($tasks as $task)
              <div class="card mt-2 overflow-auto p-1 h-auto " style="width: 16rem;">      
                <div class="card-body d-flex flex-column ">
                    <i class="bi bi-check-circle fs-5" style="color: {{ $task->status == 'Completed' ? '#4cf579' : 'black' }};"></i>
                    <h5 class="card-title text-center fw-bold">{{ $task->task_name }}</h5>
                    <p class="card-text text-wrap ml-5 mb-5 fixed-height-description" >{{ $task->description }}</p>
                    <a href="{{ route('tasks.details', ['task' => $task]) }}" class="btn btn-primary btn-md w-50 mx-auto">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
