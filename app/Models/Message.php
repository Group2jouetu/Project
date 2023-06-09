<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    // 使用するテーブル名
    protected $table = 'messages';
    // 入力させないカラム
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    use SoftDeletes;
    
    public function messageSelectDesc() {
        return $this->orderBy('created_at', 'desc')->get();
    }
}
