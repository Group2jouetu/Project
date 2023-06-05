@extends('layout.layout')

@section('title', 'ランキング')

@section('content')
    @foreach ($data as $datas)
        <p>{{$datas}}</p><br>
        
    @endforeach
@endsection