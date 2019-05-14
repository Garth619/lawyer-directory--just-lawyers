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
        
        
		var lat_number = parseFloat(my_mapdata.map_current_city_latitude);
    var long_number = parseFloat(my_mapdata.map_current_city_longitude);
	

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(lat_number,long_number),
        mapTypeId: 'roadmap'
    });
	
		
		var script = document.createElement('script');
		
		script.src = '' +my_mapdata.current_domain+ '/wp-json/mapping/v1/location/'+my_mapdata.map_current_city+'/'+my_mapdata.map_current_pa+'/'+my_mapdata.map_paged+'?_jsonp=eqfeed_callback';
    
		//console.log(script.src);
    
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
        
      

        var featuredPost = myJsonFile[i].Featured_lawyer;

       
        var circleImg = ''+my_mapdata.current_domain+'/wp-content/themes/ilawsuit/images/red-circle.svg';
        var featuredImg = ''+my_mapdata.current_domain+'/wp-content/themes/ilawsuit/images/map_icon.svg';
				
				
				var featuredProfileimg = myJsonFile[i].Featured_post_image;
        
        var displayImg = featuredPost === true ? featuredImg : circleImg;
	        		
	        		
				var lawyerTitle = myJsonFile[i].Title;
        var address = myJsonFile[i].Address;
        var phone = myJsonFile[i].Phone;
        var tel_href = myJsonFile[i].Tel_href;
        var viewprofile = myJsonFile[i].Permalink;
        

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: {url:displayImg, scaledSize: new google.maps.Size(35, 35)}
        });

        var contentString = "<div class='map_tooltip'><h3>"+lawyerTitle+"</h3><p><a href=''>"+address+"</a></p><p><a href='tel:"+tel_href+"'>"+phone+"</a></p><p><a class='map_view_profile' href='"+viewprofile+"'>View Profile</a></div>";

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





