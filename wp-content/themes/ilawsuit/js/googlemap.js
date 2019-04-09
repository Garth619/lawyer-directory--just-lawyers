var map;

function initMap() {

    var styledMapType = new google.maps.StyledMapType(
        [{
            "featureType": "administrative",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }, {
                "hue": "#ff0000"
            }]
        }, {
            "featureType": "administrative",
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "administrative",
            "elementType": "labels.text",
            "stylers": [{
                "color": "#5100ff"
            }]
        }, {
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#18146a"
            }]
        }, {
            "featureType": "administrative",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }]
        }, {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#d1e8ff"
            }]
        }, {
            "featureType": "landscape",
            "elementType": "labels",
            "stylers": [{
                "visibility": "on"
            }]
        }, {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#76bbfe"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }]
        }, {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "lightness": 50
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#ffffff"
            }]
        }], {
            name: 'Styled Map'
        });

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: new google.maps.LatLng(33.786594,-118.298662),
        mapTypeId: 'roadmap'
    });


    var script = document.createElement('script');
    //script.src = 'https://att-directory.com/wp-content/themes/ilawsuit/js/data.js';
    script.src = 'https://att-directory.com/wp-json/new-route/new-posts?_jsonp=eqfeed_callback';
    document.getElementsByTagName('head')[0].appendChild(script);

    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
    
}

// Loop through the results array and place a marker for each
// set of coordinates.
window.eqfeed_callback = function(myJsonFile) {
    for (var i = 0; i < myJsonFile.length; i++) {


        //loops through the longitude and latitude data
        var lat = myJsonFile[i].Lat;
        var long = myJsonFile[i].Lng;

        var latLng = new google.maps.LatLng(lat, long);
        
        var crashes = myJsonFile[i].Crashes;

        var threeOrLess = crashes <= 3;
        var fourToSix = crashes > 3 && crashes <= 6;
        var greaterThanSix = crashes > 6;

				//console.log(fourToSix);

        var smallCircleImg = 'https://att-directory.com/wp-content/themes/ilawsuit/images/small-circle.png';
        var mediumCircleImg = 'https://att-directory.com/wp-content/themes/ilawsuit/images/medium-circle.png';
        var largeCircleImg = 'https://att-directory.com/wp-content/themes/ilawsuit/images/large-circle.png';

        var displayImg =
            threeOrLess ? smallCircleImg :
            fourToSix ? mediumCircleImg :
            largeCircleImg;

        var streetOne = myJsonFile[i].Street1;
        var streetTwo;
        
        if ( myJsonFile[i].Street2 === "" ) {
        	streetTwo = "NA"
        } else {
        	streetTwo = myJsonFile[i].Street2
        }
        
        var crashes = myJsonFile[i].Crashes;
        var pedestrianCount = myJsonFile[i].PedestrianCount;
        var pedestrianDeaths = myJsonFile[i].PedestrianDeaths;

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: displayImg
        });

        var contentString = "<div class='inner-content'><h3>Street 1</h3><p>"+streetOne+"</p><h3>Street 2</h3><p>"+streetTwo+"</p><h3>Crashes</h3><p>"+crashes+"</p><h3>Pedestrian Major Injuries</h3><p>"+pedestrianCount+"</p><h3>Pedestrian Deaths</h3><p>"+pedestrianDeaths+"</p></div>";

        var infoWindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', (function(marker) {
            var content = contentString;
            return function() {
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
                toggleBounce;
            }
        })(marker));

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

    }
}









































