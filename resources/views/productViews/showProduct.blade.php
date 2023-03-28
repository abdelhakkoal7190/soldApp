

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('style/showProduct.css')}} ">
</head>
<body>

    <div class="card">
        <img src="{{asset($product->img)}}" alt="none" style="width:400px">
        <h1> {{$product->name }} </h1>
        <h3>model: {{$product->model }} </h3>
        <h3>price: {{$product->price }} $</h3>
        <h3>rate : {{$product->rate }} / 10 </h3>
        <h3>categoury : {{$product->categoury_id }} </h3>
        <h3>more information about this prodct:</h3>
        <h4> {{$product->shortInfo }} </h4>
        <h4> {{$product->loungInfo }} </h4>
        <p><button>add to card</button></p>
      </div>
</body>
</html>
