@extends('layout.layout')

@section('title', 'マップページ')

@section('content')
<!-- 旅のしおりのでも処理 -->
@foreach($items as $item)
<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->user_id}}</td>
    <td>{{$item->pin_id}}</td>
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

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });

            var markerPosition = {
                lat: 37.1478,
                lng: 138.236
            };
            var markerPosition2 = {
                lat: 37.152780,
                lng: 138.258531
            };

            var marker = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: 'お店の位置'
            });

            var marker2 = new google.maps.Marker({
                position: markerPosition2,
                map: map,
                title: 'お店の位置2'
            });

            //var directionsService = new google.maps.DirectionsService();
            //var directionsRenderer = new google.maps.DirectionsRenderer();
            //directionsRenderer.setMap(map);

            // ルートの要求を作成
            //var request = {
            //    origin: markerPosition,
            //    destination: markerPosition2,
            //    travelMode: google.maps.TravelMode.DRIVING
            //};

            // ルートの検索を実行
            //directionsService.route(request, function(response, status) {
            //    if (status === google.maps.DirectionsStatus.OK) {
            //        directionsRenderer.setDirections(response);
            //    } else {
            //        window.alert('ルートの取得に失敗しました。');
            //    }
            //});

            // 情報ウィンドウのコンテンツを作成
            var contentString =
                '<div id="content">' +
                '<h3>お店の口コミ</h3>' +
                '<p>ここにお店の口コミを表示します。</p>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

            marker2.addListener('click', function() {
                infowindow.open(map, marker2);
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
                pinCreate({{ $pin->id }}, {{ $pin->latitude }}, {{ $pin->longitude }});
            @endforeach
            function pinCreate(id, lat, lng){
            // function pinCreate(lat, lng, name){
                var contentString = 
                    '<div id="content">' +
                    '<h3>お店の口コミ</h3>' +
                    '<p>ここにお店の口コミを表示します。</p>' +
                    '<form action="/map" method="post">'+
                    '    {{csrf_field()}}'+
                    '    <input id="pin_id" type="text" name="pin_id" value="'+id+'" hidden>'+
                    '    <input type="submit" value="登録する">'+
                    '</form>'+
                    '</div>';

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

    <!-- bookmarkの登録ボタンと削除ボタンの切替処理 -->
    <!-- DBの準備終わり次第実装する -->
    <script>
        function disp() {
            var addrecord = document.getElementById('disp');
            addrecord.classList.remove('hidden');
        }
        function hidd() {
            var addrecord = document.getElementById('hidd');
            addrecord.classList.add('hidden');
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/map.css') }}"> <!-- map.cssのパスが正しい場所になるように修正 --> --}}
@endsection
