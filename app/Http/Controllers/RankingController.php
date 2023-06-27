<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RankingLike;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index (Request $request) 
    {
        // ログインしているユーザの情報取得
        $user = Auth::user();

        // pinsテーブル取得
        $query = DB::table('pins');

        // ジャンルごとのランキングを取得する関数
        function getGenreRanking($genre) {
            $ranking = DB::table('pins')
                        ->where('genre', $genre)
                        ->orderBy('like_count', 'desc')
                        ->get();

            $rank = 1;
            foreach ($ranking as $pin) {
                $pin->rank = $rank;
                $rank++;
            }

            return $ranking;
        }

        

        

        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('pin_name', 'like', '%' . $search . '%');
        } else {
            $query->whereRaw('1 = 0'); // 検索条件がない場合に該当しないレコードを返す
        }
        
        $searchRanking = $query->orderBy('like_count', 'desc')->get();
        
        $searchRank = 1;
        // 順位を追加する
        foreach ($searchRanking as $pin) {
            $pin->rank = $searchRank;
            $searchRank++;
        }
        //var_dump($searchRanking);
        
        // 総合ランキング取得
        $ranking = DB::table('pins')
                    ->orderBy('like_count', 'desc')
                    ->get();
                    
                    $rank = 1;
                    // 順位を追加する
                    foreach ($ranking as $pin) {
                        $pin->rank = $rank;
                        $rank++;
                    }

                    // var_dump($ranking);
                    // グルメランキング取得
                    $food = DB::table('pins')
                    ->where('genre', 1)
                    ->orderBy('like_count', 'desc')
                    ->get();
        // グルメランキング取得
        $food = getGenreRanking(1);
        
        // 宿泊・ホテルランキング取得
        $hotel = DB::table('pins')
        ->where('genre', 2)
        ->orderBy('like_count', 'desc')
        ->get();
        // 宿泊・ホテルランキング取得
        $hotel = getGenreRanking(2);
        
        // 文化ランキング取得
        $culture = DB::table('pins')
        ->where('genre', 3)
        ->orderBy('like_count', 'desc')
        ->get();
        // 文化ランキング取得
        $culture = getGenreRanking(3);

        
        // 遊びランキング取得
        $amusement = DB::table('pins')
                    ->where('genre', 4)
                    ->orderBy('like_count', 'desc')
                    ->get();
        // 遊びランキング取得
        $amusement = getGenreRanking(4);
            
                    
        // 自然ランキング取得
        $nature = DB::table('pins')
        ->where('genre', 5)
        ->orderBy('like_count', 'desc')
        ->get();
        
        // 自然ランキング取得
        $nature = getGenreRanking(5);
        
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
        
        // viewに値を返す
        return view('ranking', [
            'searchRanking' => $searchRanking,
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