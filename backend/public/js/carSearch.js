/**
 * @fileoverview This demo is used for MarkerClusterer. It will show 100 markers
 * using MarkerClusterer and count the time to show the difference between using
 * MarkerClusterer and without MarkerClusterer.
 * @author Luke Mahe (v2 author: Xiaoxi Wu)
 */

function $(element) {
  return document.getElementById(element);
}


var carSearch = {};

carSearch.pics = null;
carSearch.map = null;
carSearch.markerClusterer = null;
carSearch.markers = [];
carSearch.infoWindow = null;

carSearch.init = function() {
  var latlng = new google.maps.LatLng(51.5250071, 0.2921468000);
  var options = {
    'zoom': 5,
    'center': latlng,
    'mapTypeId': google.maps.MapTypeId.ROADMAP
  };

  carSearch.map = new google.maps.Map($('map'), options);
  carSearch.data = JSON.parse(records);
  carSearch.pics = carSearch.data.data;
/*
  var useGmm = 1;
  google.maps.event.addDomListener(useGmm, 'click', carSearch.change);
  
  var numMarkers = 1000;
  google.maps.event.addDomListener(numMarkers, 'change', carSearch.change);*/

  carSearch.infoWindow = new google.maps.InfoWindow();

  carSearch.showMarkers();
};

carSearch.showMarkers = function() {
  carSearch.markers = [];
  if (carSearch.markerClusterer) {
    carSearch.markerClusterer.clearMarkers();
  }

  var panel = $('markerlist');
  panel.innerHTML = '';
  var numMarkers = count;
  for (var i = 0; i < numMarkers; i++) {
    var titleText = carSearch.pics[i].title;
    if (titleText === '') {
      titleText = 'No title';
    }

    var item = document.createElement('div');
    var title = document.createElement('a');
    //var span = document.createElement('span');
    title.href = '#';
    title.className = 'title';
    title.innerHTML = titleText;
/*    span.className ="pic";
    span.innerHTML = "<img src='"+carSearch.pics[i].title+"' style='width:150px'/><br/>";*/

    
    //item.appendChild(span);
    item.appendChild(title);
    panel.appendChild(item);

    var latLng = new google.maps.LatLng(carSearch.pics[i].latitude,
        carSearch.pics[i].longitude);

    var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&chco=' +
        'FFFFFF,008CFF,000000&ext=.png';
    var markerImage = new google.maps.MarkerImage(imageUrl,
        new google.maps.Size(24, 32));


    var marker = new google.maps.Marker({
      position: latLng,
      icon: markerImage
    });

    var fn = carSearch.markerClickFunction(carSearch.pics[i], latLng);
    google.maps.event.addListener(marker, 'click', fn);
    google.maps.event.addDomListener(title, 'click', fn);
    carSearch.markers.push(marker);
  }

  window.setTimeout(carSearch.time, 0);
};

carSearch.markerClickFunction = function(pic, latlng) {
  return function(e) {
    e.cancelBubble = true;
    e.returnValue = false;
    if (e.stopPropagation) {
      e.stopPropagation();
      e.preventDefault();
    }
    var title = pic.title;
    var url = pic.image[0].image;
    var fileurl = pic.image[0].image;

    var infoHtml = '<div class="info"><h3>' + title +
      '</h3><div class="info-body">' +
      '<a href="' + url + '" target="_blank"><img src="' +
      fileurl + '" class="info-img"/></a></div>' +
      '<a href="http://www.panoramio.com/" target="_blank">' +
      '<img src="http://maps.google.com/intl/en_ALL/mapfiles/' +
      'iw_panoramio.png"/></a><br/>' +
      '<a href="' + pic.id + '" target="_blank">' + pic.id +
      '</a></div></div>';

    carSearch.infoWindow.setContent(infoHtml);
    carSearch.infoWindow.setPosition(latlng);
    carSearch.infoWindow.open(carSearch.map);
  };
};

carSearch.time = function() {
    carSearch.markerClusterer = new MarkerClusterer(carSearch.map, carSearch.markers, {imagePath: '/images/m'});
};
