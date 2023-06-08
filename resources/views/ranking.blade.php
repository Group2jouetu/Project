@extends('layout.layout')

@section('title', 'ランキング')

@section('content')

    <h1>ランキング</h1>

    @foreach ($ranking as $rankings)
        <h2> {{ $rankings->pin_name }}</h2>
        <p>いいね数：{{ $rankings->like_count}}</p>
        <script>
            var latitude = {{ $rankings->latitude }}
            var longitude = {{ $rankings->longitude }}
        </script>
    @endforeach

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 37.1478, lng: 138.236},
                zoom: 12
            });

            const markerPosition = {lat: latitude, lng: longitude};
            
            var marker = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: 'お店の位置'
            });

            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

        }

        function openMyMap() {
            window.open("https://www.google.com/maps/d/edit?mid=1OF1wBE2l6vNNrmU7F-b2OBOi5Sc3Awg&usp=sharing");
        }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

        <div id="map"></div>

    
@endsection