<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingLike extends Model
{
    use HasFactory;

    protected $table = 'pins';

    // テーブルのカラムと対応するフィールドを定義する
    protected $fillable = [
        'like_count',
    ];
}
