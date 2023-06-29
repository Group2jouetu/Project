@extends('layout.layout')

@section('title', 'ランキング')

@section('add_css')
    <link rel="stylesheet" href="/css/model.css">
@endsection

@section('content')
 
<div id="map"></div>
<!-- id=logでモデルコースの所要時間を表示 -->
<div id="log">ルート所要時間</div>
<!-- ↓使ってなさそう -->
<script src="{{ asset('/js/modelFunction.js') }}"></script>

<div class="card-container">
    
  <div class="cardMain">

    {{-- 1番目 --}}
    <div class="card">
      <img src="/img/滝寺不動.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model1" class="card-text"></p>

        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                滝寺不動
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>静な森の中に響き渡る小さな滝の音。その滝のしぶきを浴びる不動明王と周囲の雰囲気が神秘的です。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                岩殿山明静院
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>光が差し込む岩と岩の隙間に佇む木の仏像が何とも神秘的。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseThree">
                岩屋観音堂
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>お堂に迫るようにせり出した巨岩が大迫力！ 大地のパワーを感じます。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                いわおの石仏群
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>岩肌に無数に彫られた石仏から人の祈りの力が感じ取れる場所です。</strong>...
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



    
    {{-- 2番目 --}}
    <div class="card">
      <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">

        <p id="model2" class="card-text"></p>
        <div class="accordion" id="accordionExample2">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapseOne">
                春日山神社
              </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <strong>受験生の皆さんにおすすめの合格祈願スポット巡りプランです。まずは春日山神社。試験という"戦"の前に、戦国最強とも謳われた上杉謙信公の御加護を得てパワーアップ。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
              菅原神社
              </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <strong>続いて、学問の神様・菅原道真公を祀る清里区の菅原神社へ。緑が濃い静謐な空間で気持ちも身も引き締まります。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
              地すべり資料館
              </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <strong>そして板倉区の地すべり資料館。"すべり止め"の歴史や技術が学べて、さらに"すべり止め鉛筆"やお守りなど、必携の品々も販売されています。</strong>...
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>




    {{-- 3番目 --}}
    <div class="card">
      <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model3" class="card-text"></p>

        <div class="accordion" id="accordionExample3">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapseOne">
              春日山城跡
              </button>
            </h2>
            <div id="collapse9" class="accordion-collapse collapse show" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <strong>上越市内を一望できる本丸からの景色は圧巻の一言！天気は運次第。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapseTwo">
              楞厳寺
              </button>
            </h2>
            <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <strong>上杉謙信配下の猛将、柿崎景家の墓と柿崎城の搦手門を移築した登録有形文化財の山門。時間があったら西国三十三所巡りも。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapseThree">
              高田城三重櫓
              </button>
            </h2>
            <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <strong>日没後のライトアップが幻想的です。</strong>...
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </div>
</div>
    

  <div class="cardMain">

    
    {{-- 4番目 --}}
    <div class="card">
    <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model4" class="card-text"></p>

        <div class="accordion" id="accordionExample4">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="true" aria-controls="collapseOne">
              くびき野レールパーク
              </button>
            </h2>
            <div id="collapse13" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
              <div class="accordion-body">
                <strong>大正から昭和まで頸城野平野を走った『頸城鉄道』の本社車庫や車両が保管されてる場所。一般公開日に行われる乗車体験は大人も子供も楽しめます。（通常は非公開）</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapseTwo">
              直江津D51レールパーク
              </button>
            </h2>
            <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
              <div class="accordion-body">
                <strong>SLに乗車できるのはもちろん、転車台や扇形庫などの鉄道遺産も見学できる。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapseThree">
              直江津駅
              </button>
            </h2>
            <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
              <div class="accordion-body">
                <strong>大きな丸窓からSLや在来線をお見送り。タイミングが合えば雪月花や越乃シュクラが入ってくる瞬間も。</strong>...
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>



    
    {{-- 5番目 --}}
    <div class="card">
      <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model5" class="card-text"></p>

        <div class="accordion" id="accordionExample5">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="true" aria-controls="collapseOne">
              松ヶ峯
              </button>
            </h2>
            <div id="collapse17" class="accordion-collapse collapse show" data-bs-parent="#accordionExample5">
              <div class="accordion-body">
                <strong>ここでは妙高山×星空×リフレクション！おー！と思わず声に出しちゃうくらい神秘的な写真が撮れますよ！</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapseTwo">
              上越清里 星のふるさと館
              </button>
            </h2>
            <div id="collapse18" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
              <div class="accordion-body">
                <strong>ここでは建物×星空！名にふさわしい写真が撮れますよ(*^^*)</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapseThree">
              光ヶ原高原センター
              </button>
            </h2>
            <div id="collapse19" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
              <div class="accordion-body">
                <strong>上越の街並み×星空×山！自分の住んでいる所を見渡しながら撮る写真はなにかグッとくるものがあります！個人的にデートスポットとしてもあり！</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapseThree">
              妙高サンシャインランド
              </button>
            </h2>
            <div id="collapse20" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
              <div class="accordion-body">
                <strong>妙高サンシャインランド（中郷区）妙高山の向こう側にオリオンが沈みます。空だけでなく湖面に映る星空も是非堪能してください。</strong>...
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



    
    {{-- 6番目 --}}
    <div class="card">
      <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model6" class="card-text"></p>
    
            <div class="accordion" id="accordionExample6">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="true" aria-controls="collapseOne">
                  上越市立水族博物館 うみがたり
                  </button>
                </h2>
                <div id="collapse21" class="accordion-collapse collapse show" data-bs-parent="#accordionExample6">
                  <div class="accordion-body">
                    <strong>オシャレな館内と四季で異なるイルカショー。年パスもあるので、雨の日はぶらりと来て優雅な館内散歩も🐬</strong>...
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapseTwo">
                  瞽女ミュージアム高田
                  </button>
                </h2>
                <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                  <div class="accordion-body">
                    <strong>夏は風鈴を出してる家やお店も多く、歩いててテンションが上がります。高橋孫左衛門商店で瑠璃飴を買ったので、氷の器に入れて涼を感じました❄</strong>...
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapseThree">
                  旧師団長官舎
                  </button>
                </h2>
                <div id="collapse23" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
                  <div class="accordion-body">
                    <strong>旬の地元食材と四季折々の料理に舌つづみ✨楽しいひとときでした。</strong>...
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    </div>
  </div>


  
  {{-- 7番目 --}}
  <div class="cardMain">
    <div class="card">
    <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model7" class="card-text"></p>

        <div class="accordion" id="accordionExample7">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="true" aria-controls="collapseOne">
              光ヶ原高原センター
              </button>
            </h2>
            <div id="collapse25" class="accordion-collapse collapse show" data-bs-parent="#accordionExample7">
              <div class="accordion-body">
                <strong>光ヶ原高原(板倉区）オリオン座と言えば冬の星座ですが、ここは冬期間は閉鎖で行くことができません。しかし、秋深まる頃に東の空から上ってくるオリオン座を観察できます。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse26" aria-expanded="false" aria-controls="collapseTwo">
              上越清里 星のふるさと館
              </button>
            </h2>
            <div id="collapse26" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
              <div class="accordion-body">
                <strong>星のふるさと館（清里区）ここも冬期間は行くことができません。オリオン座を観察&撮影するなら11月中です。</strong>...
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    
    {{-- 8番目 --}}
    <div class="card">
      <img src="/img/samplePicture.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p id="model8" class="card-text"></p>
        <div class="accordion" id="accordionExample8">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse29" aria-expanded="true" aria-controls="collapseOne">
              関田峠
              </button>
            </h2>
            <div id="collapse29" class="accordion-collapse collapse show" data-bs-parent="#accordionExample8">
              <div class="accordion-body">
                <strong></strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse30" aria-expanded="false" aria-controls="collapseTwo">
              虫川の大杉
              </button>
            </h2>
            <div id="collapse30" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
              <div class="accordion-body">
                <strong>光が差し込む岩と岩の隙間に佇む木の仏像が何とも神秘的。</strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse31" aria-expanded="false" aria-controls="collapseThree">
              板山不動尊
              </button>
            </h2>
            <div id="collapse31" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
              <div class="accordion-body">
                <strong> </strong>...
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse32" aria-expanded="false" aria-controls="collapseThree">
              船見公園
              </button>
            </h2>
            <div id="collapse32" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
              <div class="accordion-body">
                <strong></strong>...
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>

<div id="buttonContainer" class="button-container"></div>
<!-- モデルコース機能 -->
<div id="button-container" style="display: none;"></div> <!-- ボタンを表示するコンテナ -->
<div id="map-container"></div>

<script>
var map;
var modelCourseEnabled = false;
var buttonContainer;
var mapContainer;
var markers = []; // 追加されたマーカーを管理する配列
var directionsRenderer;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 37.1478, lng: 138.236},
        zoom: 12
    });


    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    google.maps.event.addListener(map, 'click', function(event) {
        clickListener(event, map);
    });

    //初期配置テスト
    var buttons = [
        {
            label: '穴場の神秘&パワースポットツアー',
            image: '/img/samplePicture.jpg',
            pins: [
                { lat: 37.11826, lng: 138.21317, name: '滝寺不動'  },
                { lat: 37.166, lng: 138.20088, name: '岩殿山明静院' },
                { lat: 37.152, lng: 138.09929, name: '岩屋観音堂'  }
            ],
        },
        {
            label: '受験生必見⁉ 合格祈願パワースポットめぐり',
            image: 'image2.jpg',
            pins: [
                { lat: 37.14742, lng: 138.20893, name: '春日山神社'},
                { lat: 37.07409, lng: 138.32688, name: '菅原神社'},
                { lat: 37.00446, lng: 138.32684, name: '地すべり資料館'}
            ],
        },
        // 他のボタンも同様に追加
        {
            label: '城好きならここへ行け',
            pins: [
                { lat: 37.14666, lng: 138.20555, name: '春日山城跡'},
                { lat: 37.2446, lng: 138.45126, name: '楞厳寺'},
                { lat: 37.10985, lng: 138.25593, name: '高田城三重櫓'}
            ],
        },
        {
            label: '鉄道のまち直江津を巡る旅',
            pins: [
                { lat: 37.18357, lng: 138.32875, name: 'くびき野レールパーク'},
                { lat: 37.17091, lng: 138.24662, name: '直江津Ｄ51レールパーク'},
                { lat: 37.17022, lng: 138.24208, name: '直江津駅'}
            ],
        },
        {
            label: '上越地域星めぐり#上越もよう〜自然と密星空ハンティング旅〜',
            pins: [
                { lat: 37.14742, lng: 138.20893, name: '松ヶ峯'},
                { lat: 37.07409, lng: 138.32688, name: '上越清里 星のふるさと館'},
                { lat: 37.00446, lng: 138.32684, name: '光ヶ原高原センター'}
            ],
        },
        {
            label: '四季を感じる上越さんぽ',
            pins: [
                { lat: 37.17022, lng: 138.24208, name: '上越市立水族博物館 うみがたり'},
                { lat: 37.1194, lng: 138.2466, name: '瞽女ミュージアム高田'},
                { lat: 37.10654, lng: 138.24539, name: '旧師団長官舎'}
            ],
        },
        {
            label: '「オリオンを追いかけて」',
            pins: [
                { lat: 37.00757, lng: 138.37955, name: '光ヶ原高原センター'},
                { lat: 37.03885, lng: 138.36208, name: '上越清里 星のふるさと館'},
                { lat: 36.94895, lng: 138.21182, name: '妙高サンシャインランド'}
            ],
        },
        {
            label: '自然の美',
            pins: [
                { lat: 36.99372, lng: 138.39338, name: '関田峠'},
                { lat: 37.15382, lng: 138.44754, name: '虫川の大杉'},
                { lat: 37.17174, lng: 138.52442, name: '船見公園'}
            ],
        },
    ];


    for (var i = 0; i < buttons.length; i++) {
        var h5 = document.createElement('h5');
        h5.className = 'card-title';
        h5.textContent = buttons[i].label;

        var br = document.createElement('br');
        var button = document.createElement('button');
        button.id = 'page-top';
        button.className = 'btn btn-primary';
        button.textContent = 'ルート表示';
        //button.textContent = buttons[i].label;

        //var image = document.createElement('img');
        //image.src = buttons[i].image;
        //image.style.width = '100px'; // 必要に応じて画像のサイズを調整してください

        var model_button = document.getElementById(`model${i + 1}`);
        model_button.before(h5);
        model_button.after(br);
        model_button.after(button);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        //var container = document.createElement('div');
        //container.appendChild(button);
        //container.appendChild(image);

        button.addEventListener('click', createTogglePinsFunction(buttons[i].pins));
        //buttonContainer.appendChild(container);
    }
}

