@extends('layout.layout')

@section('title', 'SNSマップページ')

@section('add_css')
    <link rel="stylesheet" href="/css/snsmapping.css">
@endsection

@section('content')

    <div id="map"></div>

    <!-- ここからモーダルウィンドウ -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>新規登録</h3>
            <div id="alert" style="display: none; color:red">※入力されていない項目があります</div>
            <form action="/snsInput" id="pinForm" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image" id="image-input" class="image" accept="image/*" />
                <br>
                {{-- 選択された画像を表示 --}}
                <img id="preview-image" src="" style="max-width: 256px; height: auto;">
                <input type="text" name="pin_name" id="title" size="30" placeholder="場所の名前を入力してください"
                    value="" />
                <br><br>

                <input type="text" name="detail" id="detail" size="30" placeholder="口コミを入力してください"
                    value="" />
                <br><br>

                <label for="exampleInputEmail1">ジャンルを以下から選択してください。</label><br>
                <select name="select_genre" class="form-select" aria-label="Default select example">
                    <option value="1">食べ物</option>
                    <option value="2">宿・ホテル</option>
                    <option value="3">文化</option>
                    <option value="4">遊び施設</option>
                    <option value="5">自然</option>
                </select>

                <input type="hidden" name="lat" id="get-lat" />
                <input type="hidden" name="lng" id="get-lng" />
                <br>
                <input type="reset" value="キャンセル" onclick="newPinReset()">
                {{-- <input type="submit" value="登録" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    onclick="dialogSubmit(event)"> --}}
                <input type="submit" value="登録" onclick="event.preventDefault(); dialogSubmit(event)">
            </form>
        </div>
    </div>
    <!-- ここまで -->

    <!-- 登録時の確認画面 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">観光地の登録</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">登録しますか？</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">いいえ</button>
                    <button type="button" class="btn btn-primary" onclick="saveAction()">はい</button>
                </div>
            </div>
        </div>
    </div>

    {{-- トースト表示ライブラリ --}}
    <script src="https://riversun.github.io/jsframe/jsframe.js"></script>

    <script>
        // googleマップ
        var map;
        // モーダルウィンドウを操作するための変数
        var modal;
        // 新規登録用のピンを立てたり、消したりするための変数
        var click_marker;
        // 立っているピンをクリックしたときにピンの情報を保存
        var click_pin;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });

            // DBから取得した位置情報にピンを指す
            @isset($pins)
                @foreach ($pins as $pin)
                    pinCreate({{ $pin->id }}, {{ $pin->latitude }}, {{ $pin->longitude }}, "{{ $pin->pin_name }}",
                        "{{ $pin->picture }}",
                        {{ $pin->genre }}, "{{ $pin->detail }}");
                @endforeach
            @endisset

            //mapクリック時の処理
            map.addListener('click', function(e) {
                // すでに立てたマーカーがあった場合、そのマーカーを削除
                newPinReset();

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
                modal = document.getElementById("modal");
                var button = document.getElementById("modalButton");
                var close = document.getElementsByClassName("close")[0];

                function openModalWindow(marker) {
                    modal.style.display = "block";
                }

                // Xボタンか選択画面以外をクリックしたら入力情報をリセットする
                close.onclick = function() {
                    newPinReset();
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        newPinReset();
                    }
                }

                //  ピンを差したらモーダルウィンドウ表示する
                openModalWindow(click_marker);

                // ここまで

            });
        }

        // 入力情報をすべてリセットする関数
        function newPinReset() {
            // すでに立てたマーカーがあった場合、そのマーカーを削除
            if (click_marker) {
                click_marker.setMap(null);

                if (click_pin) {
                    // 表示していたピン情報を閉じる
                    click_pin.close();
                }

                // 入力してあった情報をリセット
                document.getElementById('preview-image').setAttribute('src', "");
                document.getElementById('image-input').value = "";
                document.getElementById('title').value = "";
                modal.style.display = "none";
                // 開いてあったピンの情報を閉じる
                // click_pin.close();
            }
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

        // function pinColor(genre, position) {

        // 保存済みのピンを表示する関数
        function pinCreate(id, lat, lng, pin_name, picture, genre, detail) {

            var contentString = `
                <div id="content">
                    <h3>${pin_name}</h3>
                    <img src="{{ asset('storage/images') }}/${picture}" alt="" style="max-height: 100px;"><br><br>
                    <p>${detail}</p>
                    
                    <br>
                    <form action="/messageReply" id="messageReply" method="post">
                        @csrf
                        <input type="hidden" name="pin_id" value="${id}">
                        <input type="text" name="return_datail" id="title" size="30" placeholder="入力エリア" />
                        <input type="submit" value="送信する">
                    </form>
                </div><br>
            `;
            
            contentString += contetnMessage(id);

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var position = {
                lat: lat,
                lng: lng
            };

            var color = pinColor(genre);

            var marker = new google.maps.Marker({
                position: position,
                map: map,
                // icon: img,
                title: 'お店の位置',
                icon: {
                    path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                    scale: 5,
                    fillColor: color,
                    fillOpacity: 1,
                    strokeWeight: 0
                    // scaledSize: new google.maps.Size(40, 40), // マーカーのサイズ
                    // origin: new google.maps.Point(0, 0),
                    // anchor: new google.maps.Point(20, 40) // アイコンのアンカーポイント
                }
            });
            marker.addListener('click', function() {
                // 立っているピンがある状態で他のピンをクリックすると立っていたピンの情報が消える
                if (click_pin) {
                    click_pin.close();
                }
                click_pin = infowindow;
                infowindow.open(map, marker);
            });
        }

        function contetnMessage(id){
            var messages = "";
            @foreach($messages as $message)
                // messages = '<table>';
                // 表示するピンにメッセージが登録されているか確認する
                if ({{$message->pin_id}} === id){
                    var message = `
                        <table>
                            <tr>
                                <td rowspan='2'></td>
                                <td></td>
                                <td>{{ $message->created_at }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{ $message->message_body }}</td>
                                <td></td>
                            </tr>
                        </table>
                    `;
                    messages += message;
                    // message += '<div style="border: 1px solid"><p>{{ $message->message_body }}</p></div>';
                }
            @endforeach
            return messages;
        }

        function pinColor(genre) {
            //ピンのジャンル（食べ物）
            if (genre == 1) {
                return "blue";
            }
            //ピンのジャンル（宿・ホテル）
            else if (genre == 2) {
                return "red";
            }
            //ピンのジャンル（文化）
            else if (genre == 3) {
                return "black";
            }
            //ピンのジャンル（遊び施設）
            else if (genre == 4) {
                return "white";
            }
            //ピンのジャンル（自然）
            else if (genre == 5) {
                return "yellow";
            }
        }

        // formタグの登録ボタンが押された時、確認画面が出るので、フォームの送信を制御
        function dialogSubmit(event) {
            var name = document.getElementById("title");
            var detail = document.getElementById("detail");
            var alert = document.getElementById('alert');

            if (name.value === "" || detail.value === "") {
                alert.textContent = "※入力されていない項目があります。";
                alert.style.display = "block";
                // event.preventDefault();
            } else {
                var modalElement = bootstrap.Modal(document.getElementById("#exampleModal"));
                var bootstrapModal = new bootstrap.Modal(modalElement);
                bootstrapModal.show();
            }

            // フォームの送信を一旦止める
            event.preventDefault();

        }

        function saveAction() {
            // フォームの送信を再開
            document.getElementById("pinForm").submit();
        }

        // ピンの登録に成功したら、メッセージをトーストで表示
        @if (session('message'))
            const jsFrame = new JSFrame();
            jsFrame.showToast({
                html: '{{ session('message') }}',
                align: 'top',
                duration: 2000
            });
        @endif
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>

@endsection
