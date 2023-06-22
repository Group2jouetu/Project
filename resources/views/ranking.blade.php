@extends('layout.layout')

@section('title', 'ランキング')

@section('add_css')
    <link rel="stylesheet" href="/css/ranking.css">
@endsection

@section('content')
 
    {{-- 総合ランキング --}}
    <h2 class="title">全体ランキング</h2>
    <div class="cardMain">
        
        @foreach ($ranking as $rankings)

            <div class="card">
            {{-- 画像 --}}
            @if ($rankings->picture === '')
                <p>画像がありません</p>
            @else   
                <img src="img/{{ $rankings->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $rankings->pin_name }}">
            @endif
            
                    <ul class="list-group list-group-flush">
                            @if ($loop->first)
                                <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $rankings->pin_name }}</h5></li>
                            @endif
                            @if ($loop->iteration === 2)
                                <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $rankings->pin_name }}</h5></li>
                            @endif
                            @if ($loop->iteration === 3)
                                <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $rankings->pin_name }}</h5></li>
                            @endif
                            @if ($loop->iteration >= 4)
                                <li class="list-group-item"><h5 class="card-title">{{ $rankings->pin_name }}</h5></li>
                            @endif
                        <li class="list-group-item"><p class="card-text">{{ $rankings->detail }}</p></li>
                        <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $rankings->like_count}}</p></li>
                    </ul>  
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $rankings->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $rankings->pin_name }}
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $rankings->like_count }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $rankings->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
        @endforeach
        
    </div>

    {{-- 食べ物 --}}
    <h2 class="title">グルメ</h2>
    {{-- <i class="fa-solid fa-utensils"></i> --}}
    <div class="cardMain">

        @foreach ($food as $food_data)

            <div class="card">
            {{-- 画像 --}}
                @if ($food_data->picture === '')
                    <p>画像がありません</p>
                @else
                    <img src="img/{{ $food_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $food_data->pin_name }}">
                @endif
                <ul class="list-group list-group-flush">
                    @if ($loop->first)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $food_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 2)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $food_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 3)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $food_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration >= 4)
                        <li class="list-group-item"><h5 class="card-title">{{ $food_data->pin_name }}</h5></li>
                    @endif
                    <li class="list-group-item"><p class="card-text">{{ $food_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $food_data->like_count}}</p></li>
                </ul>
            </div>
            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $food_data->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $food_data->pin_name }}
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $food_data->like_count}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $food_data->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        @endforeach
        
    </div>

    {{-- 宿泊 --}}
    <h2 class="title">宿泊・ホテル</h2>
    {{-- <i class="fa-solid fa-hotel"></i> --}}
    <div class="cardMain">

        @foreach ($hotel as $hotel_data)

            <div class="card">
            {{-- 画像 --}}
                @if ($hotel_data->picture === '')
                    <p>画像がありません</p>
                @else
                    <img src="img/{{ $hotel_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $hotel_data->pin_name }}">
                @endif
                <ul class="list-group list-group-flush">
                    @if ($loop->first)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $hotel_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 2)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $hotel_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 3)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $hotel_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration >= 4)
                        <li class="list-group-item"><h5 class="card-title">{{ $hotel_data->pin_name }}</h5></li>
                    @endif
                    
                    <li class="list-group-item"><p class="card-text">{{ $hotel_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $hotel_data->like_count}}</p></li>
                </ul>
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $hotel_data->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $hotel_data->pin_name }}
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $hotel_data->like_count}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $hotel_data->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        @endforeach
        
    </div>



    {{-- 文化 --}}
    <h2 class="title">文化・歴史</h2>
    {{-- <i class="fa-solid fa-torii-gate"></i> --}}
    <div class="cardMain">

        @foreach ($culture as $culture_data)

            <div class="card">
            {{-- 画像 --}}
                @if ($culture_data->picture === '')
                    <p>画像がありません</p>
                @else
                    <img src="img/{{ $culture_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $culture_data->pin_name }}">
                @endif
                
                <ul class="list-group list-group-flush">
                    @if ($loop->first)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $culture_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 2)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $culture_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 3)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $culture_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration >= 4)
                        <li class="list-group-item"><h5 class="card-title">{{ $culture_data->pin_name }}</h5></li>
                    @endif
                    <li class="list-group-item"><p class="card-text">{{ $culture_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $culture_data->like_count}}</p></li>
                </ul>
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $culture_data->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $culture_data->pin_name }}</h1>
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $culture_data->like_count}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $culture_data->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        @endforeach
        
    </div>



    {{-- 遊び --}}
    <h2 class="title">レジャー</h2>
    {{-- <i class="fa-solid fa-parachute-box"></i> --}}
    <div class="cardMain">

        @foreach ($amusement as $amusement_data)

            <div class="card">
            {{-- 画像 --}}
                @if ($amusement_data->picture === '')
                    <p>画像がありません</p>
                @else
                    <img src="img/{{ $amusement_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $amusement_data->pin_name }}">
                @endif
                <ul class="list-group list-group-flush">
                    @if ($loop->first)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $amusement_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 2)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $amusement_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 3)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $amusement_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration >= 4)
                        <li class="list-group-item"><h5 class="card-title">{{ $amusement_data->pin_name }}</h5></li>
                    @endif
                    <li class="list-group-item"><p class="card-text">{{ $amusement_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $amusement_data->like_count}}</p></li>
                </ul>
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $amusement_data->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $amusement_data->pin_name }}</h1>
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $amusement_data->like_count}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $amusement_data->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        @endforeach
        
    </div>



    {{-- 自然 --}}
    <h2 class="title">自然</h2>
    {{-- <i class="fa-solid fa-tree"></i> --}}
    <div class="cardMain">

        @foreach ($nature as $nature_data)

            <div class="card">
            {{-- 画像 --}}
                @if ($amusement_data->picture === '')
                    <p>画像がありません</p>
                @else                
                    <img src="img/{{ $nature_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#{{ $nature_data->pin_name }}">
                @endif

                <ul class="list-group list-group-flush">
                    @if ($loop->first)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #e7e00d;"></i>{{ $nature_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 2)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #808080;"></i>{{ $nature_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration === 3)
                        <li class="list-group-item"><h5 class="card-title"><i class="fa-solid fa-crown" style="color: #8c4841;"></i>{{ $nature_data->pin_name }}</h5></li>
                    @endif
                    @if ($loop->iteration >= 4)
                        <li class="list-group-item"><h5 class="card-title">{{ $nature_data->pin_name }}</h5></li>
                    @endif
                    <li class="list-group-item"><p class="card-text">{{ $nature_data->detail }}</p></li>
                    <li class="list-group-item"><p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $nature_data->like_count}}</p></li>
                </ul>
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="{{ $nature_data->pin_name }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $nature_data->pin_name }}</h1>
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $nature_data->like_count}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="img/{{ $nature_data->picture }}" alt="カードの画像" class="card-img-top">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
        @endforeach
        
    </div>

    
@endsection