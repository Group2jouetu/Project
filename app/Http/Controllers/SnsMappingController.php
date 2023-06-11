<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnsMappingController extends Controller
{
    //
    public function store(Request $request){
        $request->file('image')->store('public/images');
    }
}
