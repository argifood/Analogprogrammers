<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\statshour;
class statshourcon extends Controller
{
    public function index()
    {
    $date = new \DateTime();
    $date->modify('-3 hours');
    $formatted_date = $date->format('Y-m-d H:i:s');
    $stats = statshour::where('created_at', '>',$formatted_date)->get();
    dd($stats);
    }
}