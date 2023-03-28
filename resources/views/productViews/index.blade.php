<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('style/globale.css')}}">
  <title>categoury</title>
</head>

<body>





    <div class="authbar">

        @guest
        @if (Route::has('login'))

                <a  href="{{ route('login') }}">{{ __('Login') }}</a>

        @endif

        @if (Route::has('register'))

                <a href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
    @else

            <a  href="#" >
                {{ Auth::user()->name }}
            </a>

            <div >
                <a  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest





 @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}" >Home</a>
        @else
            <a href="{{ route('login') }}" >Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" >Register</a>
        @endif
            <a href="{{ route('logout') }}">
        @endauth
      </div>


@endif
<header>

    <div class="navbar">
            @foreach ($categouries as $categoury )
              <a href="#{{$categoury->id}}">{{$categoury->name}} </a>
            @endforeach
        </div>







  </header>

  <main>



         @if ($message = Session::get('message'))

          <p style="color:rgb(55, 255, 81);">{{$message}}</p>
        @endif
        <div class="categoury">
             {{-- categouries tabel--}}
             <div class="btnSection">
                <button class="btn-green"> <a href="{{route('categoury.create')}}" >add categoury</a></button>
                <button class="btn-green"> <a href="{{route('product.create')}}" >add product</a></button>
             </div>
            @foreach ($categouries as $categoury)
                <div class="categouryCounter" id="{{$categoury->id}}"> <span id="counter"> {{$categoury->name}} </span></div>

                    <button class="btn-red" id="deletBtn" onclick="document.getElementById('deletCategoury{{$categoury->id}}').style.display='block'">delete categoury</button>
                         {{-- delet model start--}}
                         <div id="deletCategoury{{$categoury->id}}" class="modal">
                           
                           <span onclick="document.getElementById('deletCategoury{{$categoury->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>
                           <form class="modal-content" action="{{route('categoury.destroy' , $categoury->id)}}" method="post" enctype="multipart/form-data">
                              @method('DELETE')
                              @csrf
                             <div class="container">
                               <h1>Delete Categoury </h1>
                               <p>Are you sure you want to delete this categoury?</p>

                               <div class="clearfix">
                                 <button type="button" class="cancelbtn" onclick="document.getElementById('deletCategoury{{$categoury->id}}').style.display='none'">Cancel</button>
                                 <button type="submit" class="deletebtn">Delete</button>
                               </div>
                             </div>
                           </form>
                         </div>
                        {{-- delet model end--}}
                    <button class="btn-blue" id="editBtn" onclick="document.getElementById('editCategoury{{$categoury->id}}').style.display='block'">edit categoury</a></button>

                          {{-- edit model start--}}
                          <div id="editCategoury{{$categoury->id}}" class="modal">
                            <span onclick="document.getElementById('editCategoury{{$categoury->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <form class="modal-content" action="{{route('categoury.update' , $categoury)}}" method="POST" enctype="multipart/form-data">
                               @method('PUT')
                               @csrf
                                <div class="container">
                                    <img  id="inptImg" alt="none" src="{{asset( $categoury->img)}}">
                                     <input type="file" name="img" accept="image/*">
                                    <input type="text" name="catgName" value="{{$categoury->name}}">
                                    <input type="text" name="CatgInfo" value="{{$categoury->info}}">
                                <div class="clearfix">
                                  <button type="button" class="cancelbtn" onclick="document.getElementById('editCategoury{{$categoury->id}}').style.display='none'">Cancel</button>
                                  <button type="submit" class="cancelbtn" style="background-color: rgb(40, 230, 72)" >Update</button>
                                </div>
                              </div>
                            </form>
                        </div>
                    <button class="btn-gray" id="showProductID"> <a href="{{route('categoury.show' , $categoury->id)}} ">show this categoury</a></button>
                     {{-- edit model end--}}

                    </div>
                </div>


            <table class="customers" id="cat1">
                <tr>
                  <th>prosuct img </th>
                  <th>prosuct name </th>
                  <th> Quantity</th>
                  <th>price </th>
                  <th>options</th>
                </tr>


                @foreach ($products as $product )
                @if ($product->categoury_id == $categoury->id)
                 <tr>
                         <td> <img src="{{asset( $product->img)}}"> </td>
                         <td> {{$product->name}} </td>
                         <td>{{$product->model}}</td>
                         <td>{{$product->price}} $</td>

                         <td>
                           <button class="btn-red" id="deletBtn" onclick="document.getElementById('id{{$product->id}}').style.display='block'">  delete</a></button>
                            {{-- delet model start--}}
                            <div id="id{{$product->id}}" class="modal">
                              <span onclick="document.getElementById('id{{$product->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <form class="modal-content" action="{{route('product.destroy' , $product)}}" method="post">
                                 @method('DELETE')
                                 @csrf
                                <div class="container">
                                  <h1>Delete Product</h1>
                                  <p>Are you sure you want to delete this product?</p>

                                  <div class="clearfix">
                                    <button type="button" class="cancelbtn" onclick="document.getElementById('id{{$product->id}}').style.display='none'">Cancel</button>
                                    <button type="submit" class="deletebtn">Delete</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                              {{-- delet model end--}}
                           <button class="btn-blue" id="editBtn" onclick="document.getElementById('edit{{$product->id}}').style.display='block'" >edit</button>
                               {{-- edit model start--}}
                               <div id="edit{{$product->id}}" class="modal">
                                 <span onclick="document.getElementById('edit{{$product->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>
                                 <form class="modal-content" action="{{route('product.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                   <div class="container">
                                     <img  id="inptImg" alt="none" src="{{asset( $product->img)}}">
                                     <input type="file" name="img" accept="image/*">
                                     <input type="text" name="name" value="{{$product->name}}">
                                    <input type="text" name="model" value="{{$product->model}}">
                                    <p>price</p>
                                     <input type="number" name="price" value="{{$product->price}}">
                                     <p>rate </p>
                                     <input type="number" name="rate" value="{{$product->rate}}">
                                     <input type="text" name="shortInfo" value="{{$product->shortInfo}}">
                                     <input type="text" name="loungInfo" value="{{$product->loungInfo}}">

                                     <div class="clearfix">
                                       <button type="button" class="cancelbtn" onclick="document.getElementById('edit{{$product->id}}').style.display='none'">Cancel</button>
                                       <button type="submit" class="cancelbtn" style="background-color: rgb(40, 230, 72)" >Update</button>
                                     </div>
                                   </div>
                                 </form>
                             </div>
                                 {{-- edit model end--}}
                           <button class="btn-gray" id="showProductID"> <a href="{{route('product.show' , $product->id)}} ">show</a></button>
                          </td>
                         </tr>
                         @endif
                      @endforeach
            </table>
         @endforeach
    </div>



    </body>

 </main>


<script src="{{asset('script/globale.js')}}"></script>
</body>

</html>
