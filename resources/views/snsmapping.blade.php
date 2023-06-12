@extends('layout.layout') @section('title', 'SNSマップページ') @section('content')
    <div id="map"></div>

    {{-- <button onclick="openMyMap()">モデルコース機能を開く</button> --}}
    
    <!-- ここからモーダルウィンドウ -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>新規登録</h3>
            <form action="/snsInput" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image" id="image-input" class="image" />
                {{-- 選択された画像を表示 --}}
                <img id="preview-image" src="#" style="max-width: 256px; height: auto;">
                <p>場所の名前を入力してください</p>
                <input type="text"   name="pin_title" id="title" placeholder="テキストを入力してください。" value="" />
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


    {{-- 選択した画像を表示する --}}
    <script>
        document.getElementById('image-input').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-image').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });

        // googleマップ
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });

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

                //マーカーを立てた場所を画面中央にする
                this.panTo(e.latLng);

                // クリックした位置の緯度経度を保存しておく
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
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

@endsection
