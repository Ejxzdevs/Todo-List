<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                Name: {{ $product->name }} 
            </li>
            <li>
                Price: {{ $product->price }}
            </li>
            <li>
                <a href="{{ route('product.details', ['product' => $product]) }}">edit</a>
            </li>
            <li>
                <a href="{{ route('product.delete', ['product' => $product]) }}">delete</a>
            </li>
            
        @endforeach
    </ul>
    <a href="{{ route('product.create') }}">go to create</a>
</body>
</html> 