<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;

    // 使用するテーブルの指定
    protected $table = 'pins';
    // 仮想カラムの追加
    protected $appends = [ '_bookmark_flag' ];
    
    // 入力させないカラム
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
