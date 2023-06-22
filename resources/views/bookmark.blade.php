@extends('layout.layout')

@section('title', 'マップページ')

@extends('header')

@section('add_css')
    <link rel="stylesheet" href="/css/bookmark.css">
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- 旅のしおりのでも処理 -->
        @foreach($bookmarks as $bookmark)
        <div class="col-4 text-center">
            <!-- storageフォルダに画像を入れる処理ができれば画像が表示される -->
            <img src="{{ asset('storage/images').'/'.$bookmark->picture }}" class="img-fluid" alt="" style="max-height: 100px;"><br>
            <p>{{$bookmark->pin_name}}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection
