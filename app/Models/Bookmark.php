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
        $results = $this
                ->where('bookmarks.user_id', '=', $user_id)
                ->join('pins', 'bookmarks.pin_id', '=', 'pins.id')
                ->get();
        return $results;
    }

}
