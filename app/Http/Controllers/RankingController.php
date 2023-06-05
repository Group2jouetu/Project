<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        $ranking = DB::select('select * from pins');
        $data = ['ranking' => $ranking];
        return view('ranking', $data);
    }
}