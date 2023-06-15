@extends('layout.layout')

@section('title', 'SNSマップページ')

@section('content')

<!-- <script>
    @foreach ($pins as $pin)
</script>
-->
        <img src="{{ asset("storage/images/"."$pin->picture") }}" alt="">
        <p>{{ $pin->pin_name }}</p>
        <!--
        <script>
    @endforeach
</script> -->
    <div id="map"></div>

    {{-- <button onclick="openMyMap()">モデルコース機能を開く</button> --}}
    
    <!-- ここからモーダルウィンドウ -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>新規登録</h3>
            <form action="/snsInput" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image" id="image-input" class="image" accept="image/*" />
                {{-- 選択された画像を表示 --}}
                <img id="preview-image" src="#" style="max-width: 256px; height: auto;">
                <p>場所の名前を入力してください</p>
                <input type="text"   name="pin_name" id="title" placeholder="テキストを入力してください。" value="" />
                <br>

                {{-- <select class="form-select" aria-label="Default select example">
                    <option value="">選択してください</option>
                    <option value="">食べ物</option>
                    <option value="">宿・ホテル</option>
                    <option value="">文化</option>
                    <option value="">遊び施設</option>
                    <option value="">自然</option>
                </select> --}}

                <input type="hidden" name="lat" id="get-lat" />
                <input type="hidden" name="lng" id="get-lng" />
                {{-- <button>キャンセル
                    <script>
                        window.history.back();
                    </script>
                </button> --}}
                {{-- <input type="submit" value="キャンセル"> --}}
                <input type="submit" value="登録">
            </form>
        </div>
    </div>
    <!-- ここまで -->

    {{-- <button onclick="pinCreate()"></button> --}}


    <script>
        // googleマップ
        var map;
        var pin_name;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });
            
            // DBから取得した位置情報にピンを指す
            @foreach ($pins as $pin)
                // var pin_name = {{ $pin->pin_name }};
                // pin_name = pin_name.toString;
                pinCreate({{ $pin->latitude }}, {{ $pin->longitude }});
                // pinCreate({{ $pin->latitude }}, {{ $pin->longitude }}, pin_name);
            @endforeach
            function pinCreate(lat, lng){
            // function pinCreate(lat, lng, name){
                var contentString = 
                    '<div id="content">' +
                    '<h3>お店の口コミ</h3>' +
                    '<p>ここにお店の口コミを表示します。</p>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                
                var position = { lat: lat, lng: lng };
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: 'お店の位置'
                });
                marker.addListener('click', function(){
                    infowindow.open(map, marker);
                });
            }

            //mapクリック時の処理
            var click_marker;
            map.addListener("click", function(e) {
                // すでに立てたマーカーがあった場合、そのマーカーを削除
                if (click_marker) {
                    click_marker.setMap(null);
                    // 入力してあった情報をリセット
                    document.getElementById('preview-image').setAttribute('src', "");
                    document.getElementById('image-input').value = "";
                    document.getElementById('title').value = "";
                }
                // if (infowindow){
                //     infowindow.close();
                // }

                // クリックした位置の緯度経度を<input type="hidden">に保存しておく
                document.getElementById('get-lat').value = e.latLng.lat();
                document.getElementById('get-lng').value = e.latLng.lng();

                //マーカーを立てる
                e.latLng.lat();
                click_marker = new google.maps.Marker({
                    position: e.latLng,
                    map: map,
                    title: e.latLng.toString(),
                    animation: google.maps.Animation.DROP
                });
                //マーカーを立てた場所を画面中央にする
                this.panTo(e.latLng);

                // ここからマーカー立てたらモーダルウィンドウ開く処理
                var modal = document.getElementById("modal");
                var button = document.getElementById("modalButton");
                var close = document.getElementsByClassName("close")[0];

                function openModalWindow(marker) {
                    modal.style.display = "block";
                }

                close.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                //  ピンを差したらモーダルウィンドウ表示する
                openModalWindow(click_marker)

                // ここまで

            });
        }
        
        // 選択した画像を表示する
        document.getElementById('image-input').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-image').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });

    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

@endsection
