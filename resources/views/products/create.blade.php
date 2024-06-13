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
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        @method('post');
        <input type="text" name="name">
        <input type="text" name="price">
        <input type="submit" value="submit" >
    </form>
    <a href="{{ route('index')}}">home</a>
</body>
</html>