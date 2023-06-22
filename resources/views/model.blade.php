@extends('layout.layout')

@section('title', 'ランキング')

@section('add_css')
    <link rel="stylesheet" href="/css/map.css">
@endsection

@section('content')
 
<div id="map"></div>
<div id="log"></div>
<script src="{{ asset('/js/modelFunction.js') }}"></script>

<div id="buttonContainer" class="button-container"></div>
<!-- モデルコース機能 -->
<div id="button-container" style="display: none;"></div> <!-- ボタンを表示するコンテナ -->
<div id="map-container"></div>

<button onclick="toggleModelCourse();">モデルコース</button>

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

    var markerPosition = {lat: 37.1478, lng: 138.236};
    var markerPosition2 = {lat: 37.152780, lng: 138.258531};

    var marker = new google.maps.Marker({
        position: markerPosition,
        map: map,
        title: 'お店の位置'
    });

    var marker2 = new google.maps.Marker({
        position: markerPosition2,
        map: map,
        title: 'お店の位置2'
    });

    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    var request = {
        origin: markerPosition,
        destination: markerPosition2,
        travelMode: google.maps.TravelMode.DRIVING
    };

    var directionsService = new google.maps.DirectionsService();
    directionsService.route(request, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(response);
        } else {
            window.alert('ルートの取得に失敗しました。');
        }
    });

    var contentString =
        '<div id="content">' +
        '<h3>お店の口コミ</h3>' +
        '<p>ここにお店の口コミを表示します。</p>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

    marker2.addListener('click', function() {
        infowindow.open(map, marker2);
    });

    google.maps.event.addListener(map, 'click', function(event) {
        clickListener(event, map);
    });
}

function toggleModelCourse() {
    buttonContainer = document.getElementById('button-container');
    mapContainer = document.getElementById('map-container');
    
    modelCourseEnabled = !modelCourseEnabled;

    if (modelCourseEnabled) {
        buttonContainer.style.display = 'block';
        mapContainer.style.display = 'none';
        openModelCourse();
    } else {
        buttonContainer.style.display = 'none';
        mapContainer.style.display = 'block';
        clearModelCourse();
    }
}

function openModelCourse() {
    var buttonContainer = document.getElementById('button-container');
    buttonContainer.innerHTML = '';

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
    var button = document.createElement('button');
    button.textContent = buttons[i].label;

    var image = document.createElement('img');
    image.src = buttons[i].image;
    image.style.width = '100px'; // 必要に応じて画像のサイズを調整してください

    var container = document.createElement('div');
    container.appendChild(button);
    container.appendChild(image);

    button.addEventListener('click', createTogglePinsFunction(buttons[i].pins));
    buttonContainer.appendChild(container);
}
    clearModelCourse(); // 前回のピンとルートをクリア
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