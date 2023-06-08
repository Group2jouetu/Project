@extends('layout.layout')

@section('title', 'マップページ')

@section('content')
    <div id="map"></div>

    <button onclick="openMyMap()">モデルコース機能を開く</button>

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

            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            // ルートの要求を作成
            var request = {
                origin: markerPosition,
                destination: markerPosition2,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // ルートの検索を実行
            directionsService.route(request, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('ルートの取得に失敗しました。');
                }
            });

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

    {{-- <link rel="stylesheet" href="{{ asset('css/map.css') }}"> <!-- map.cssのパスが正しい場所になるように修正 --> --}}
@endsection
