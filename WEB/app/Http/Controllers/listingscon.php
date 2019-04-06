<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\listing;
use App\product;
use App\areacode;
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
        $user=Auth::user();
        $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
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
        $areacodes=areacode::all()->pluck('name', 'id')->toArray();
        return view('listings.create')->with('products',$products)->with('areacodes',$areacodes);
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
        $listing->areacodes_id=$request->input('areacode_id');
        $listing->production_date = $request->input('production_date');
        $listing->end_of_auction= $request->input('end_of_auction');
        $listing->sold=0;
        $listing->seller_id=$user->id;
        $product=product::find($request->input('product_id'));
        //dd($product->id);
        $listing->product_id= $product->id;
        $listing->save();
        $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        return view('listings.index')->with('message', 'Successfully created listing');
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
    public function ownindex()
    {
        $user=Auth::user();
        $listings=listing::where('seller_id','=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        return view('listings.own')->with('listings',$listings);
    }
    public function bought()
    {
        $user=Auth::user();
        $listings=listing::where('buyer_id','=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        return view('listings.own')->with('listings',$listings);
    }
    public function bid(Request $request)
    {
        $bid=$request->input("bid_amount");
        $user=Auth::user();
        $listing=listing::find($request->input("listing_id"));
        if($bid<$listing->buyout)
        {
            $listing->bid=$bid;
            $listing->buyer_id=$user->id;
            $listing->save();
        }
        if($bid>=$listing->buyout)
        {
            $listing->bid=$bid;
            $listing->buyer_id=$user->id;
            $listing->sold=1;
            $listing->save();
        }
        $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
        return redirect('listings')->with('message', 'Successfully created listing');
    }
}
