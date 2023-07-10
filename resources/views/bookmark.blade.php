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
          @if ($bookmarks === null || count($bookmarks) === 0)
              <p class="nullMessage">お気に入りがありません</p>
          @else
              @foreach($bookmarks as $bookmark)
                  <div class="col">
                      <div class="card shadow-sm">
                        @if (isset($bookmark->picture))
                          <input type="image" src="{{ asset('storage/images').'/'.$bookmark->picture }}" class="btn bd-placeholder-img card-img-top img-fluid" width="100%" height="225" alt="image" data-bs-toggle="modal" data-bs-target="#exampleModal{{$bookmark->pin_id}}">
                        @endif
                          <div class="card-body">
                              <p class="card-title">{{$bookmark->pin_name}}</p>
                              <a href="/bookmark" onclick="event.preventDefault();document.getElementById('favorite-{{$bookmark->pin_id}}').submit();">
                                <i class="fa-solid fa-bookmark fa-xl" style="color: #1f2e51;"></i>
                              </a>
                              <form id="favorite-{{$bookmark->pin_id}}" action="/bookmark" method="POST">
                                  @csrf
                                  @method("DELETE")
                                  <input id="id" type="text" name="id" value="{{$bookmark->pin_id}}" hidden>
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
          @endif
      </div>
  </div>
</div>



@endsection
