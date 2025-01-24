<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($cartData->isEmpty())
        <p>Tu carrito está vacío</p>
    @else
        <ul>
            @foreach ($cartData as $product)
                <li>{{ $product['name']}}: {{ $product['price']}}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
