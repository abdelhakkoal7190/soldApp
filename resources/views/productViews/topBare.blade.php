

@section('topBare')



 @if (Route::has('login'))

 <select style="background: #111; color:#000;" >
    @auth
        <option >
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        </option>
    @else
        <option >
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        </option>


    @if (Route::has('register'))
        <option >
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        </option>
    @endif
@endauth
    <option ></option>
 </select>

@endif


@endsection
