<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RankingLike;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index () 
    {
        // ログインしているユーザの情報取得
        $user = Auth::user();

        // 総合ランキング取得
        $ranking = DB::table('pins')
                    ->orderBy('like_count', 'desc')
                    ->get();

        // var_dump($ranking);
        // グルメランキング取得
        $food = DB::table('pins')
                    ->where('genre', 1)
                    ->orderBy('like_count', 'desc')
                    ->get();

        // 宿泊・ホテルランキング取得
        $hotel = DB::table('pins')
                    ->where('genre', 2)
                    ->orderBy('like_count', 'desc')
                    ->get();

        // 文化ランキング取得
        $culture = DB::table('pins')
                    ->where('genre', 3)
                    ->orderBy('like_count', 'desc')
                    ->get();

        // 遊びランキング取得
        $amusement = DB::table('pins')
                    ->where('genre', 4)
                    ->orderBy('like_count', 'desc')
                    ->get();

        // 自然ランキング取得
        $nature = DB::table('pins')
                    ->where('genre', 5)
                    ->orderBy('like_count', 'desc')
                    ->get();

        // ブックマークされている観光地を取得
        $bookmark = DB::table('pins')
                    ->join('bookmarks', 'pins.id', '=', 'bookmarks.pin_id')
                    ->where('bookmarks.user_id', $user->id)
                    ->get();
                    
        // ランキングいいね数
        $rankingLike = DB::table('pins')
                    ->join('bookmarks', 'pins.id', '=', 'bookmarks.pin_id')
                    ->select('pins.id', DB::raw('count(*) as count'))
                    ->groupBy('pins.id')
                    ->orderBy('count', 'desc')
                    ->get();
        // var_dump($rankingLike);
        
        // 取得したいいね数を更新する
        foreach ($rankingLike as $like) {
            RankingLike::where('id', $like->id)->update([
                'like_count' => $like->count
            ]);
        }
                
        return view('ranking', [
            'ranking' => $ranking,
            'food' => $food,
            'hotel' => $hotel,
            'culture' => $culture,
            'amusement' => $amusement,
            'nature' => $nature,
            'bookmark' => $bookmark,
            'rankingLike' => $rankingLike,
        ]);
    }
}

?>