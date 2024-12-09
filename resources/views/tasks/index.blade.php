<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container-fluid">
        <!-- Floating Button -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary position-fixed bottom-0 end-0 m-4">
            <i class="bi bi-plus"></i>
        </a>

        <!-- Header Section -->
        <div class="container text-center py-5">
            <h1 class="display-3">Todo <span class="text-warning">L</span>ist</h1>
        </div>

        <!-- Task Cards Section -->
        <div class="container-fluid d-flex flex-wrap justify-content-center gap-4 pb-5">
            @foreach ($tasks as $task)
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <i class="bi bi-check-circle fs-5" style="color: {{ $task->status == 'Completed' ? '#4cf579' : 'gray' }};"></i>
                        <h5 class="card-title fw-bold text-dark ">{{ $task->task_name }}</h5>
                        <p class="card-text text-truncate text-dark" style="max-height: 100px; overflow: hidden;">{{ $task->description }}</p>
                        <a href="{{ route('tasks.details', ['task' => $task]) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS (for functionality, like dropdowns, tooltips, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
