@extends('layout.layout')

@section('content')
    <div style="margin: 0 auto;">
        @foreach ($data as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
@endsection
