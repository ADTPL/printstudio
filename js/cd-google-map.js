jQuery(document).ready(function($){
	//set your google maps parameters
	var latitude = 40.785029,
		longitude = -73.845871,
		map_zoom = 11;

	//google map custom marker icon - .png fallback for IE11
	var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
	var marker_url = ( is_internetExplorer11 ) ? 'img/map-controllers/cd-icon-location.png' : 'img/map-controllers/cd-icon-location.svg';
		
	//define the basic color of your map, plus a value for saturation and brightness
	var	main_color = '#000000',
		saturation_value= -100,
		brightness_value= 0;

	//we define here the style of the map
	var style= [{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#034b35"},{"weight":"0.79"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","elementType":"geometry.fill","stylers":[{"color":"#f8c6ff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"saturation":"32"},{"lightness":"-23"},{"gamma":"1.00"},{"weight":"1.00"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"color":"#c6a67d"}]},{"featureType":"poi.sports_complex","elementType":"geometry.fill","stylers":[{"color":"#fcd41c"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#3d3d3d"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#313131"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#504f4f"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#585858"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#ff0000"},{"saturation":"0"},{"lightness":"26"},{"gamma":"1.0"}]},{"featureType":"transit.line","elementType":"geometry.stroke","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#4d97c7"}]}];
		
	//set google map options
	var map_options = {
      	center: new google.maps.LatLng(latitude, longitude),
      	zoom: map_zoom,
      	panControl: false,
      	zoomControl: false,
      	mapTypeControl: true,
      	streetViewControl: false,
      	mapTypeId: google.maps.MapTypeId.ROADMAP,
      	scrollwheel: false,
      	styles: style,
    }
    //inizialize the map
	var map = new google.maps.Map(document.getElementById('google-container'), map_options);
	//add a custom marker to the map				
	var marker = new google.maps.Marker({
	  	position: new google.maps.LatLng(latitude, longitude),
	    map: map,
	    visible: true,
	 	icon: marker_url,
	});

	//add custom buttons for the zoom-in/zoom-out on the map
	function CustomZoomControl(controlDiv, map) {
		//grap the zoom elements from the DOM and insert them in the map 
	  	var controlUIzoomIn= document.getElementById('cd-zoom-in'),
	  		controlUIzoomOut= document.getElementById('cd-zoom-out');
	  	controlDiv.appendChild(controlUIzoomIn);
	  	controlDiv.appendChild(controlUIzoomOut);

		// Setup the click event listeners and zoom-in or out according to the clicked element
		google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
		    map.setZoom(map.getZoom()+1)
		});
		google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
		    map.setZoom(map.getZoom()-1)
		});
	}

	var zoomControlDiv = document.createElement('div');
 	var zoomControl = new CustomZoomControl(zoomControlDiv, map);

  	//insert the zoom div on the top left of the map
  	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
});

  