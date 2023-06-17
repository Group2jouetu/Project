@extends('layout.layout')

@section('title', 'マップページ')

@section('content')
<!-- 旅のしおりのでも処理 -->
@foreach($bookmarks as $bookmark)
<tr>
    <!-- storageフォルダに画像を入れる処理ができれば画像が表示される -->
    <td>{{$bookmark->picture}}</td><br>
    <td>{{$bookmark->pin_name}}</td>
</tr>
@endforeach
     

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

    <link rel="stylesheet" href="{{ asset('css/map.css') }}"> <!-- map.cssのパスが正しい場所になるように修正 -->
@endsection
