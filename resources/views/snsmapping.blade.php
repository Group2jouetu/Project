@extends('layout.layout') @section('title', 'SNSマップページ') @section('content')
{{-- <div id="map"></div> --}}

{{-- <button onclick="openMyMap()">モデルコース機能を開く</button> --}}

<form action="/" method="get" class="form-example">
    <div>
        <input type="file" name="image" id="image-input">
        <p>本文</p>
        <input type="text" name="text">
        <button>キャンセル
            <script>
                window.history.back();
            </script>
        </button>
        {{-- <input type="submit" value="キャンセル"> --}}
        <input type="submit" value="登録">
    </div>
</form>
<div id="image-container" style="min-width: 256px; height: auto;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image-input').on('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imageUrl = e.target.result;
                $('#image-container').html('<img src="' + imageUrl + '">');
            };

            reader.readAsDataURL(file);
        });
    });

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 37.1478,
                lng: 138.236
            },
            zoom: 12
        });

        var click_marker;

        //mapクリック時の処理
        map.addListener("click", function(e) {

            // すでに立てたマーカーがあった場合、そのマーカーを削除
            if (click_marker) {
                click_marker.setMap(null);
            }

            //マーカーを立てた場所を画面中央にする
            this.panTo(e.latLng);
            //マーカーを立てる
            click_marker = new google.maps.Marker({
                position: e.latLng,
                map: map,
                title: e.latLng.toString(),
                animation: google.maps.Animation.DROP
            });
        });

    }

    function openMyMap() {
        window.open("https://www.google.com/maps/d/edit?mid=1OF1wBE2l6vNNrmU7F-b2OBOi5Sc3Awg&usp=sharing");
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

{{--
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<!-- map.cssのパスが正しい場所になるように修正 --> --}}

@endsection
