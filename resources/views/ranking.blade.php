@extends('layout.layout')

@section('title', 'ランキング')

@section('content')

    <div class="crown">
        {{-- 金冠 --}}
        <img src="img/crown_01_gold.png" alt="金冠" class="card-img-top">
        {{-- 銀冠 --}}
        <img src="img/crown_01_silver.png" alt="銀冠" class="card-img-top">
        {{-- 銅冠 --}}
        <img src="img/crown_01_bronze.png" alt="銅冠" class="card-img-top">
    </div>
    
    
    <div class="cardMain">

        @foreach ($ranking as $rankings)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $rankings->picture }}" alt="カードの画像" class="card-img-top">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h5 class="card-title">{{ $rankings->pin_name }}</h5></li>
                        <li class="list-group-item"><p class="card-text">{{ $rankings->detail }}</p></li>
                        <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $rankings->like_count}}</p></li>
                    </ul>
            </div>
        
        @endforeach
        
    </div>

    {{-- 食べ物 --}}
    <h2 class="title">食べ物</h2>
    <div class="cardMain">

        @foreach ($food as $food_data)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $food_data->picture }}" alt="カードの画像" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">{{ $food_data->pin_name }}</h5></li>
                    <li class="list-group-item"><p class="card-text">{{ $food_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $food_data->like_count}}</p></li>
                </ul>
            </div>
        
        @endforeach
        
    </div>

    {{-- 宿泊 --}}
    <h2 class="title">宿泊</h2>
    <div class="cardMain">

        @foreach ($hotel as $hotel_data)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $hotel_data->picture }}" alt="カードの画像" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">{{ $hotel_data->pin_name }}</h5></li>
                    <li class="list-group-item"><p class="card-text">{{ $hotel_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $hotel_data->like_count}}</p></li>
                </ul>
            </div>
        
        @endforeach
        
    </div>

    {{-- 文化 --}}
    <h2 class="title">文化</h2>
    <div class="cardMain">

        @foreach ($culture as $culture_data)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $culture_data->picture }}" alt="カードの画像" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">{{ $culture_data->pin_name }}</h5></li>
                    <li class="list-group-item"><p class="card-text">{{ $culture_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $culture_data->like_count}}</p></li>
                </ul>
            </div>
        
        @endforeach
        
    </div>

    {{-- 遊び --}}
    <h2 class="title">遊び</h2>
    <div class="cardMain">

        @foreach ($amusement as $amusement_data)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $amusement_data->picture }}" alt="カードの画像" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">{{ $amusement_data->pin_name }}</h5></li>
                    <li class="list-group-item"><p class="card-text">{{ $amusement_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $amusement_data->like_count}}</p></li>
                </ul>
            </div>
        
        @endforeach
        
    </div>

    {{-- 自然 --}}
    <h2 class="title">自然</h2>
    <div class="cardMain">

        @foreach ($nature as $nature_data)

            <div class="card">
            {{-- 画像 --}}
            <img src="img/{{ $culture_data->picture }}" alt="カードの画像" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">{{ $culture_data->pin_name }}</h5></li>
                    <li class="list-group-item"><p class="card-text">{{ $culture_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $culture_data->like_count}}</p></li>
                </ul>
            </div>
        
        @endforeach
        
    </div>

    
@endsection