<?php

namespace App\Http\Controllers;

use App\Models\prodct;
use App\Models\categoury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdctController extends Controller
{

    public function index()
    {

        $id = Auth::id();

        if($id == null){
            $categouries = categoury::all();
            $products = prodct::all();
            return view('client.indexClient' ,compact('products' , 'categouries'));

        }

        else{
            $products = prodct::where('user_id' , $id)->get();
            $categouries = categoury::where('user_id' , $id)->get();
            // $categouries = DB::table('categouries')->where('user_id' , $id)->get();

        //    dd($categouries);
          return view('productViews.index' ,compact('products' , 'categouries'));

        }


    }


    public function create()
    {
           // get id auth
           $id = Auth::id();
           $categouries = categoury::where('user_id' , $id)->get();

         return view('productViews.createProduct' , compact('categouries'));
    }


    public function store(Request $request)
    {

        // dd($request->all());

        $this->validate($request , [
            'name' => 'required',
            'price' => 'required',
            // 'rate' => 'required',
            'shortInfo' => 'required',
            'loungInfo' => 'required',
            'img' => 'required|image',
            'model' => 'required',
            // 'user_id' => 'required',
            'categoury_id' => 'required'

        ]);

        // dd($request->all());
        $imgName = $request->img;
            $path = time().$imgName->getClientOriginalName() ;
            $request->img->move('images' , $path);

        // dd($request->all());

        $product = prodct::create([
            'name' => $request-> name,
            'price' => $request-> price,
            'rate' => 0 ,
            'shortInfo' => $request-> shortInfo,
            'loungInfo' => $request-> loungInfo,
            'img' =>  'images/' . $path,
            'model' => $request-> model,
            'user_id' => Auth::id(),
            'categoury_id' => $request-> categoury_id,

        ]);
     return redirect()->back()->with('message' , 'your product is added seccessfuly');


    }


    public function show(prodct $product)
    {
        return view('productViews.showProduct' , compact('product'));
    }


    public function edit(prodct $prodct)
    {
        //
    }


    public function update(Request $request,  $id)
    {

        // dd($request->all());
        $product = Prodct::find($id);
        $this->validate($request , [
            'name' => 'required',
            'price' => 'required',
            'rate' => 'required',
            'shortInfo' => 'required',
            'loungInfo' => 'required',
            // 'img' => 'required|image',
            'model' => 'required',
            // 'user_id' => 'required',
            'categoury_id' => 'required',

        ]);
        // dd($request->all());
        if($request->has('img')) {

            $imgName = $request->img;
            $path = time().$imgName->getClientOriginalName() ;
            $request->img->move('images' , $path);
            $product->img = 'images/' . $path;
       }


       $product->update([
        'name' => $request->name,
        'price' => $request->price ,
        'rate' => $request-> rate ,
        'shortInfo' => $request-> shortInfo ,
        'loungInfo' => $request-> loungInfo ,
        'model' => $request-> model,
        'categoury_id' => $request-> categoury_id,
      ]);
        // $product->save();


       return redirect()->back()->with('message' , 'your product is updated seccessfuly');
    }

    public function destroy(prodct $product)
    {
        $product->delete();
        return redirect()->back()->with('message' , 'your product is deleted  seccessfuly');

    }
}