function clearModelCourse() {
    var logElement = document.getElementById('log');
    logElement.innerText = '';

    if (markers.length > 0) {
        // マーカーを削除
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    // ルートをクリア
    directionsRenderer.setDirections({ routes: [] });
}

//モデルコースのピンを立てる関数
function createTogglePinsFunction(pins) {
    var logElement = document.getElementById('log');
    var isMarkersVisible = false;

    return function() {
    if (isMarkersVisible) {
        // マーカーとルートを削除
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
        directionsRenderer.setDirections({ routes: [] });
        var message = 'ピンとルートを削除しました。';
        logElement.innerText = message;
        isMarkersVisible = false;
    } else {
        var message = 'ルートを表示しました。';
        logElement.innerText = message;
        isMarkersVisible = true;

        // ルートを計算して表示
        if (pins.length > 1) {
            var waypoints = [];
            for (var i = 1; i < pins.length - 1; i++) {
                waypoints.push({
                    location: pins[i],
                    stopover: true
                });
            }

            var request = {
                origin: pins[0],
                destination: pins[pins.length - 1],
                waypoints: waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            };

            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(response);

                    // ピン間の所要時間を計算して表示
                    var route = response.routes[0];
                    var totalDuration = 0;
                    var legsDuration = [];
                    for (var i = 0; i < route.legs.length; i++) {
                        var duration = route.legs[i].duration.value;
                        legsDuration.push(duration);
                        totalDuration += duration;
                    }

                    // ピン間の所要時間を表示
                    var durationText = legsDuration.map(function(duration) {
                        var hours = Math.floor(duration / 3600);
                        var minutes = Math.floor((duration % 3600) / 60);
                        var seconds = duration % 60;
                        return hours + '時間 ' + minutes + '分 ' + seconds + '秒';
                    });

                    var message = 'A~Bの所要時間：' + durationText.join('、B~Cの所要時間：');
                    logElement.innerText = message;
                } else {
                    window.alert('ルートの取得に失敗しました。');
                }
            });
        }
    }
};

}


// ピンの追加と所要時間の表示をトグルするためのボタン
var toggleButton = document.getElementById('toggleButton');
toggleButton.addEventListener('click', togglePins);

function clearModelCourse() {
    var logElement = document.getElementById('log');
    logElement.innerText = '';
}

initMap();
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJoO2BmaGEIp_ud8Mctyd5gLDWrEYzMFA&callback=initMap"></script>
@endsection