var map, infoWindow;
var marker;
var ruta;

function initMap() {
  var uluru = {lat: 41.3577465, lng: 2.0615397};

  // inicio mapa
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: uluru
  });

  infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  // marcador
  addMarker(uluru, map)
  
  // eventos
  google.maps.event.addListener(marker,'click',function() {
    map.setZoom(16);
    map.setCenter(marker.getPosition());
  }); 

  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
  });
}

// Adds a marker to the map.
function addMarker(location, map) {
  if (marker){
    marker.setPosition(location);
    ruta = "https://maps.googleapis.com/maps/api/staticmap?center="+location+"&markers=color:red%7Clabel:C%7C40.718217,-73.998284&zoom=12&size=600x400";
    alert(ruta);
  }else{
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  //infoWindow.setPosition(pos);
  //infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}
