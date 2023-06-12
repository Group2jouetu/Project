@extends('layout.layout') @section('title', 'SNSマップページ') @section('content')
    <div id="map"></div>

    {{-- <button onclick="openMyMap()">モデルコース機能を開く</button> --}}
    <form action="/snsInput" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="image" id="image" class="image" />
        <p>本文</p>
        <input type="text" name="pin_title" />
        <input type="hidden" name="lat" id="get-lat" />
        <input type="hidden" name="lng" id="get-lng" />
        {{-- <button>キャンセル
            <script>
                window.history.back();
            </script>
        </button> --}}
        {{-- <input type="submit" value="キャンセル"> --}}
        <input type="submit" value="登録">
    </form>

    <div id="image-container" style="min-width: 256px; height: auto;"></div>

    {{-- 選択した画像を表示する --}}
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

        // googleマップ
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });

            //mapクリック時の処理
            var click_marker;
            map.addListener("click", function(e) {
                // すでに立てたマーカーがあった場合、そのマーカーを削除
                if (click_marker) {
                    click_marker.setMap(null);
                }

                //マーカーを立てた場所を画面中央にする
                this.panTo(e.latLng);
                //マーカーを立てる
                document.getElementById('get-lat').value = e.latLng.lat();
                document.getElementById('get-lng').value = e.latLng.lng();
                e.latLng.lat();
                // console.log(e.latLng[Scopes][0]);
                click_marker = new google.maps.Marker({
                    position: e.latLng,
                    map: map,
                    title: e.latLng.toString(),
                    animation: google.maps.Animation.DROP
                });
                // console.log(click_marker.position);
            });
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

@endsection
