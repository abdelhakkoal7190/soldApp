<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <link rel="stylesheet" href="{{asset('style/createCategoury.css')}}">
</head>
<body>

    @if ($message = Session::get('message'))

    <h3 style="color:rgb(0, 255, 13);">{{$message}}</h3>
    @endif

<div class="container">

    <form action=" {{route('product.store' )}} " method="POST" enctype="multipart/form-data">
        {{-- @method('') --}}
        @csrf
        <input type="text" placeholder="product name" name="name">
        <input type="number" placeholder="product price" name="price">
        <textarea  name="shortInfo" rows="2" cols="100">product short informations</textarea>
        <textarea  name="loungInfo" rows="5" cols="100">more informations about the product</textarea>
        <input type="text" placeholder="product model" name="model">
        <input type="file" name="img" accept="image/*">
        <select name="categoury_id" id="categoury_id">
            <option >select a categoury</option>
            @foreach ( $categouries as $categoury)
                <option value="{{$categoury->id}}">{{$categoury->name}}</option>
            @endforeach
        </select>
        <button type="submit">Create</button>

    </form>
</div>
</body>
</html>
