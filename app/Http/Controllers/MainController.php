<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // ここに関数を作って使っていきます
    public function index()
    {
        $data = [
            'message1' => 'こんなかんじに',
            'message2' => '使います'
        ];
        return View('sample', ['data' => $data]);
    }
}
