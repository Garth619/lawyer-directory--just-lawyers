var map;function initMap(){var e=new google.maps.StyledMapType([{featureType:"administrative",elementType:"all",stylers:[{visibility:"on"},{hue:"#ff0000"}]},{featureType:"administrative",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"labels.text",stylers:[{color:"#5100ff"}]},{featureType:"administrative",elementType:"labels.text.fill",stylers:[{visibility:"on"},{color:"#18146a"}]},{featureType:"administrative",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#ffffff"}]},{featureType:"landscape",elementType:"all",stylers:[{visibility:"on"},{color:"#d1e8ff"}]},{featureType:"landscape",elementType:"labels",stylers:[{visibility:"on"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"on"},{color:"#76bbfe"}]},{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{visibility:"on"},{color:"#ffffff"}]},{featureType:"road",elementType:"geometry",stylers:[{lightness:50},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{visibility:"on"},{color:"#ffffff"}]}],{name:"Styled Map"});map=new google.maps.Map(document.getElementById("map"),{zoom:9,center:new google.maps.LatLng(33.786594,-118.298662),mapTypeId:"roadmap"});var t=document.createElement("script");t.src="https://att-directory.com/wp-json/new-route/new-posts?_jsonp=eqfeed_callback",document.getElementsByTagName("head")[0].appendChild(t),map.mapTypes.set("styled_map",e),map.setMapTypeId("styled_map")}window.eqfeed_callback=function(e){for(var t=0;t<e.length;t++){var i=e[t].Lat,a=e[t].Lng,l=new google.maps.LatLng(i,a),s,n,r,o=(s=e[t].Crashes)>6,p,y,m,f=s<=3?"https://att-directory.com/wp-content/themes/ilawsuit/images/small-circle.png":s>3&&s<=6?"https://att-directory.com/wp-content/themes/ilawsuit/images/medium-circle.png":"https://att-directory.com/wp-content/themes/ilawsuit/images/large-circle.png",c=e[t].Street1,d;d=""===e[t].Street2?"NA":e[t].Street2;var s=e[t].Crashes,g=e[t].PedestrianCount,u=e[t].PedestrianDeaths,T=new google.maps.Marker({position:l,map:map,icon:f}),v="<div class='inner-content'><h3>Street 1</h3><p>"+c+"</p><h3>Street 2</h3><p>"+d+"</p><h3>Crashes</h3><p>"+s+"</p><h3>Pedestrian Major Injuries</h3><p>"+g+"</p><h3>Pedestrian Deaths</h3><p>"+u+"</p></div>",h=new google.maps.InfoWindow;function b(){null!==T.getAnimation()?T.setAnimation(null):T.setAnimation(google.maps.Animation.BOUNCE)}google.maps.event.addListener(T,"click",function(e){var t=v;return function(){h.setContent(t),h.open(map,e)}}(T))}};