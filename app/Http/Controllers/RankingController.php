<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];

        return view('ranking', ['data' => $hello_array]);
    }
}