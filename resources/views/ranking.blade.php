@extends('layout.layout')

@section('title', 'ランキング')

@section('content')

    @foreach ($ranking as $rankings)
        <li>いいね数は{{ $rankings->like_count}}</li>
    @endforeach

@endsection