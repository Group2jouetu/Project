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
            @if ($rankings->picture === null)
                <p class="card-text">画像がありません</p>
            @else   
                <img src="{{ asset('storage/images').'/'.$rankings->picture }}" alt="カードの画像" class="card-img-top">
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
                            <li class="list-group-item">
                                <p class="card-text">
                                    <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                                    {{ $rankings->like_count}} 
                                </p>
                                {{-- お気に入り設定されていれば --}}
                                @foreach($bookmark as $bookmarks)
                                    @if ($bookmarks->pin_id == $rankings->id)
                                        <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                                    @endif  
                                @endforeach
                            </li>
                            {{-- 詳細 --}}
                            <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $rankings->id }}"></i></li>
                        </ul>  
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="example{{ $rankings->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $rankings->pin_name }}
                                <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $rankings->like_count }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/images').'/'.$rankings->picture }}" alt="カードの画像" class="card-img-top">
                                <li class="list-group-item"><p class="card-text">{{ $rankings->detail }}</p></li>
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
                @if ($food_data->picture === null)
                    <p class="card-text">画像がありません</p>
                @else
                    <img src="{{ asset('storage/images').'/'.$food_data->picture }}" alt="カードの画像" class="card-img-top">
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
                    <li class="list-group-item">
                        <p class="card-text">
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                            {{ $food_data->like_count}}
                        </p>
                        {{-- お気に入り設定されていれば --}}
                        @foreach($bookmark as $bookmarks)
                        @if ($bookmarks->pin_id == $food_data->id)
                        <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                                @endif  
                                @endforeach
                            </li>
                            {{-- 詳細 --}}
                            <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $food_data->id }}"></i></li>            
                        </ul>
            </div>
            <!-- モーダルの設定 -->
            <div class="modal fade" id="example{{ $food_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $food_data->pin_name }}
                                <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $food_data->like_count}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/images').'/'.$food_data->picture }}" alt="カードの画像" class="card-img-top">
                        <li class="list-group-item"><p class="card-text">{{ $food_data->detail }}</p></li>
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
                @if ($hotel_data->picture === null)
                    <p class="card-text">画像がありません</p>
                @else
                    <img src="{{ asset('storage/images').'/'.$hotel_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#example{{ $hotel_data->id }}">
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
                    
                    <li class="list-group-item">
                        <p class="card-text">
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                            {{ $hotel_data->like_count}}
                        </p>
                        {{-- お気に入り設定されていれば --}}
                        @foreach($bookmark as $bookmarks)
                        @if ($bookmarks->pin_id == $hotel_data->id)
                        <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                        @endif  
                        @endforeach
                    </li>
                    {{-- 詳細 --}}
                    <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $hotel_data->id }}"></i></li>                                
                </ul>
            </div>
            
            <!-- モーダルの設定 -->
            <div class="modal fade" id="example{{ $hotel_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $hotel_data->pin_name }}
                                <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $hotel_data->like_count}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/images').'/'.$hotel_data->picture }}" alt="カードの画像" class="card-img-top">
                        <li class="list-group-item"><p class="card-text">{{ $hotel_data->detail }}</p></li>
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
                @if ($culture_data->picture === null)
                    <p class="card-text">画像がありません</p>
                @else
                    <img src="{{ asset('storage/images').'/'.$culture_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#example{{ $culture_data->id }}">
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
                    <li class="list-group-item">
                        <p class="card-text">
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                            {{ $culture_data->like_count}}
                        </p>
                        {{-- お気に入り設定されていれば --}}
                        @foreach($bookmark as $bookmarks)
                        @if ($bookmarks->pin_id == $culture_data->id)
                        <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                        @endif  
                        @endforeach
                    </li>
                    {{-- 詳細 --}}
                    <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $culture_data->id }}"></i></li>
                </ul>
            </div>
            
            <!-- モーダルの設定 -->
            <div class="modal fade" id="example{{ $culture_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $culture_data->pin_name }}</h1>
                        <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $culture_data->like_count}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/images').'/'.$culture_data->picture }}" alt="カードの画像" class="card-img-top">
                        <li class="list-group-item"><p class="card-text">{{ $culture_data->detail }}</p></li>
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
                @if ($amusement_data->picture === null)
                    <p class="card-text">画像がありません</p>
                @else
                    <img src="{{ asset('storage/images').'/'.$amusement_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#example{{ $amusement_data->id }}">
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
                    <li class="list-group-item">
                        <p class="card-text">
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                            {{ $amusement_data->like_count}}
                        </p>
                        {{-- お気に入り設定されていれば --}}
                        @foreach($bookmark as $bookmarks)
                        @if ($bookmarks->pin_id == $amusement_data->id)
                        <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                        @endif  
                        @endforeach
                    </li>
                    {{-- 詳細 --}}
                    <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $amusement_data->id }}"></i></li>
                </ul>
            </div>

            <!-- モーダルの設定 -->
            <div class="modal fade" id="example{{ $amusement_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $amusement_data->pin_name }}</h1>
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $amusement_data->like_count}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/images').'/'.$amusement_data->picture }}" alt="カードの画像" class="card-img-top">
                            <li class="list-group-item"><p class="card-text">{{ $amusement_data->detail }}</p></li>
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
                @if ($nature_data->picture === null)
                    <p class="card-text">画像がありません</p>
                @else                
                    <img src="{{ asset('storage/images').'/'.$nature_data->picture }}" alt="カードの画像" class="card-img-top" data-bs-toggle="modal" data-bs-target="#example{{ $nature_data->id }}">
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
                    <li class="list-group-item">
                        <p class="card-text">
                            <i class="fa-solid fa-heart" style="color: #ff0088;"></i>
                            {{ $nature_data->like_count}}
                        </p>
                            {{-- お気に入り設定されていれば --}}
                            @foreach($bookmark as $bookmarks)
                            @if ($bookmarks->pin_id == $nature_data->id)
                            <i class="fa-solid fa-bookmark" style="color: #e7e00d;"></i>
                            @endif  
                            @endforeach
                        </li>
                        {{-- 詳細 --}}
                        <li class="list-group-item detailIcon"><i class="fa-solid fa-ellipsis" data-bs-toggle="modal" data-bs-target="#example{{ $nature_data->id }}"></i></li>
                    </ul>
                </div>
                
                <!-- モーダルの設定 -->
                <div class="modal fade" id="example{{ $nature_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $nature_data->pin_name }}</h1>
                                <i class="fa-solid fa-heart" style="color: #ff0088;"></i>{{ $nature_data->like_count}}
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/images').'/'.$nature_data->picture }}" alt="カードの画像" class="card-img-top">
                                <li class="list-group-item"><p class="card-text">{{ $nature_data->detail }}</p></li>
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