<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\listing;
use App\product;
use Illuminate\Support\Facades\Auth;

class listingscon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings=listing::where('sold',0)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        //dd($listings);
        return view('listings.index')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=product::all()->pluck('name', 'id')->toArray();
        return view('listings.create')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $listing = new listing;
        $listing->bid = $request->input('bid');
        $listing->buyout = $request->input('buyout');
        $listing->amount = $request->input('amount');
        $listing->quality = $request->input('quality');
        $listing->production_date = $request->input('production_date');
        $listing->end_of_auction= $request->input('end_of_auction');
        $listing->sold=0;
        $listing->seller()->associate($user);
        //dd($request->input('product_id'));
        $product=product::find($request->input('product_id'))->get();
        $listing->product()->associate($product);
        $listing->save();
        return Redirect::to('listings.index')->with('message', 'Successfully created listing');
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
