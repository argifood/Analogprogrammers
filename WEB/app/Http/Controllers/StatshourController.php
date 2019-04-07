<?php

namespace App\Http\Controllers;

use App\statshour;
use Illuminate\Http\Request;

class StatshourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new \DateTime();
        $date->modify('-1 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $stats = statshour::where('created_at', '>',$formatted_date)->get();
        return view("stats")->with("stats",$stats);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\statshour  $statshour
     * @return \Illuminate\Http\Response
     */
    public function show(statshour $statshour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\statshour  $statshour
     * @return \Illuminate\Http\Response
     */
    public function edit(statshour $statshour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\statshour  $statshour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, statshour $statshour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\statshour  $statshour
     * @return \Illuminate\Http\Response
     */
    public function destroy(statshour $statshour)
    {
        //
    }
}
