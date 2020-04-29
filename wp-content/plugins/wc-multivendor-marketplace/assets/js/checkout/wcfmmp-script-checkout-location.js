jQuery(document).ready( function($) {
	$wcfmmp_user_location_lat = jQuery("#wcfmmp_user_location_lat").val();
	$wcfmmp_user_location_lng = jQuery("#wcfmmp_user_location_lng").val();
  function initialize() {
  	
  	if( wcfm_maps.lib == 'google' ) {
			var latlng = new google.maps.LatLng( $wcfmmp_user_location_lat, $wcfmmp_user_location_lng );
			var map = new google.maps.Map(document.getElementById("wcfmmp-user-locaton-map"), {
					center: latlng,
					blur : true,
					zoom: 15
			});
			var marker = new google.maps.Marker({
					map: map,
					position: latlng,
					draggable: true,
					anchorPoint: new google.maps.Point(0, -29)
			});
		
			var wcfmmp_user_location_input = document.getElementById("wcfmmp_user_location");
			//map.controls[google.maps.ControlPosition.TOP_LEFT].push(wcfmmp_user_location_input);
			var geocoder = new google.maps.Geocoder();
			var autocomplete = new google.maps.places.Autocomplete(wcfmmp_user_location_input);
			autocomplete.bindTo("bounds", map);
			var infowindow = new google.maps.InfoWindow();   
		
			autocomplete.addListener("place_changed", function() {
				infowindow.close();
				marker.setVisible(false);
				var place = autocomplete.getPlace();
				if (!place.geometry) {
					window.alert("Autocomplete returned place contains no geometry");
					return;
				}
	
				// If the place has a geometry, then present it on a map.
				if (place.geometry.viewport) {
					map.fitBounds(place.geometry.viewport);
				} else {
					map.setCenter(place.geometry.location);
					map.setZoom(17);
				}
	
				marker.setPosition(place.geometry.location);
				marker.setVisible(true);
	
				bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(), false);
				infowindow.setContent(place.formatted_address);
				infowindow.open(map, marker);
				showTooltip(infowindow,marker,place.formatted_address);
		
			});
			google.maps.event.addListener(marker, "dragend", function() {
				geocoder.geocode({"latLng": marker.getPosition()}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (results[0]) {        
							bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng(), true);
							infowindow.setContent(results[0].formatted_address);
							infowindow.open(map, marker);
							showTooltip(infowindow,marker,results[0].formatted_address);
						}
					}
				});
			});
		} else {
			$('#wcfmmp_user_location').replaceWith( '<div id="leaflet_wcfmmp_user_location"></div><input type="hidden" class="wcfm_custom_hide" name="wcfmmp_user_location" id="wcfmmp_user_location" />' );
			
			if( $wcfmmp_user_location_lat && $wcfmmp_user_location_lng ) {
				var map = new L.Map( 'wcfmmp-user-locaton-map', {zoom: 13, center: new L.latLng([$wcfmmp_user_location_lat, $wcfmmp_user_location_lng]) });
				map.addLayer(new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer
				var map_marker = L.marker([$wcfmmp_user_location_lat, $wcfmmp_user_location_lng], {draggable: 'true'}).addTo(map).on('click', function() {
					window.open( 'https://www.openstreetmap.org/?mlat='+$wcfmmp_user_location_lat+'&mlon='+$wcfmmp_user_location_lng+'#map=14/'+$wcfmmp_user_location_lat+'/'+$wcfmmp_user_location_lng, '_blank');
				});
			} else {
				var map = new L.Map( 'wcfmmp-user-locaton-map', {zoom: 13, center: new L.latLng([41.575730,13.002411]) });
				map.addLayer(new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer
				var map_marker = L.marker([0,0], {draggable: 'true'});
			}
			
			map_marker.on('dragend', function(event) {
				var position = map_marker.getLatLng();
				
				var jsonQuery = "http://nominatim.openstreetmap.org/reverse?format=json&lat=" + position.lat + "&lon=" + position.lng + "&zoom=18&addressdetails=1";
    		
				var address = '';
				
    		$.getJSON(jsonQuery).done( function (result_data) {
    			var road;
    			if(result_data.address.road) {
    				address += result_data.address.road + ", ";
    			} else if (result_data.address.pedestrian) {
    				address += result_data.address.pedestrian + ", ";
    			} else {
    				address = "";
    			}
    			
    			if( result_data.address.house_number ) address += result_data.address.house_number + ", ";
    			if( result_data.address.city_district ) address += result_data.address.city_district + ", ";
    			if( result_data.address.city ) address += result_data.address.city + ", ";
    			if( result_data.address.postcode ) address += result_data.address.postcode;
    			
    			bindDataToForm( address, position.lat, position.lng, true );
    			
    			var popup_text = address;

    			map_marker.bindPopup(popup_text).openPopup();
    		});
			});
		
			var searchControl = new L.Control.Search({
														container: 'leaflet_wcfmmp_user_location',
														url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
														jsonpParam: 'json_callback',
														propertyName: 'display_name',
														propertyLoc: ['lat','lon'],
														marker: map_marker,
														moveToLocation: function(latlng, title, map) {
															bindDataToForm( title, latlng.lat, latlng.lng, true );
															map.setView(latlng, 13); // access the zoom
														},
														//autoCollapse: true,
														initial: false,
														collapsed:false,
														autoType: false,
														minLength: 2
													});
			
			map.addControl( searchControl );  //inizialize search control
			
			//$('#leaflet_wcfmmp_user_location').find('.search-input').val($('#store_location').val());
			
			setTimeout(function() {
				map.invalidateSize();
			}, 3000 );
		}
	}
	
	function bindDataToForm(address,lat,lng, find_field_refresh) {
		if( find_field_refresh ) {
			if( wcfm_maps.lib == 'google' ) {
			 document.getElementById("wcfmmp_user_location").value = address;
			} else {
				$('#wcfmmp_user_location').val( address );
				$("#leaflet_wcfmmp_user_location").find('.search-input').val( address );
			}
		}
		//document.getElementById("store_location").value = address;
		document.getElementById("wcfmmp_user_location_lat").value = lat;
		document.getElementById("wcfmmp_user_location_lng").value = lng;
		
		$( document.body ).trigger( 'update_checkout' );
	}
	function showTooltip(infowindow,marker,address){
	 google.maps.event.addListener(marker, "click", function() { 
				infowindow.setContent(address);
				infowindow.open(map, marker);
		});
	}
	
	if( jQuery("#wcfmmp_user_location_lat").length > 0 ) {
		setTimeout( function() {
			initialize();
		}, 1000 );
	}
});