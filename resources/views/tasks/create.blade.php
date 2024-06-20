<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Products</h1>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        @method('post');
        task name <input type="text" name="task_name">
        description <input type="text" name="description">
        <input type="submit" value="submit" >
    </form>
    <a href="{{ route('index') }}">home</a>
</body>
</html>