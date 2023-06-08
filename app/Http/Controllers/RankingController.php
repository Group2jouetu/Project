<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        $ranking = DB::select('select * from pins order by like_count desc');
        $data = ['ranking' => $ranking];
        return view('ranking', $data);
        
    }
}