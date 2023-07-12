@extends('layout.layout')

@section('title', 'SNSマップページ')

@section('add_css')
    <link rel="stylesheet" href="/css/snsmapping.css">
    <link rel="stylesheet" href="/css/model.css">
@endsection

@section('content')

    <div id="map"></div>

    <div id="log">ルート所要時間</div>
<!-- ↓使ってなさそう -->
<script src="{{ asset('/js/modelFunction.js') }}"></script>

<div class="card-container">

  <div class="cardMain">

    {{-- 1番目 --}}
    <div class="card">

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/滝寺不動.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption">
              <h5>滝寺不動</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/岩殿山明静院.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>岩殿山明静院</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/岩屋観音堂.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>岩屋観音堂</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="card-body">
        <p id="model1" class="card-text"></p>

        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                A.滝寺不動
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>静な森の中に響き渡る小さな滝の音。その滝のしぶきを浴びる不動明王と周囲の雰囲気が神秘的です。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                B.岩殿山明静院
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>光が差し込む岩と岩の隙間に佇む木の仏像が何とも神秘的。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseThree">
                C.岩屋観音堂
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>お堂に迫るようにせり出した巨岩が大迫力！ 大地のパワーを感じます。</p>
              </div>
            </div>
          </div>
          {{-- <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                いわおの石仏群
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>岩肌に無数に彫られた石仏から人の祈りの力が感じ取れる場所です。</p>
              </div>
            </div>
          </div> --}}
        </div>

      </div>
    </div>




    {{-- 2番目 --}}
    <div class="card">

      <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/春日山神社.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>春日山神社</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/菅原神社.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>菅原神社</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/地滑り資料館.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>地すべり資料館</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <div class="card-body">

        <p id="model2" class="card-text"></p>
        <div class="accordion" id="accordionExample2">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapseOne">
                A.春日山神社
              </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <p>受験生の皆さんにおすすめの合格祈願スポット巡りプランです。まずは春日山神社。試験という"戦"の前に、戦国最強とも謳われた上杉謙信公の御加護を得てパワーアップ。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
                B.菅原神社
              </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <p>続いて、学問の神様・菅原道真公を祀る清里区の菅原神社へ。緑が濃い静謐な空間で気持ちも身も引き締まります。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                C.地すべり資料館
              </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
              <div class="accordion-body">
                <p>そして板倉区の地すべり資料館。"すべり止め"の歴史や技術が学べて、さらに"すべり止め鉛筆"やお守りなど、必携の品々も販売されています。</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>




    {{-- 3番目 --}}
    <div class="card">


      <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/春日山城跡.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>春日山城跡</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/楞厳寺.jpg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>楞厳寺</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/高田城三重櫓.jpeg" class="card-img-top" alt="...">
            <div class="carousel-caption ">
              <p>高田城三重櫓</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <div class="card-body">
        <p id="model3" class="card-text"></p>

        <div class="accordion" id="accordionExample3">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapseOne">
                A.春日山城跡
              </button>
            </h2>
            <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <p>上越市内を一望できる本丸からの景色は圧巻の一言！天気は運次第。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapseTwo">
                B.楞厳寺
              </button>
            </h2>
            <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <p>上杉謙信配下の猛将、柿崎景家の墓と柿崎城の搦手門を移築した登録有形文化財の山門。時間があったら西国三十三所巡りも。</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapseThree">
                C.高田城三重櫓
              </button>
            </h2>
            <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
              <div class="accordion-body">
                <p>日没後のライトアップが幻想的です。</p>
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

    <div id="carouselExampleIndicators4" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/くびきのレールパーク.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>くびき野レールパーク</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/直江津D51レールパーク.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>直江津D51レールパーク</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/直江津駅.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>直江津駅</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators4" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <div class="card-body">
      <p id="model4" class="card-text"></p>

      <div class="accordion" id="accordionExample4">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="true" aria-controls="collapseOne">
              A.くびき野レールパーク
            </button>
          </h2>
          <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
            <div class="accordion-body">
              <p>大正から昭和まで頸城野平野を走った『頸城鉄道』の本社車庫や車両が保管されてる場所。一般公開日に行われる乗車体験は大人も子供も楽しめます。（通常は非公開）</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapseTwo">
              B.直江津D51レールパーク
            </button>
          </h2>
          <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
            <div class="accordion-body">
              <p>SLに乗車できるのはもちろん、転車台や扇形庫などの鉄道遺産も見学できる。</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapseThree">
              C.直江津駅
            </button>
          </h2>
          <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
            <div class="accordion-body">
              <p>大きな丸窓からSLや在来線をお見送り。タイミングが合えば雪月花や越乃シュクラが入ってくる瞬間も。</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>




  {{-- 5番目 --}}
  <div class="card">

    <div id="carouselExampleIndicators5" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/松ヶ峰.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>松ヶ峯</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/光ヶ原高原.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>上越清里 星のふるさと館</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/光ヶ原高原(板倉区）.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>光ヶ原高原センター</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators5" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="card-body">
      <p id="model5" class="card-text"></p>

      <div class="accordion" id="accordionExample5">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="true" aria-controls="collapseOne">
              A.松ヶ峯
            </button>
          </h2>
          <div id="collapse17" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
            <div class="accordion-body">
              <p>ここでは妙高山×星空×リフレクション！おー！と思わず声に出しちゃうくらい神秘的な写真が撮れますよ！</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapseTwo">
              B.上越清里 星のふるさと館
            </button>
          </h2>
          <div id="collapse18" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
            <div class="accordion-body">
              <p>ここでは建物×星空！名にふさわしい写真が撮れますよ(*^^*)</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapseThree">
              C.光ヶ原高原センター
            </button>
          </h2>
          <div id="collapse19" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
            <div class="accordion-body">
              <p>上越の街並み×星空×山！自分の住んでいる所を見渡しながら撮る写真はなにかグッとくるものがあります！個人的にデートスポットとしてもあり！</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>




  {{-- 6番目 --}}
  <div class="card">

    <div id="carouselExampleIndicators6" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators6" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators6" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators6" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/うみがたり.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>上越市立水族博物館 うみがたり</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/雁木通り(瞽女ミュージアム〜高橋孫左衛門商店).jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>瞽女ミュージアム高田</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/旧師団長官舎.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>旧師団長官舎</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators6" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators6" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="card-body">
      <p id="model6" class="card-text"></p>

      <div class="accordion" id="accordionExample6">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="true" aria-controls="collapseOne">
              A.上越市立水族博物館 うみがたり
            </button>
          </h2>
          <div id="collapse21" class="accordion-collapse collapse " data-bs-parent="#accordionExample6">
            <div class="accordion-body">
              <p>オシャレな館内と四季で異なるイルカショー。年パスもあるので、雨の日はぶらりと来て優雅な館内散歩も🐬</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapseTwo">
              B.瞽女ミュージアム高田
            </button>
          </h2>
          <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
            <div class="accordion-body">
              <p>夏は風鈴を出してる家やお店も多く、歩いててテンションが上がります。高橋孫左衛門商店で瑠璃飴を買ったので、氷の器に入れて涼を感じました❄</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapseThree">
              C.旧師団長官舎
            </button>
          </h2>
          <div id="collapse23" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">
            <div class="accordion-body">
              <p>旬の地元食材と四季折々の料理に舌つづみ✨楽しいひとときでした。</p>
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

    <div id="carouselExampleIndicators7" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators7" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators7" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators7" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/光ヶ原高原.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>光ヶ原高原センター</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/星のふるさと館.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>上越清里 星のふるさと館</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/妙高サンシャインランド（中郷区）.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>妙高サンシャインランド</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators7" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators7" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="card-body">
      <p id="model7" class="card-text"></p>

      <div class="accordion" id="accordionExample7">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="true" aria-controls="collapseOne">
              A.光ヶ原高原センター
            </button>
          </h2>
          <div id="collapse25" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
            <div class="accordion-body">
              <p>光ヶ原高原(板倉区）オリオン座と言えば冬の星座ですが、ここは冬期間は閉鎖で行くことができません。しかし、秋深まる頃に東の空から上ってくるオリオン座を観察できます。</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse26" aria-expanded="false" aria-controls="collapseTwo">
              B.上越清里 星のふるさと館
            </button>
          </h2>
          <div id="collapse26" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">
            <div class="accordion-body">
              <p>星のふるさと館（清里区）ここも冬期間は行くことができません。オリオン座を観察&撮影するなら11月中です。</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapseThree">
              C.妙高サンシャインランド
            </button>
          </h2>
          <div id="collapse20" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
            <div class="accordion-body">
              <p>妙高サンシャインランド（中郷区）妙高山の向こう側にオリオンが沈みます。空だけでなく湖面に映る星空も是非堪能してください。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  {{-- 8番目 --}}
  <div class="card">

    <div id="carouselExampleIndicators8" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators8" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators8" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators8" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/関田峠.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>関田峠</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/虫川大杉.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>虫川の大杉</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/板山不動滝.jpg" class="card-img-top" alt="...">
          <div class="carousel-caption ">
            <p>板山不動滝</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators8" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators8" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="card-body">
      <p id="model8" class="card-text"></p>
      <div class="accordion" id="accordionExample8">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse29" aria-expanded="true" aria-controls="collapseOne">
              A.関田峠
            </button>
          </h2>
          <div id="collapse29" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
            <div class="accordion-body">
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse30" aria-expanded="false" aria-controls="collapseTwo">
              B.虫川の大杉
            </button>
          </h2>
          <div id="collapse30" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
            <div class="accordion-body">
              <p>光が差し込む岩と岩の隙間に佇む木の仏像が何とも神秘的。</p>...
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse31" aria-expanded="false" aria-controls="collapseThree">
              C.板山不動尊
            </button>
          </h2>
          <div id="collapse31" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
            <div class="accordion-body">
              <p> </p>...
            </div>
          </div>
        </div>
        {{-- <div class="accordion-item">
            <h2 class="accordion-header">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse32" aria-expanded="false" aria-controls="collapseThree">
              船見公園
              </button>
            </h2>
            <div id="collapse32" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">
              <div class="accordion-body">
              </div>
            </div>
          </div> --}}
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

    <!-- 新規登録用のモーダルウィンドウ -->
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
                        <p class="ly_snsmap_process">ピンの名前を入力（必須）</p>
                        <div class="input-wrapper">
                            <input class="maxlength showCount form-control" data-maxlength="30" type="text" name="pin_name" id="title" size="30" placeholder="ピンの名前（30文字以内）" value="" />
                        </div>
                        <label for="select-genre" class="janru">ジャンルを以下から選択（必須）</label><br>
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
                    <textarea class="maxlength showCount form-control" data-maxlength="100" name="detail" id="detail" rows="5" cols="50" placeholder="口コミを入力してください（100文字以内）" required></textarea>
                </div>
                <input type="hidden" name="lat" id="get-lat" />
                <input type="hidden" name="lng" id="get-lng" />
                <br>
                <div class="ly_snsmap_2buttons">
                  <input type="reset" value="キャンセル" class="btn btn-secondary" onclick="newPinReset()">
                  <input type="submit" value="登録" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="dialogSubmit(event)">
                  {{-- btn-lgがあるとキャンセルボタンがなぜか右寄せになるので消しました --}}
                  {{-- <input type="reset" value="キャンセル" class="btn btn-secondary btn-lg" onclick="newPinReset()">
                  <input type="submit" value="登録" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="dialogSubmit(event)"> --}}
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

    <!-- 編集用のモーダルウィンドウ -->
    <div id="edit-modal" class="modal" data-backdrop="false">
        <div class="modal-content">
            <ul class="modal-newadd-head">
                <li class="modal-newadd-li-1">
                    <span id="edit-close">&times;</span>
                </li>
                <li class="modal-newadd-li-3">
                    <h3 class="modal-newadd-h3">ピン情報の編集</h3>
                </li>
            </ul>
            <form action="/pinEdit" id="pinEditForm" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" id="edit-id">
              <ul class="ly_snsmap_ul">
              <li class="ly_snsmap_li_1">
                <div class="ly_snsmap_li_div_left">
                  <p class="ly_snsmap_process">ピンの名前を入力（必須）</p>
                    <div class="input-wrapper">
                      <input class="edit-maxlength showCount form-control" data-maxlength="30" type="text" name="pin_name" id="edit-title" size="30" placeholder="ピンの名前（30文字以内）" value="" />
                    </div>
                  <label for="select-genre" class="janru">ジャンルを以下から選択（必須）</label><br>
                  <select name="select_genre" id="edit-genre" class="form-select" aria-label="Default select example">
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
                  <label for="image-update" class="image-label">
                    <input type="file" name="image" id="image-update" class="image" accept="image/*" style="display: none;" />
                      <img id="edit-image" src="" alt="画像を選択する" />
                  </label>
                </div>
              </li>
              </ul>
              <div class="ly_snsmap_center_div">
                <p class="ly_snsmap_process">口コミを入力してください（必須）</p>
                <textarea class="edit-maxlength showCount form-control" data-maxlength="100" name="detail" id="edit-detail" rows="5" cols="50" placeholder="口コミを入力してください（100文字以内）" required></textarea>
              </div>
                <input type="hidden" name="lat" id="get-lat" />
                <input type="hidden" name="lng" id="get-lng" />
                <br>
              <div class="ly_snsmap_2buttons">
                <input type="reset" value="キャンセル" class="btn btn-secondary" onclick="editCloseButton()">
                <input type="submit" value="更新" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="dialogSubmit(event)">
                {{-- btn-lgがあるとキャンセルボタンがなぜか右寄せになるので消しました --}}
                {{-- <input type="reset" value="キャンセル" class="btn btn-secondary btn-lg" onclick="editCloseButton()">
                <input type="submit" value="更新" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="dialogSubmit(event)"> --}}
              </div>
            </form>
        </div>
    </div>
    <!-- 編集用モーダルウィンドウここまで -->

    {{-- トースト表示ライブラリ --}}
    <script src="https://riversun.github.io/jsframe/jsframe.js"></script>

    <script>
  var map;
  var modelCourseEnabled = false;
  var buttonContainer;
  var mapContainer;
  var markers = []; // 追加されたマーカーを管理する配列
  var directionsRenderer;

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
    directionsRenderer.setDirections({
      routes: []
    });
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
        directionsRenderer.setDirections({
          routes: []
        });
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

              var message = 'A~Bの所要時間：' + durationText.join('\nB~Cの所要時間：');
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

</script>

    <script>
        // googleマップ
        var map;
        // モーダルウィンドウを操作するための変数
        var modal;
        var edit_modal = document.getElementById('edit-modal');
        // 新規登録用のピンを立てたり、消したりするための変数
        var click_marker;
        // 立っているピンをクリックしたときにピンの情報を保存
        var click_pin;

        // 選択した画像を表示する(新規登録画面)
        document.getElementById('image-input').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview-image').setAttribute('src', e.target.result);

                document.getElementById('imageValue').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });

        // 選択した画像を表示する(編集画面)
        document.getElementById('image-update').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('edit-image').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(file);
        });

        // 入力されたテキストの文字数をリアルタイムで表示
        // 文字数表示（https://www.webdesignleaves.com/pr/jquery/javascript-validation.html）を参考
        var count = 0;
        let showCountElems = document.querySelectorAll('.showCount');
        showCountElems.forEach((elem) => {
            const dataMaxlength = elem.getAttribute('data-maxlength');
            if (dataMaxlength && !isNaN(dataMaxlength)) {
                const countElem = document.createElement('p');
                countElem.classList.add('countSpanWrapper');
                countElem.innerHTML = '<span class="countSpan">0</span>/' + parseInt(dataMaxlength);
                elem.parentNode.appendChild(countElem);
            }
            elem.addEventListener('input', (e) => {
                var countSpan = elem.parentElement.querySelector('.countSpan');
                if (countSpan) {
                count = e.currentTarget.value.length;
                countSpan.textContent = count;
                if (count > dataMaxlength) {
                    countSpan.style.setProperty('color', 'red');
                    countSpan.classList.add('overMaxCount');
                } else {
                    countSpan.style.removeProperty('color');
                    countSpan.classList.remove('overMaxCount');
                }
                }
            });
        })
        ;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.1478,
                    lng: 138.236
                },
                zoom: 12
            });

            
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    // ↓ 新規登録ピンがうまく立たない原因 ↓
    // google.maps.event.addListener(map, 'click', function(event) {
    //   clickListener(event, map);
    // });

    //初期配置テスト
    var buttons = [{
        label: '穴場の神秘&パワースポットツアー',
        image: '/img/samplePicture.jpg',
        pins: [{
            lat: 37.11826,
            lng: 138.21317,
            name: '滝寺不動'
          },
          {
            lat: 37.166,
            lng: 138.20088,
            name: '岩殿山明静院'
          },
          {
            lat: 37.152,
            lng: 138.09929,
            name: '岩屋観音堂'
          }
        ],
      },
      {
        label: '受験生必見⁉ 合格祈願パワースポットめぐり',
        image: 'image2.jpg',
        pins: [{
            lat: 37.14742,
            lng: 138.20893,
            name: '春日山神社'
          },
          {
            lat: 37.07409,
            lng: 138.32688,
            name: '菅原神社'
          },
          {
            lat: 37.00446,
            lng: 138.32684,
            name: '地すべり資料館'
          }
        ],
      },
      // 他のボタンも同様に追加
      {
        label: '城好きならここへ行け',
        pins: [{
            lat: 37.14666,
            lng: 138.20555,
            name: '春日山城跡'
          },
          {
            lat: 37.2446,
            lng: 138.45126,
            name: '楞厳寺'
          },
          {
            lat: 37.10985,
            lng: 138.25593,
            name: '高田城三重櫓'
          }
        ],
      },
      {
        label: '鉄道のまち直江津を巡る旅',
        pins: [{
            lat: 37.18357,
            lng: 138.32875,
            name: 'くびき野レールパーク'
          },
          {
            lat: 37.17091,
            lng: 138.24662,
            name: '直江津Ｄ51レールパーク'
          },
          {
            lat: 37.17022,
            lng: 138.24208,
            name: '直江津駅'
          }
        ],
      },
      {
        label: '上越地域星めぐり#上越もよう〜自然と密星空ハンティング旅〜',
        pins: [{
            lat: 37.14742,
            lng: 138.20893,
            name: '松ヶ峯'
          },
          {
            lat: 37.07409,
            lng: 138.32688,
            name: '上越清里 星のふるさと館'
          },
          {
            lat: 37.00446,
            lng: 138.32684,
            name: '光ヶ原高原センター'
          }
        ],
      },
      {
        label: '四季を感じる上越さんぽ',
        pins: [{
            lat: 37.17022,
            lng: 138.24208,
            name: '上越市立水族博物館 うみがたり'
          },
          {
            lat: 37.1194,
            lng: 138.2466,
            name: '瞽女ミュージアム高田'
          },
          {
            lat: 37.10654,
            lng: 138.24539,
            name: '旧師団長官舎'
          }
        ],
      },
      {
        label: '「オリオンを追いかけて」',
        pins: [{
            lat: 37.00757,
            lng: 138.37955,
            name: '光ヶ原高原センター'
          },
          {
            lat: 37.03885,
            lng: 138.36208,
            name: '上越清里 星のふるさと館'
          },
          {
            lat: 36.94895,
            lng: 138.21182,
            name: '妙高サンシャインランド'
          }
        ],
      },
      {
        label: '自然の美',
        pins: [{
            lat: 36.99372,
            lng: 138.39338,
            name: '関田峠'
          },
          {
            lat: 37.15382,
            lng: 138.44754,
            name: '虫川の大杉'
          },
          {
            lat: 37.17174,
            lng: 138.52442,
            name: '船見公園'
          }
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
      button.className = 'btn btn-outline-info';
      button.textContent = 'ルート表示';
      //button.textContent = buttons[i].label;

      //var image = document.createElement('img');
      //image.src = buttons[i].image;
      //image.style.width = '100px'; // 必要に応じて画像のサイズを調整してください

      var model_button = document.getElementById(`model${i + 1}`);
      model_button.before(h5);
      model_button.after(br);
      model_button.after(button);
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      //var container = document.createElement('div');
      //container.appendChild(button);
      //container.appendChild(image);

      button.addEventListener('click', createTogglePinsFunction(buttons[i].pins));
      //buttonContainer.appendChild(container);
      // マップの位置までスクロールする

      button.addEventListener('click', function() {

        const mapElement = document.getElementById("map");

        mapElement.scrollIntoView({

          behavior: 'smooth'

        });

      });
    }

            // DBから取得した位置情報にピンを指す
            @isset($pins)
                @foreach ($pins as $pin)
                    pinCreate({{ $pin->id }}, {{ $pin->latitude }}, {{ $pin->longitude }}, "{{ $pin->pin_name }}",
                        "{{ $pin->picture }}", {{ $pin->genre }},
                        "{{ $pin->detail }}", {{ $pin->like_count }},{{ $pin->_bookmark_flag }});
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
                        // newPinReset();
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
                edit_modal.style.display = "none";
            }
            // 入力された文字数のリセット
            let showCountElems = document.querySelectorAll('.showCount');
            showCountElems.forEach((elem) => {
            var countSpan = elem.parentElement.querySelector('.countSpan');
            if (countSpan) {
                countSpan.textContent = 0;
            }
            });

            // 既存のエラーメッセージを削除
            showCountElems.forEach((elem) => {
                const existingError = elem.parentNode.querySelector('.error');
                if (existingError) {
                existingError.remove();
                }
            });
        }


        // 保存済みのピンを表示する関数
        function pinCreate(id, lat, lng, pin_name, picture, genre, detail, like_count, flag) {

            // ピンに表示する内容を変数に入れる
            var contentString = `
                <div id="content">
                    <img src="{{ asset('storage/images') }}/${picture}" alt="" style="max-height: 100px;"><br><br>
                    <table>
                        <tr>
                            <td><h3>${pin_name}</h3></td>
                            <td><button class="btn btn-primary rounded-circle p-0" style="width:2rem;height:2rem;" onclick="pinEdit(${id}, '${pin_name}', '${detail}', '${picture}', '${genre}')">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </td>
                        </tr>
                    </table>
                    いいね<i class="fa-solid fa-heart" style="color: #ff0088;"></i>${like_count}
            `;

            if (flag) {
                contentString += `
                    <form action="/bookmark" method="post">
                        @csrf
                        @method("DELETE")
                        <input id="id" type="text" name="id" value="${id}" hidden>
                        <input class="btn btn-outline-primary" type="submit" value="お気に入り済">
                    </form>
                `;
            } else {
                contentString += `
                    <form action="/bookmark" method="post">
                        @csrf
                        <input id="pin_id" type="text" name="pin_id" value="${id}" hidden>
                        <input class="btn btn-outline-primary" type="submit" value="お気に入り">
                    </form>
                `;
            }

            contentString += `
                <p class="detailComment">${detail}</p>
                <br>
            </div><br>
            `;

            
            // ピンの場所にメッセージがあった場合に追加する処理
            contentString += contentMessage(id);

            // ピンの場所にメッセージを送るフォーム
            contentString += `
                <br>
                <form action="/messageReply" id="messageReply" method="post">
                    @csrf
                    <input type="hidden" name="pin_id" value="${id}">
                    <table>
                        <tr class="commentSend">
                            <td><input type="text" name="return_datail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="コメント" required></td><br>
                            <td><input class="btn btn-primary" type="submit" value="送信"></td>
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

        function contentMessage(id){
            var messages = "";
            @foreach($messages as $message)
                // 表示するピンにメッセージが登録されているか確認する
                if ({{$message->pin_id}} === id){
                    var created_at = "{{ $message->created_at }}";
                    // 作成日付の秒数部分を切り落とす
                    created_at = created_at.slice(5, -8).replace('-', '/');
                    messages = `
                        <table class="table">
                          <thead>
                            <tr>
                              <th>名前</th>
                              <th>投稿時間</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{ $message->name }}</td>
                              <td>${created_at}</td>
                            </tr>
                            
                            <tr>
                              <td colspan="2">{{ $message->message_body }}</td>
                            </tr>
                          </tbody>
                        </table>
                                            `
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
            var maxlengthElems;
            // input type="button"のvalueの値取得
            var button_value = event.target.value;

            var val_flg = true;// 正常
            event.stopPropagation();
            // フォームの送信を一旦止める
            event.preventDefault();
            // 1つめのモーダルウィンドウのフォームの値を取得
            var pinName;
            var genre_number;
            var detail;

            if(button_value === "登録") {// 登録から入力されたデータの場合
                maxlengthElems =  document.querySelectorAll('.maxlength');
                pinName = document.getElementById('title').value;
                genre_number = parseInt(document.getElementById('select-genre').value, 10);
                detail = document.getElementById('detail').value;
            }

            if(button_value === "更新") {// 編集から入力されたデータの場合
                maxlengthElems =  document.querySelectorAll('.edit-maxlength');
                pinName = document.getElementById('edit-title').value;
                genre_number = parseInt(document.getElementById('edit-genre').value, 10);
                detail = document.getElementById('edit-detail').value;
            }
             // 入力データの文字数＆空白確認
            maxlengthElems.forEach((elem) => {
                removeError(elem); // 既存のエラーメッセージを削除
                let maxlength = elem.getAttribute('data-maxlength');
                if (maxlength && elem.value !== '') {
                    if (elem.value.length > maxlength) {
                        createError(elem, maxlength + '文字以内で入力ください');
                        event.preventDefault();
                        val_flg = false;
                    }
                }
                if (elem.value == '') {
                    createError(elem, '文字を入力してください');
                    val_flg = false;
                }
            });
            // スクリプトの無効化
            pinName = pinName.replace(/<script[^>]*?>.*?<\/script>/gi, '');
            detail = detail.replace(/<script[^>]*?>.*?<\/script>/gi, '');

            // モーダルウインドウの表示/非表示
            if (val_flg) {
                // button_valueが登録　→　1枚目（新規登録）と2枚目（登録確認）の挙動
                if (button_value === "登録") {
                        
                    var modal = document.getElementById('modal');
                    var secondModal = document.getElementById('exampleModal');
                    modal.style.display = 'none';
                    secondModal.style.display = 'block';

                    // 2つめのモーダルウィンドウの表示を初期化（※一度エラーを起こして変更されている場合元に戻す）
                    var secondModalBody = document.querySelector('#exampleModal .modal-body');
                    secondModalBody.innerHTML = '以上の内容で登録しますか？';
                    var secondModalFooter = document.querySelector('#exampleModal .modal-footer');
                    secondModalFooter.innerHTML = `
                        <button type="button" class="btn btn-secondary" id="btn-custom_left" data-bs-dismiss="modal" onclick="closeSecondModalAndOpenFirstModal()">いいえ</button>
                        <button type="button" class="btn btn-primary" id="btn-custom_right" onclick="saveAction()">はい</button>`;
                    
                }
                // button_valueが更新　→　3枚目（編集）と2枚目（編集確認）の挙動
                if (button_value === "更新") {
                       
                    var editModal = document.getElementById('edit-modal');
                    var secondModal = document.getElementById('exampleModal');
                    editModal.style.display = 'none';
                    secondModal.style.display = 'block';

                    // 2つめのモーダルウィンドウの表示を初期化（※一度エラーを起こして変更されている場合元に戻す）
                    var secondModalBody = document.querySelector('#exampleModal .modal-body');
                    secondModalBody.innerHTML = '以上の内容で更新しますか？';
                    var secondModalFooter = document.querySelector('#exampleModal .modal-footer');
                    secondModalFooter.innerHTML = `
                        <button type="button" class="btn btn-secondary" id="btn-custom_left" data-bs-dismiss="modal" onclick="closeSecondModalAndOpenThirdModal()">いいえ</button>
                        <button type="button" class="btn btn-primary" id="btn-custom_right" onclick="editAction()">はい</button>`;
                    
                }
                // 1つめのモーダルウィンドウを非表示
            } else {
                // button_valueが登録　→　1枚目（新規登録）と2枚目（登録確認）の挙動
                if (button_value == "登録") {

                    var modal = document.getElementById('modal');// 新規登録のウインドウを取得
                    var secondModal = document.getElementById('exampleModal');// 登録確認のウインドウを取得
                    modal.style.display = 'none';// 新規登録のウインドウを非表示
                    secondModal.style.display = 'block';// 登録確認のウインドウを表示
                    // 2つめのモーダルウィンドウの表示を変更する
                    var secondModalBody = document.querySelector('#exampleModal .modal-body');// 登録確認のウインドウのレイアウトの取得
                    secondModalBody.innerHTML = '入力内容に誤りがあります。お手数ですが入力し直してください。';// 取得した登録確認のレイアウトの変更
                    var secondModalFooter = document.querySelector('#exampleModal .modal-footer');// 登録確認のウインドウのレイアウトの取得
                    secondModalFooter.innerHTML = `
                        <button type="button" class="btn btn-secondary" id="btn-custom_left" data-bs-dismiss="modal" onclick="closeSecondModalAndOpenFirstModal()">戻る</button>
                    `;// 取得した登録確認のレイアウトの変更
                }
                // button_valueが更新　→　3枚目（編集）と2枚目（編集確認）の挙動
                if (button_value == "更新") {

                    var editModal = document.getElementById('edit-modal');// 編集のウインドウを取得
                    var secondModal = document.getElementById('exampleModal');// 登録確認のウインドウを取得
                    editModal.style.display = 'none';// 編集のウインドウを非表示
                    secondModal.style.display = 'block';// 編集確認のウインドウを表示
                    // 2つめのモーダルウィンドウの表示を変更する
                    var secondModalBody = document.querySelector('#exampleModal .modal-body');// 登録確認のウインドウのレイアウトの取得
                    secondModalBody.innerHTML = '編集内容に誤りがあります。お手数ですが入力し直してください。';// 取得した登録確認のレイアウトの変更
                    var secondModalFooter = document.querySelector('#exampleModal .modal-footer');// 登録確認のウインドウのレイアウトの取得
                    secondModalFooter.innerHTML = `
                        <button type="button" class="btn btn-secondary" id="btn-custom_left" data-bs-dismiss="modal" onclick="closeSecondModalAndOpenThirdModal()">戻る</button>
                    `;// 取得した登録確認のレイアウトの変更
                }
            }
            
            document.getElementById('pinNameValue').textContent = pinName;// 登録確認のウィンドウに値をセット
                
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

        // エラーを削除（既存エラーの初期化）
        function removeError(elem) {
            const existingError = elem.parentNode.querySelector('.error');
            if (existingError) {
                existingError.remove();
            }
        }
        // error文作成
        const createError = (elem, errorMessage) => {
        removeError(elem);
        const errorSpan = document.createElement('span');
        errorSpan.classList.add('error');
        errorSpan.setAttribute('aria-live', 'polite');
        errorSpan.textContent = errorMessage;
        elem.parentNode.appendChild(errorSpan);
        }

        function saveAction() {
            // フォームの送信を再開
            document.getElementById("pinForm").submit();
        }
        function editAction() {
            document.getElementById("pinEditForm").submit();
        }
        
        function closeSecondModalAndOpenFirstModal() { //新規登録＆登録確認
            // 表示/非表示の切り替え
                var modal = document.getElementById('modal');
                modal.style.display = 'block';
                var secondModal = document.getElementById('exampleModal');
                secondModal.style.display = 'none';
        }

        function closeSecondModalAndOpenThirdModal() { //編集＆登録確認
            // 表示/非表示の切り替え
                var editModal = document.getElementById('edit-modal');
                editModal.style.display = 'block';
                var secondModal = document.getElementById('exampleModal');
                secondModal.style.display = 'none';
        }

        // ピン情報編集ボタンを押したときの処理
        function pinEdit(id, pin_name, detail, picture, genre) {
            // ここからマーカー立てたらモーダルウィンドウ開く処理
            var close = document.getElementById("edit-close");

            function openModalWindow(marker) {
                edit_modal.style.display = "block";
            }

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-title').value = pin_name;
            document.getElementById('edit-image').setAttribute('src', "{{ asset('storage/images') }}/"+picture);
            document.getElementById('edit-detail').value = detail;
            document.getElementById('edit-genre').value = genre;
            close.onclick = function(){
                edit_modal.style.display = "none";
            }
            openModalWindow();
        }

        function editCloseButton() {
            edit_modal.style.display = "none";
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
