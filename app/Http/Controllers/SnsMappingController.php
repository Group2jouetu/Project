<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Pin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SnsMappingController extends Controller
{

    public function index()
    {

        $pin = new Pin();
        $pins = $pin::all();

        $user = Auth::id();

        return view('snsmapping', ["pins" => $pins, "id" => $user]);
    }

    public function store(Request $request)
    {

        // Modelを読み込む
        $pin = new Pin();

        if ($request->file('image')) {
            $dir = 'public/images/';

            // 保存するファイル名を生成
            $image_name = Str::random(32);
            // 送られてきたファイルの拡張子を取得し、生成したファイル名にくっつける
            $image_name .= '.' . $request->file('image')->extension();
            // 画像の保存先とファイル名を指定
            $request->file('image')->storeAs($dir, $image_name);
            // データベースにはファイル名を保存
            $pin->picture = $image_name;
        }

        // ダミーデータ
        $pin->like_count = 0;

        $pin->user_id = Auth::id();
        $pin->pin_name = $request->pin_name;
        $pin->detail = $request->detail;
        $pin->latitude = $request->lat;
        $pin->longitude = $request->lng;
        $pin->genre = $request->input('select_genre');

        $pin->save();

        session()->flash('message', '登録が完了しました。');

        return redirect()->back();
    }

    // メッセージ登録処理
    public function reply(Request $request)
    {
        // Modelを読み込む
        $message = new Message();


        $message->user_id = Auth::id();
        $message->pin_id = $request->pin_id;
        $message->message_title = '';
        $message->message_body = $request->return_datail;

        $message->save();

        return redirect()->back();
    }
}
