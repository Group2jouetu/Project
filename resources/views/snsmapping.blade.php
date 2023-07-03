@extends('layout.layout')

@section('title', 'SNSマップページ')

@section('add_css')
    <link rel="stylesheet" href="/css/snsmapping.css">
@endsection

@section('content')

    <div id="map"></div>

    <!-- ここからモーダルウィンドウ -->
<div id="modal" class="modal" data-backdrop="false">
    <div class="modal-content">
        <ul class="modal-newadd-head">
            <li class="modal-newadd-li-1">
                <span class="close">&times;</span>
            </li>
            <li class="modal-newadd-li-3">
                <h3 class="modal-newadd-h3">新規ピン登録</h3>
            </li>
        </ul>

        <form action="/snsInput" id="pinForm" method="post" enctype="multipart/form-data">

            <ul class="ly_snsmap_ul">
                <li class="ly_snsmap_li_1">
                    <div class="ly_snsmap_li_div_left">
                        <p class="ly_snsmap_process">ピンの名前を入力してください（必須）</p>
                        <input type="text" name="pin_name" id="title" size="30" placeholder="ピンの名前" value="" required />
                        <label for="select-genre">ジャンルを以下から選択してください（必須）</label><br>
                        <select name="select_genre" id="select-genre" class="form-select" aria-label="Default select example">
                            <option value="1">食べ物</option>
                            <option value="2">宿・ホテル</option>
                            <option value="3">文化</option>
                            <option value="4">遊び施設</option>
                            <option value="5">自然</option>
                        </select>
                    </div>
                </li>
                <li class="ly_snsmap_li_2">
                    <div class="ly_snsmap_li_div_right">
                        <p class="ly_snsmap_process">表示する画像を選択（任意）</p>
                        {{ csrf_field() }}
                        <label for="image-input" class="image-label">
                            <input type="file" name="image" id="image-input" class="image" accept="image/*" style="display: none;" />
                            <img id="preview-image" src="" alt="画像を選択する" />
                        </label>
                    </div>
                </li>
            </ul>
            <div class="ly_snsmap_center_div">
                <p class="ly_snsmap_process">口コミを入力してください（必須）</p>
                <input type="text" name="detail" id="detail" size="30" placeholder="口コミを入力※◯◯文字以内" value="" required />
            </div>

            <input type="hidden" name="lat" id="get-lat" />
            <input type="hidden" name="lng" id="get-lng" />
            <br>
            <div class="ly_snsmap_2buttons">
                <input type="reset" value="キャンセル" onclick="newPinReset()">
                <input type="submit" value="登録" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="dialogSubmit(event)">
            </div>
        </form>
    </div>
</div>
    <!-- ここまで -->
    
<script>
    function showModal() {
        // アニメーションクラスを追加してスライド表示する  
        var modalContent = document.querySelector('.modal-content');
        modalContent.classList.add('show');
        var imgElement = document.getElementById('preview-image');
        imgElement.addEventListener('click', function() {
            showModal();
        });
    }
