<?php

namespace App\Models;

use App\Models\Pin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmarks';
    public $timestamps = false;

    public function getBookmarksAndInfo($user_id){
        $pin = new Pin();
        // ブックマーク登録済み一覧を取得
        $results = $this->where('user_id', $user_id)->get();
        // pin_idからピンの情報を取得
        foreach($results as $result){
            $pins = $pin->find($result->pin_id);
            $result->user_id = $pins->user_id;
            $result->latitude = $pins->latitude;
            $result->longitude = $pins->longitude;
            $result->picture = $pins->picture;
            $result->pin_name = $pins->pin_name;
            $result->genre = $pins->genre;
            $result->detail = $pins->detail;
            $result->pin_flag = $pins->pin_flag;
            $result->like_count = $pins->like_count;
            $result->created_at = $pins->created_at;
            $result->updated_at = $pins->updated_at;
        }
        return $results;
    }

}
