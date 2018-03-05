var map, infoWindow;
var marker;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    bangalore: {lat: -34.397, lng: 150.644},
    zoom: 15
  });

  infoWindow = new google.maps.InfoWindow;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      //infoWindow.setPosition(pos);
      //infoWindow.setContent('Location found.');
      infoWindow.open(map);
      addMarker(pos, map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  
  } else {
    handleLocationError(false, infoWindow, map.getCenter());
  }

  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
  });

  addMarker(bangalore, map);
}


// Adds a marker to the map.
function addMarker(location, map) {

  if (marker){
    marker.setPosition(location);
  }else{
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

}



function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}