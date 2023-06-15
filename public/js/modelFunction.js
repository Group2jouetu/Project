// modelFunction.js

function clickListener(event, map) {
    const lat = event.latLng.lat();
    const lng = event.latLng.lng();
    const marker = new google.maps.Marker({
        position: {lat, lng},
        map
    });
}
