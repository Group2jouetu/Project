<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        $ranking = DB::select('select * from pins order by like_count desc');

        // 食べ物
        $food = DB::select('select * from pins where genre=1 order by like_count desc');

        // 宿泊
        $hotel = DB::select('select * from pins where genre=2 order by like_count desc');

         // 文化
        $culture = DB::select('select * from pins where genre=3 order by like_count desc');

         
        // 遊び
        $amusement = DB::select('select * from pins where genre=4 order by like_count desc');

        
        // 自然
        $nature = DB::select('select * from pins where genre=5 order by like_count desc');


        return view('ranking',[
            'ranking' => $ranking,
            'food' => $food,
            'hotel' => $hotel,
            'culture' => $culture,
            'amusement' => $amusement,
            'nature' => $nature,
        ]);
    }
}