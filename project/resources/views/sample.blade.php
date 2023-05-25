@extends('layout.layout')

@section('content')
    <div style="margin: 0 auto;">
        @foreach ($data as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>
@endsection
