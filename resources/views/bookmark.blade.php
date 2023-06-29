@extends('layout.layout')

@section('title', 'マップページ')

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
            <input type="image" src="{{ asset('storage/images').'/'.$bookmark->picture }}" class="btn bd-placeholder-img card-img-top img-fluid" width="100%" height="225" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal{{$bookmark->pin_id}}">

            <div class="card-body">
              <p class="card-title">{{$bookmark->pin_name}}</p>
              <form action="/bookmark" method="post">
                  @csrf
                  @method("DELETE")
                  <input id="id" type="text" name="id" value="{{$bookmark->pin_id}}" hidden>
                  <input type="submit" value="お気に入り削除">
              </form>
            </div>
          </div>
        </div>
        <!-- モーダル -->
        <div class="modal fade" id="exampleModal{{$bookmark->pin_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- pictureとdetailを表示 -->
                <img src="{{ asset('storage/images').'/'.$bookmark->picture }}" class="btn bd-placeholder-img card-img-top img-fluid" width="100%" height="225" alt="image">
                <p>{{$bookmark->detail}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


@endsection
