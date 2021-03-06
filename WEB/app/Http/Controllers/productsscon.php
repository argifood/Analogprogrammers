<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\listing;
use Illuminate\Support\Facades\Auth;
class productsscon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();  
        if($user->type>10)
            {
                $products=product::all();
                return view('products.index')->with('products',$products);
            }
        $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        return redirect('listings')->with('message', 'Successfully created listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $user=Auth::user();  
    if($user->type>10)
        {
            return view('products.create');
        }
    $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
    return redirect('listings')->with('message', 'Successfully created listing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Post
        $product = new product;
        $product->name = $request->input('name');
        $product->icon_name = $fileNameToStore;
        $product->save();
        return redirect('/product')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
