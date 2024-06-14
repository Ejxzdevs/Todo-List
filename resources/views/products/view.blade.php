<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <label for="">VIEW </label>
    <form action="{{route('product.edit',$product->id)}}" method="post">
        @csrf
        @method('put');
        <input type="text" name="name" value="{{$product->name}}">
        <input type="text" name="price" value="{{$product->price}}">
        <input type="submit" value="submit" >
    </form>
</body>
</html>