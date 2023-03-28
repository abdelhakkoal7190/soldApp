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



        <img   alt="none" src="{{asset( $categoury->img)}}" style="width: 200px">
        <h1> {{$categoury->name }} </h1>

        <h3>mode information about this product:</h3>
        <h4> {{$categoury->info }} </h4>

      </div>
</body>
</html>
