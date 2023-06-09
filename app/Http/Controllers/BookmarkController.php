<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    
    public function map()
    {
        // ピン情報を取得
        $pin = new Pin();
        $bookmark = new Bookmark();
        $user = Auth::user();

        $pins = $pin::all();
        
        // $pinsに_bookmark_flagカラムを追加
        $user_id = null;
        if($user){      // ログイン済みでなければ実行しない
            $user_id = $user->id;
        }
        foreach($pins as $pin){
            $pin_id = 0;
            $res = $bookmark->where('user_id', $user_id)->where('pin_id', $pin->id)->first();
            if($res){
                $pin_id = 1;
            }
            $pin->_bookmark_flag = $pin_id;
        }

        return view('map',[
            'pins' => $pins,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ログイン済みのユーザー情報を取得
        $user = Auth::user();
        
        $bookmark = new Bookmark();
        if (empty($bookmarks)) {
            $bookmarks = null;
        }
        //var_dump($bookmarks);
        $bookmarks = $bookmark->getBookmarksAndInfo($user->id);
        
        return view('bookmark',[
            'bookmarks' => $bookmarks,
        ]);
    }

    //登録処理
    public function create(Request $request)
    {
        $user = Auth::user();
        // 既に登録されている場合のエスケープ
        if(!(Bookmark::where('user_id', $user->id)->where('pin_id', $request->pin_id)->first())){
            // ブックマークに登録
            $bookmark = new Bookmark();
            $bookmark->user_id = $user->id;
            $bookmark->pin_id = $request->pin_id;
            $bookmark->save();
            /* pins.like_countを変更 */
            $pin = (new Pin())->where('id', $request->pin_id)->first();
            $pin->like_count = $pin->like_count + 1;
            $pin->save();
        }
        
        return back();
    }

    //削除処理
    public function delete(Request $request)
    {
        $user = Auth::user();
        /* ブックマークを削除 */
        $bookmark = new Bookmark();
        $bookmark->where('user_id', $user->id)->where('pin_id', $request->id)->delete();
        /* pins.like_countを変更 */
        $pin = (new Pin())->where('id', $request->id)->first();
        $pin->like_count = $pin->like_count - 1;
        $pin->save();
        // DB::delete('delete from bookmarks where id = :id',$param);
        return back();
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
