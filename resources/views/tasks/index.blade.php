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

<body class="bg-secondary text-dark">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="container text-center py-4">
            <h1 class="display-3 text-white">Just <span class="text-warning">D</span>o It</h1>
        </div>

        <!-- Task Cards Section -->
        <div class="container-fluid d-flex flex-wrap justify-content-center gap-4 pb-5">
            <div class="border bg-body shadow rounded py-2 " style="width: 500px">
                <div class="d-flex flex-row justify-content-between w-100">
                    <label class="ms-4 fw-medium fs-4">Todo List</label>
                    <a style="margin: 0 28px 0 0" class="btn bg-secondary" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <i class="text-white bi bi-plus-lg"></i>
                    </a>
                </div>
                <div class="w-100 py-2 px-4">
                    @foreach ($tasks as $task)
                    <div class="w-100 border-dark rounded shadow d-flex align-items-center py-2 bg-body-secondary mb-3" 
                         data-bs-toggle="modal" 
                         data-bs-target="#updateTask" 
                         data-task-name="{{ $task->task_name }}" 
                         data-description="{{ $task->description }}" 
                         data-status="{{ $task->status }}" 
                         data-task-id="{{ $task->id }}">
                        <p class="ps-4 text-dark m-0 p-0 fw-medium w-75" 
                           style="font-size: 18px; 
                           text-decoration: {{ $task->status == 'Completed' ? 'line-through' : 'none' }}; 
                           text-decoration-color: {{ $task->status == 'Completed' ? 'crimson' : 'dark' }};">
                           {{ $task->task_name }}
                        </p>
                        <div class="d-flex flex-row justify-content-end align-items-center gap-2 w-25 pe-1">
                            <a class="btn bg-success text-light"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('tasks.delete', ['id' => $task->id]) }}" class="btn btn-danger text-light"><i class="bi bi-trash3"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- ADD TASK MODAL -->
    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,.3);">
        <div class="modal-dialog">
            <div class="modal-content"
            style="
            backdrop-filter: blur(3px);  
            background-color: rgba(255,255,255,.4);
            ">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="taskModalLabel">New Task</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column gap-2" action="{{ route('tasks.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="task_name" class="form-label fw-medium fs-6 text-light">Title</label>
                            <input class="form-control" type="text" name="task_name" value="" placeholder="Type title:" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-medium fs-6 text-light">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Type description:" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- UPDATE TASK MODAL -->
    <div class="modal fade" id="updateTask" tabindex="-1" aria-labelledby="updateTaskLabel" aria-hidden="true" style="background-color: rgba(0,0,0,.3);">
        <div class="modal-dialog">
            <div class="modal-content shadow"  
            style="
            backdrop-filter: blur(3px);  
            background-color: rgba(255,255,255,.4);
            ">
                <div class="modal-header">
                    <h5 class="modal-title text-light"  id="updateTaskLabel">Update Task</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column gap-3" id="updateForm" action="{{route('tasks.update')}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <input type="hidden" name="task_id" id="task_id" >
                            <label for="task_name" class="form-label text-light fw-medium fs-6">Title</label>
                            <input class="form-control" type="text" name="task_name" id="task_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label text-light fw-medium fs-6">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label text-light fw-medium fs-6">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Completed">Completed</option>
                                <option value="Pending">Incomplete</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <input class="btn bg-success text-white" type="submit" value="Update">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for functionality, like dropdowns, tooltips, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const taskItems = document.querySelectorAll('.w-100.border-dark.rounded');

        taskItems.forEach(item => {
            item.addEventListener('click', function() {
                const taskName = item.getAttribute('data-task-name');
                const description = item.getAttribute('data-description');
                const status = item.getAttribute('data-status');
                const taskId = item.getAttribute('data-task-id');

                // Set the values in the update form
                document.querySelector('#updateTask #task_name').value = taskName;
                document.querySelector('#updateTask #description').value = description;
                document.querySelector('#updateTask #status').value = status;
                document.querySelector('#updateTask #task_id').value = taskId;

            });
        });
    </script>
</body>
</html>
