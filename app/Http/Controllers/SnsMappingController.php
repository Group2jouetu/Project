<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Pin;
use App\Models\Bookmark;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SnsMappingController extends Controller
{

    public function index()
    {
        // ログイン中のユーザーID
        $user = Auth::user();

        // pinsテーブルのデータを取得
        $pins = new Pin();
        $pins_data = $pins::all();
        // messagesテーブルのデータを取得
        $messages_data = DB::table('messages')
            ->select('messages.pin_id', 'users.name', 'messages.message_body', 'messages.created_at')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->get();
        // $messages = new Message();
        // $messages_data = $messages->messageSelectDesc();


        // $pinsに_bookmark_flagカラムを追加
        $user_id = null;
        if($user){      // ログイン済みでなければ実行しない
            $user_id = $user->id;
        }
        foreach($pins_data as $pin){
            $pin_id = 0;
            $bookmark = new Bookmark();
            $res = $bookmark->where('user_id', $user_id)->where('pin_id', $pin->id)->first();
            if($res){
                $pin_id = 1;
            }
            $pin->_bookmark_flag = $pin_id;
        }


        return view('snsmapping', ["id" => $user->id, "pins" => $pins_data, "messages" => $messages_data]);
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

    // ピンの情報を編集
    public function edit(Request $request)
    {
        $pins = new Pin();
    }
}
