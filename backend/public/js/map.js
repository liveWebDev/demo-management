var map;
var markers = [];

function initialize() {
    var myLatlng = {lat: 50.736129, lng: -1.988229};
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: myLatlng,
        zoom: 6
    });

    markers = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Click to zoom'
    });

    map.addListener('click', function (e) {
        var latLng = e.latLng;
        var lat = latLng.lat();
        var lng = latLng.lng();
        $("input[name='latitude']").val(lat);
        $("input[name='longitude']").val(lng);
        placeMarkerAndPanTo(e.latLng, map);
    });
};

function placeMarkerAndPanTo(latLng, map) {
    resizeMap();
    markers = new google.maps.Marker({
        position: latLng,
        map: map
    });
    map.panTo(latLng);
}

$('#googleMapModal').on('show.bs.modal', function () {
    resizeMap();
});

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function removeMarkers() {
    if (markers) {
        for (i=0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers.length = 0;
    }
}

function resizeMap() {
    if (typeof map == "undefined") return;
    setTimeout(function () {
        resizingMap();
    }, 400);
}

function resizingMap() {
    if (typeof map == "undefined") return;
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
}