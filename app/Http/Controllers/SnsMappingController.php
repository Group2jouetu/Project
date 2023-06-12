<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SnsMappingController extends Controller
{
    
    public function store(Request $request){

        $pin = new Pin();
        
        if($request->file('image')){
            $pin->picture = $request->file('image')->store('public/images');
        }
        
        $pin->latitude = $request->lat;
        $pin->longitude = $request->lng;
        $pin->save();
    }
}
