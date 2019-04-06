<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\areacode;
class areacodecon extends Controller
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
                $areacodes=areacode::all();
                return view('areacodes.index')->with('areacodes',$areacodes);
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
        //
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
        if($user->type>10)
            {
                $areacode= new areacode;
                $areacode->name=$request->input('name');
                $areacode->save();
                $areacodes=areacode::all();
                return view('areacodes.index')->with('areacodes',$areacodes);
            }
            $listings=listing::where('sold',0)->where('seller_id','!=',$user->id)->with('product')->orderBy('end_of_auction', 'asc')->paginate(20);
            return redirect('listings')->with('message', 'Successfully created listing');
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
