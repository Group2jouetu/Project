<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        // 総合
        $ranking = DB::select('select * from pins order by like_count desc limit 10');

        // 食べ物
        $food = DB::select('select * from pins where genre=1 order by like_count desc  limit 10');

        // 宿泊
        $hotel = DB::select('select * from pins where genre=2 order by like_count desc  limit 10');

         // 文化
        $culture = DB::select('select * from pins where genre=3 order by like_count desc  limit 10');

         
        // 遊び
        $amusement = DB::select('select * from pins where genre=4 order by like_count desc  limit 10');

        
        // 自然
        $nature = DB::select('select * from pins where genre=5 order by like_count desc  limit 10');


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