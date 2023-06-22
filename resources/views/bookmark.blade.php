@extends('layout.layout')

@section('title', 'マップページ')

@extends('header')

@section('add_css')
    <link rel="stylesheet" href="/css/bookmark.css">
@endsection

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- 旅のしおりのでも処理 -->
        @foreach($bookmarks as $bookmark)
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('storage/images').'/'.$bookmark->picture }}" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" alt="image">

            <div class="card-body">
              <p class="card-title">{{$bookmark->pin_name}}</p>
              <p class="card-text">{{$bookmark->detail}}ここに説明文が入りますここに説明文が入りますここに説明文が入りますここに説明文が入ります</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
