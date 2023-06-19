<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pins extends Model
{
    use HasFactory;

    // 使用するテーブルの指定
    protected $table = 'pins';
    // 入力させないカラム
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // 論理削除（ソフトデリートを使用）
    use SoftDeletes;
}
