<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SnsMappingController extends Controller
{

    public function index(){

        $pin = new Pin();

        // $reco = ['reco'=>'aaa'];
        $pins = $pin::all();
        // dd($reco = $pin::all()->toArray()[0]);

        return view('snsmapping', ["pins" => $pins]);

    }
    
    public function store(Request $request){

        // Modelを読み込む
        $pin = new Pin();
        
        if($request->file('image')){
            $dir = 'public/images/';
            // $pin->picture = $request->file('image')->store('public/images');
            // ファイル名を取得
            $image_name = Str::random(32);
            
            $image_name .= '.' . $request->file('image')->extension();
            $request->file('image')->storeAs($dir, $image_name);
            // データベースにはパス+ファイル名を保存
            $pin->picture = $image_name;
        }        

        // ダミーデータ
        $pin->user_id = 100;
        $pin->detail = "";
        $pin->pin_flag = 0;
        $pin->like_count = 0;
        $pin->genre = 0;
        
        $pin->pin_name = $request->pin_name;
        $pin->latitude = $request->lat;
        $pin->longitude = $request->lng;
        $pin->save();

    }
}
