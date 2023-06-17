@extends('layout.layout')

@section('title', 'マップページ')

@section('content')
<!-- 旅のしおりのでも処理 -->
@foreach($bookmarks as $bookmark)
<tr>
    <td>{{$bookmark->id}}</td>
    <td>{{$bookmark->pin_name}}</td>
</tr>
@endforeach

<form action="/map" method="post">
    {{csrf_field()}}
    <p>
      <label for="user_id">ユーザーid</label>
      <input id="user_id" type="text" name="user_id">
    </p>
 
    <p>
      <label for="pin_id">スポットid</label>
      <input id="pin_id" type="text" name="pin_id">
    </p>
    
    <input type="submit" value="登録する">
</form>
<form action="/map" method="post"
    class="inline-block text-gray-500 font-medium"
    role="menuitem" tabindex="-1">
    @csrf
    @method('DELETE')
    <p>
      <label for="id">id(後で削除します)</label>
      <input id="id" type="text" name="id">
    </p>
    <button type="submit"
        class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
</form>

<div id="map"></div>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

    <link rel="stylesheet" href="{{ asset('css/map.css') }}"> <!-- map.cssのパスが正しい場所になるように修正 -->
@endsection
