var locationPins = [];
var locationTitle = [];
var locationContent = [];

function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: {lat: 55, lng: -1.6},
        mapTypeId: 'roadmap'
    });

    setLocations();

    setMarkers(map);
}

function setLocations() {
    for (var i = 0; i < pins.length; i++) {

        var location = pins[i];

        locationPins.push({lat: parseFloat(location[1]), lng: parseFloat(location[2])});
        locationTitle.push(location[0]);

        var content = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h4 id="firstHeading" class="firstHeading">' + location[0] + '</h4>'+
            '<div id="bodyContent">'+
            '<p>Open: <b>' + location[3] + '</b></p>' +
            '</div>'+
            '</div>';

        locationContent.push(content);
    }
}

function setMarkers(map) {

    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var markers = locationPins.map(function(location, i) {
        var marker = new google.maps.Marker({
            position: locationPins[i],
            map: map,
            title: locationTitle[i],
            zIndex: i
        });

        var infowindow = new google.maps.InfoWindow();

        var content = locationContent[i];
        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
            return function() {
                infowindow.setContent(content);
                infowindow.open(map,marker);
            };
        })(marker,content,infowindow));

        return marker;
    });

}