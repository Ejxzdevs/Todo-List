<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-dark text-white">
    <div id="app" class="container-fluid d-flex flex-column min-vh-100">
        <div class="container w-100 d-flex justify-content-center align-items-center py-4">
            <h1 class="display-3">Todo <span class="text-warning">L</span>ist</h1>
        </div>
        <div class="container-fluid d-flex justify-content-center py-4">
            <div class="card w-50">
                <form class="card-body bg-white text-dark d-flex flex-column gap-3" action="{{route('tasks.edit', $task->id)}}" method="post">
                    @csrf
                    @method('put')
                    <h3 class="text-center">Title</h3>
                    <input class="form-control" type="text" name="task_name" value="{{$task->task_name}}" required>
                    
                    <h3 class="text-center">Description</h3>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea" name="description" rows="4" required>{{$task->description}}</textarea>
                        <label for="floatingTextarea">Type description:</label>
                    </div>
                    
                    <h3 class="text-center">Status</h3>
                    <select name="status" class="form-select" required>
                        <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Complete</option>
                        <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Incomplete</option>
                    </select>

                    <div class="d-flex justify-content-between">
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a href="{{ route('tasks.delete', ['id' => $task->id]) }}" class="btn btn-danger">Delete</a>
                    </div>

                    <a href="{{ route('index') }}" class="btn btn-link text-dark">Back</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
