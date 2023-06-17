@extends('layout.layout')

@section('title', 'マップページ')

@section('content')

<div id="map"></div>

    <script>
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
                click_marker = new google.maps.Marker({
                    position: e.latLng,
                    map: map,
                    title: e.latLng.toString(),
                    animation: google.maps.Animation.DROP
                });
            });
            
            /* snsmapping.blade.phpより引用 ここから */
            // DBから取得した位置情報にピンを指す
            @foreach ($pins as $pin)
                pinCreate({{ $pin->id }}, {{ $pin->latitude }}, {{ $pin->longitude }}, {{ $pin->_bookmark_flag }});
            @endforeach
            function pinCreate(id, lat, lng, flag){
            // function pinCreate(lat, lng, name){
                var contentString = 
                    '<div id="content">' +
                    '<h3>お店の口コミ</h3>' +
                    '<p>ここにお店の口コミを表示します。</p>';
                if(flag){
                    contentString +=
                        '<form action="/map" method="post">' +
                        '    @csrf' +
                        '    @method("DELETE")' +
                        '    <input id="id" type="text" name="id" value="'+id+'" hidden>' +
                        '    <input type="submit" value="お気に入り削除">'+
                        '</form>';
                }else{
                    contentString +=
                        '<form action="/map" method="post">'+
                        '    @csrf'+
                        '    <input id="pin_id" type="text" name="pin_id" value="'+id+'" hidden>'+
                        '    <input type="submit" value="お気に入り登録">'+
                        '</form>';
                }
                contentString +='</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                
                var position = { lat: lat, lng: lng };
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: 'お店の位置'
                });
                marker.addListener('click', function(){
                    infowindow.open(map, marker);
                });
            }
            /* snsmapping.blade.phpより引用 ここまで */

        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/map.css') }}"> <!-- map.cssのパスが正しい場所になるように修正 --> --}}
@endsection
