@extends('layout.layout')

@section('title', 'ランキング')

@section('content')
    @foreach ($ranking as $rankings)
        <li>{{ $rankings->name }}</li>
    @endforeach
@endsection