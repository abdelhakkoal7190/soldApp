<?php

namespace App\Http\Controllers;

use App\Models\categoury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategouryController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('categouryViews.create');
    }


    public function store(Request $request)
    {
        $this->validate($request , [
            'name'  => 'required' ,
            'img'  => 'required|image' ,
            'info' => 'required'
        ]);
    if(!Auth::id())
    return redirect()->back()->with('message' , 'ther is no loging in');


        $imgName = $request->img;
        $path = time().$imgName->getClientOriginalName() ;
        $request->img->move('images' , $path);


        // dd($request);

        $categoury = Categoury::create([
            'name' => $request -> name,
            'user_id' => Auth::id(),
            'img' => 'images/' . $path,
            'info' => $request->info

        ]);
     return redirect()->back()->with('message' , 'your categoury is added seccessfuly');

    }


    public function show(categoury $categoury)
    {
        return view('categouryViews.show' , compact('categoury'));
    }


    public function edit(categoury $categoury)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $categoury = Categoury::find($id);

        // dd($request->all());

        $this->validate($request , [
            'name'  => 'required' ,
            // 'img'  => 'required|image' ,
            'info' => 'required'

        ]);


        if($request->has('img')){
            $imgName = $request->img;
            $path = time().$imgName->getClientOriginalName() ;
            $request->img->move('images' , $path);
            $categoury ->img = 'images/'. $path;

        }
        $categoury ->name = $request -> name;
        $categoury -> info = $request -> info;


        // dd($categoury);

        $categoury->save();
        return redirect()->back()->with('message' , 'your categoury is updated seccessfuly');

    }


    public function destroy(categoury $categoury)
    {
        $categoury->delete();
        return redirect()->back()->with('message' , 'your categoury is deleted seccessfuly');

    }
}