</script>


    <!-- 登録時の確認画面 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="ly_pin">
            <div class="ly_pin_inside">
                <ul class="ly_pin_ul">
                    <li class="ly_pin_li_1">
                        <p class="ly_pin_p_small">ピンの名前</p> 
                        <div class="pin-name-container">
                            <span id="pinNameValue"></span>
                        </div>
                        <p class="ly_pin_p_small">ジャンル</p>
                        <span id="genreValue"></span>
                    </li>
                    <li class="ly_pin_li_2">
                        <p class="ly_pin_p_small">画像</p>
                        <div class="image-container">
                            <img id="imageValue" src="" alt="画像" style="max-height: 100px; max-width: 100%;">
                        </div>
                    </li>
                </ul>
                <ul class="ly_pin_process_ul">
                    <li class="ly_pin_process_li_1">
                        <p class="ly_pin_p_small">口コミ</p>
                    </li>
                    <li class="ly_pin_process_li_2">
                        <span id="detailValue"></span>
                    </li>
                </ul>
            </div>
            <div class="ly_pin_outside">
                <img id="hukidasi-haikei" src="img/hukidasi.png">
            </div>
        </div>
        <div class="modal-content">    
            <div class="modal-header">
                <button type="button" class="btn-close close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="exampleModalLabel">観光地の登録確認</h5>
            </div>
            <div class="modal-body">以上の内容で登録しますか？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-custom_left" data-bs-dismiss="modal" onclick="closeSecondModalAndOpenFirstModal()">いいえ</button>
                <button type="button" class="btn btn-primary" id="btn-custom_right" onclick="saveAction()">はい</button>
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
                        "{{ $pin->picture }}", {{ $pin->genre }},
                        "{{ $pin->detail }}", {{ $pin->like_count }});
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
            }
        }

        // 選択した画像を表示する
        document.getElementById('image-input').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-image').setAttribute('src', e.target.result);

                document.getElementById('imageValue').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });

        // 保存済みのピンを表示する関数
        function pinCreate(id, lat, lng, pin_name, picture, genre, detail, like_count) {

            // ピンに表示する内容を変数に入れる
            var contentString = `
                <div id="content">
                    <img src="{{ asset('storage/images') }}/${picture}" alt="" style="max-height: 100px;"><br><br>
                    <table>
                        <tr>
                            <td><h3>${pin_name}</h3></td>
                            <td>&#10025;</td>
                            <td>${like_count}</td>
                        </tr>
                        </table>
                    <p>${detail}</p>
                    <br>
                </div><br>
            `;
            
            // ピンの場所にメッセージがあった場合に追加する処理
            contentString += contetnMessage(id);

            // ピンの場所にメッセージを送るフォーム
            contentString += `
                <br>
                <form action="/messageReply" id="messageReply" method="post">
                    @csrf
                    <input type="hidden" name="pin_id" value="${id}">
                    <table>
                        <tr>
                            <td><input type="text" name="return_datail" id="form-message" size="10" placeholder="入力エリア" required /></td>
                            <td><input type="submit" value="送信する"></td>
                        </tr>
                    </table>
                </form>
            `;

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var position = {
                lat: lat,
                lng: lng
            };

            //流用するため関数名はそのままだが、ピン画像を扱う
            var color = pinImage(genre);

            var marker = new google.maps.Marker({
                position: position,
                map: map,
                title: 'お店の位置',
                icon: {
                    url: color,
                    scaledSize: new google.maps.Size(30, 55), // ピン画像のサイズ
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
                // 表示するピンにメッセージが登録されているか確認する
                if ({{$message->pin_id}} === id){
                    var created_at = "{{ $message->created_at }}";
                    // 作成日付の秒数部分を切り落とす
                    created_at = created_at.slice(0, -3).replace('-', '/');
                    messages = `
                        <table class="message-table">
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>${created_at}</td>
                            </tr>
                            <tr>
                                <td colspan="2">{{ $message->message_body }}</td>
                            </tr>
                        </table>
                    `;
                }
            @endforeach
            return messages;
        }

        function pinImage(genre) {
            //ピンのジャンル（食べ物）
            if (genre == 1) {
                return "/img/gurume_pin.png";
            }
            //ピンのジャンル（宿・ホテル）
            else if (genre == 2) {
                return "/img/hotel_pin.png";
            }
            //ピンのジャンル（文化）
            else if (genre == 3) {
                return "/img/culture_pin.png";
            }
            //ピンのジャンル（遊び施設）
            else if (genre == 4) {
                return "/img/leisure_pin.png";
            }
            //ピンのジャンル（自然）
            else if (genre == 5) {
                return "/img/nature_pin.png";
            }
        }

        // formタグの登録ボタンが押された時、確認画面が出るので、フォームの送信を制御
        function dialogSubmit(event) {
            // フォームの送信を一旦止める
            event.preventDefault();

            // 1つめのモーダルウインドウを非表示にする
            var modal = document.getElementById('modal');
            var secondModal = document.getElementById('exampleModal');
            modal.style.display = 'none';
            secondModal.style.display = 'block';

            // 1つめのモーダルウィンドウのフォームの値を取得
            var pinName = document.getElementById('title').value;
            var genre_number = parseInt(document.getElementById('select-genre').value, 10);
            var detail = document.getElementById('detail').value;

            // 2つめのモーダルウィンドウに値をセット
            document.getElementById('pinNameValue').textContent = pinName;
            var genre;
            switch (genre_number) {
                case 1:
                    genre = "食べ物";
                    break;
                case 2:
                    genre = "宿・ホテル";
                    break;
                case 3:
                    genre = "文化";
                    break;
                case 4:
                    genre = "遊び施設";
                    break;
                case 5:
                    genre = "自然";
                    break;
                default:
                    genre = "";
                    break;
                }
            document.getElementById('genreValue').textContent = genre;
            document.getElementById('detailValue').textContent = detail;
        }


        function saveAction() {
            // フォームの送信を再開
            document.getElementById("pinForm").submit();
        }
        
        function closeSecondModalAndOpenFirstModal() {
            // 表示/非表示の切り替え
            var modal = document.getElementById('modal');
            modal.style.display = 'block';
            var secondModal = document.getElementById('exampleModal');
            secondModal.style.display = 'none';


            // 1つ目のモーダルウィンドウの入力フォームをリセットしないようにする
            // document.getElementById('pinForm').reset();
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
