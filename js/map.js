var map;
var drawingManager;
var infoWindow;
var CebLatLng = {lat: 10.3157, lng: 123.8854}; 

var geoJSON_DATA = [];
var markers = [];
var markers_Coordinates = [];

function initMap() {
	
	
	var initZoom = 8;

	// create new instance of google map
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: initZoom,
		center: CebLatLng
	});
	
	// get geoJSON data using jQuery
	$.getJSON("http://localhost/ceburestaurant/map.geojson", function(data) {
		
		geoJSON_DATA.push(data); 
		var features = map.data.addGeoJson(data);
	    for (let i = 0; i < geoJSON_DATA[0].features.length; i++) {
			markers_Coordinates.push(geoJSON_DATA[0].features[i].geometry.coordinates);
		  }

	});
	
	// set options for the drawing manager
	drawingManager = new google.maps.drawing.DrawingManager({
	  drawingMode: google.maps.drawing.OverlayType.MARKER,
	  drawingControl: true,
	  drawingControlOptions: {
		position: google.maps.ControlPosition.TOP_CENTER,
		drawingModes: ['circle','rectangle']
	  },
	  circleOptions: {
		fillColor: '#777',
		fillOpacity: 0.3,
		strokeWeight: 1,
		clickable: true,
		editable: false,
		zIndex: 1
	  },
	  rectangleOptions: {
		fillColor: '#777',
		fillOpacity: 0.3,
		strokeWeight: 1,
		clickable: true,
		editable: false,
		zIndex: 1
	  }
	});
	
	drawingManager.setMap(map);
	drawingManager.setDrawingMode(null);
	
	// instantiate new infoWindow()
	infoWindow = new google.maps.InfoWindow();
	
	google.maps.event.addListener(drawingManager,'overlaycomplete',function(e){
		showInfoWindow(e);
	});
	
	google.maps.event.addListener(drawingManager,'circlecomplete',function(circle){
		google.maps.event.addListener(circle, 'click', function () {
			circle.setOptions({fillOpacity:0, strokeOpacity:0, clickable: false});
		});
	});
	
	google.maps.event.addListener(drawingManager,'rectanglecomplete',function(rectangle){
		google.maps.event.addListener(rectangle, 'click', function () {
			rectangle.setOptions({fillOpacity:0, strokeOpacity:0, clickable: false});
		});
	});

	map.data.addListener('click', function(e) {
		
		// increment visit counter
		incrementMarkerVisits(e);
		
		// assemble properties in a single array
		var info = [e.feature.getProperty('title'), e.feature.getProperty('description'), e.feature.getProperty('speciality'), e.feature.getProperty('restotype'), e.feature.getProperty('visits'),e.feature.getProperty('title')];
		
		showMarkerInfo(e, info);
		
		// show sidebar 2 on top of the main sidebar
		//$('#sidebar_2').attr('style','display: block');
		
	});
	
	map.data.addListener('mouseover', function(e) { var arr = new Array(); arr.push(e.feature.getProperty("title")); setTimeout( showMarkerInfo(e, arr), 1500); });
	map.data.addListener('mouseout', function(e) { setTimeout(infoWindow.close(), 2000); });
	
    // Current Location  
	const GetlocationButton = document.createElement("button");

	GetlocationButton.textContent = "Get Location";
	GetlocationButton.classList.add("custom-map-control-button");
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(GetlocationButton);
	GetlocationButton.addEventListener("click", () => {
		$(".popup-overlay-getdirection").addClass("active");
	
	});
	// Current Location End

	// Current Location  
	const locationButton = document.createElement("button");

	locationButton.textContent = "Current Location";
	locationButton.classList.add("custom-map-control-button");
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
	locationButton.addEventListener("click", () => {
	  // Try HTML5 geolocation.
	  if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
		  (position) => {
			const pos = {
			  lat: position.coords.latitude,
			  lng: position.coords.longitude,
			};
  
			infoWindow.setPosition(pos);
			infoWindow.setContent("Location found.");
			infoWindow.open(map);
			map.setCenter(pos);
		  },
		  () => {
			handleLocationError(true, infoWindow, map.getCenter());
		  }
		);
	  } else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	  }
	});
	// Current Location End
	
    //Cluster Marker
	  // Create an array of alphabetical characters used to label the markers.
	  const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	  // Add some markers to the map.
	  const markers = markers_Coordinates.map((position, i) => {
		const label = labels[i % labels.length];
		const marker = new google.maps.Marker({
		  position,
		  label,
		});
	
		// markers can only be keyboard focusable when they have click listeners
		// open info window when marker is clicked
		marker.addListener("click", () => {
		  infoWindow.setContent(label);
		  infoWindow.open(map, marker);
		});
		return marker;
	  });
	
	  // Add a marker clusterer to manage the markers.
	  //new MarkerClusterer({ markers, map });
	  new markerClusterer.MarkerClusterer({ markers, map });
	  //Cluster Marker End
} // end initMap()


// const locations = [
// 	{ lat: -31.56391, lng: 147.154312 },
// 	{ lat: -33.718234, lng: 150.363181 },
// 	{ lat: -33.727111, lng: 150.371124 },
// 	{ lat: -33.848588, lng: 151.209834 },
// 	{ lat: -33.851702, lng: 151.216968 },
// 	{ lat: -34.671264, lng: 150.863657 },
// 	{ lat: -35.304724, lng: 148.662905 },
// 	{ lat: -36.817685, lng: 175.699196 },
// 	{ lat: -36.828611, lng: 175.790222 },
// 	{ lat: -37.75, lng: 145.116667 },
// 	{ lat: -37.759859, lng: 145.128708 },
// 	{ lat: -37.765015, lng: 145.133858 },
// 	{ lat: -37.770104, lng: 145.143299 },
// 	{ lat: -37.7737, lng: 145.145187 },
// 	{ lat: -37.774785, lng: 145.137978 },
// 	{ lat: -37.819616, lng: 144.968119 },
// 	{ lat: -38.330766, lng: 144.695692 },
// 	{ lat: -39.927193, lng: 175.053218 },
// 	{ lat: -41.330162, lng: 174.865694 },
// 	{ lat: -42.734358, lng: 147.439506 },
// 	{ lat: -42.734358, lng: 147.501315 },
// 	{ lat: -42.735258, lng: 147.438 },
// 	{ lat: -43.999792, lng: 170.463352 },
//   ];
  
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(
	  browserHasGeolocation
		? "Error: The Geolocation service failed."
		: "Error: Your browser doesn't support geolocation."
	);
	infoWindow.open(map);
  }

$(".close").on("click", function() {

	$(".popup-overlay , .popup-content").removeClass("active");
	$(".popup-overlay-getdirection , .popup-content").removeClass("active");
    $(".direction-popup").removeClass("active");
  });
  
//   $(".close-getdirection").on("click", function() {
// 	$(".popup-overlay-getdirection , .popup-content").removeClass("active");
//   }); 
  
  $(".tst").on("click", function() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
		  (position) => {
			const pos = {
			  lat: position.coords.latitude,
			  lng: position.coords.longitude,
			};
  
			infoWindow.setPosition(pos);
			infoWindow.setContent("Location found.");
			infoWindow.open(map);
			map.setCenter(pos);
		  },
		  () => {
			handleLocationError(true, infoWindow, map.getCenter());
		  }
		);
	  } else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	  }
  }); 



function showInfoWindow(e) {

	if (e.type == 'circle') {
		// this is a circle
		;

	} else if (e.type == 'rectangle') {
		// this is a rectangle
		;
	} else {
	
		drawingManager.setDrawingMode(null);
		return false;
	}
	
	var bounds = e.overlay.getBounds();
	var hits = 0;
	
	// iterate through all markers to see if they fall within the area
	$.each(geoJSON_DATA[0].features, function(i,v) {
		latlng = new google.maps.LatLng({lat: v.geometry.coordinates[1], lng: v.geometry.coordinates[0]});
		bounds.contains(latlng) ? hits++ : false;
		
	});

	
	
	// center the infoWindow
	infoWindow.setPosition(bounds.getCenter());
	
	// and set the appropriate content
	infoWindow.setContent('There are <strong>' + hits + '</strong> restaurants found within this geographical area.');
	
	drawingManager.setDrawingMode(null);
	
	// show info
	infoWindow.open(map);

} // end showInfoWindow()

function showMarkerInfo(e,info) {
	
	var details = '';
	
	for (i=0; i<info.length; i++) {
		details += info[i] + '<br />'; 
	}
	
	if (info.length < 4) {	
		infoWindow.setContent("<div style='width:150px; text-align: center;'>" + details +"</div>");
		infoWindow.setPosition(e.feature.getGeometry().get());
		infoWindow.setOptions({pixelOffset: new google.maps.Size(0,-30)});
		infoWindow.open(map); 
	} else {
		//$('.totalvisits').raty('set', { score: 5 });
	
		$('div.content_title').text(info[0]);
		$('div.content_desc').html("<span style=' margin-left: 35px; margin-top: 10px; text-align: center; font-size: 1em;'>speciality: " + info[2] + "</span><hr style='width: 90%; border-color: #999;'/>" + info[1]);
		//$('div.content_other_info').html("<span style='display: block; margin-top: 10px; font-size: 1em;'> " + "<div class='ratingpopup'>" + "</span><span id='totalvisits' style='font-size: 1.2em;'>" + info[4] + "</span><small> visits </small> ");
		$('div.content_other_info').html("<span style='display: block; margin-top: 10px; font-size: 1em;'>" + "<div class='ratinginfo'></div>"+ "</span><div style='padding-top: 10px;'><span id='totalvisits' style='font-size: 1.2em;'>" + info[4] + "</span><small> visits </small></div> ");
	
		$('.ratinginfo').raty({
			readOnly: true, score: info[3]
		});	
	}
	
} // end showMarkerInfo()

function incrementMarkerVisits(e) {
		$(".popup-overlay, .popup-content").addClass("active");
	} // end incrementMarkerVisits()

	// function MarkerVisits(e) {
	// 	e.feature.setProperty('visits', Math.abs(e.feature.getProperty('visits')) + 1);
	// }

	$(".btnVisit").on("click", function() {
	var totalvisits = document.getElementById('totalvisits');
    var number = totalvisits.innerHTML;
    number++;
    totalvisits.innerHTML = number;
});


function applyFilter(haystack, action, type) {
	
	map.data.setStyle(function(feature) {
		if (action == 'clearall') {
			return {visible: true};
		} else {
			
			 if(type == "speciality"){	
				var gtype = feature.getProperty('speciality');
				if ($.inArray(gtype,haystack) != -1)
					return {visible: true };
				else
					return {visible: false };
	
			 } else if (type == "rating"){
				var rtype = feature.getProperty('restotype');
	
				if ($.inArray(rtype,haystack) != -1)
					return {visible: true };
				else
					return {visible: false };
	
			 }  else if (type == "search"){
				var rtype = feature.getProperty('title');
	 
				if ($.inArray(rtype,haystack) != -1)
					return {visible: true };
				else
					return {visible: false };
	
			 }
			
	
		}
			
	});

} // end applyFilter()

// // Get Location


// var directionsDisplay;
// var directionsService = new google.maps.DirectionsService();
// var map;

// var container = document.documentElement,
//         popup = document.querySelector( '.avgrund-popup' ),
//         cover = document.querySelector( '.avgrund-cover' ),
//         currentState = null;

//   addClass( container, 'avgrund-ready' );

//     // Deactivate on ESC
//     function onDocumentKeyUp( event ) {
//         if( event.keyCode === 27 ) {
//             deactivate();
//         }
//     }

//     // Deactivate on click outside
//     function onDocumentClick( event ) {
//         if( event.target === cover ) {
//             deactivate();
//         }
//     }

//     function activate( state ) {
//         document.addEventListener( 'keyup', onDocumentKeyUp, false );
//         document.addEventListener( 'click', onDocumentClick, false );

//         removeClass( popup, currentState );
//         addClass( popup, 'no-transition' );
//         addClass( popup, state );

//         setTimeout( function() {
//             removeClass( popup, 'no-transition' );
//             addClass( container, 'avgrund-active' );
//         }, 0 );

//         currentState = state;
//     }

//     function deactivate() {
//         document.removeEventListener( 'keyup', onDocumentKeyUp, false );
//         document.removeEventListener( 'click', onDocumentClick, false );

//         removeClass( container, 'avgrund-active' );
//     }

//     function disableBlur() {
//         addClass( document.documentElement, 'no-blur' );
//     }

//     function addClass( element, name ) {
//         element.className = element.className.replace( /\s+$/gi, '' ) + ' ' + name;
//     }

//     function removeClass( element, name ) {
//         element.className = element.className.replace( name, '' );
//     }

//     window.avgrund = {
//         activate: activate,
//         deactivate: deactivate,
//         disableBlur: disableBlur
//     }
  
// 	$('#btn-g').on('click', function(e){
// 		var start = document.getElementById('start').value,
// 			end = document.getElementById('end').value;
// 		e.preventDefault();
// 		request = {
// 			origin:start,
// 			destination:end,
// 			travelMode: google.maps.TravelMode.DRIVING
// 		};

// 		directionsService.route(request, function(response, status) {
// 		  if (status == google.maps.DirectionsStatus.OK) {
// 			directionsDisplay.setDirections(response);
// 		  } else {
// 			alert("Sorry, no driving route can be found between these locations");
// 		  }
// 		});
// 	  });



// // Get Location End
var ctx = document.getElementById("ChartWeeklyEarning").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ["AA BBQ","Abaca Baking Company","Ilaputi","Cafe Marco","Pizzera Michelangelo","Vikings Luxury Buffet"],
		datasets: [{
			label: 'Monday',
			backgroundColor: "#caf270",
			data: [11000,38000,25000,10000,45671,12346,15778,14567, 49999],
		}, {
			label: 'Tuesday',
			backgroundColor: "#45c490",
			data: [31000,58000,65000,15000,35671,72346,45778,14567, 44999],
		}, {
			label: 'Wednesday',
			backgroundColor: "#008d93",
			data: [11000,78000,45000,12300,46671,32346,95778,99567, 11999],
		}, {
			label: 'Thursday',
			backgroundColor: "#2e5468",
			data: [35000,38000,45000,70000,45671,12346,15778,14567, 39999],
		}, {
			label: 'Friday',
			backgroundColor: "blue",
		    data: [11000,38000,25000,10000,45671,12346,15778,14567, 39999],
		}, {
			label: 'Saturday',
			backgroundColor: "red",
			data: [11000,38000,25000,10000,45671,12346,15778,14567, 49999],
		}, {
			label: 'Sunday',
			backgroundColor: "orange",
			data: [12, 59, 5, 56, 58, 12, 59, 12, 74],
		}],
	},
options: {
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
      },
    },
    scales: {
      xAxes: [{
        stacked: true,
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          beginAtZero: true,
        },
        type: 'linear',
      }]
    },
		responsive: true,
		maintainAspectRatio: false,
		legend: { position: 'bottom' },
	}
});

// Daily Top Visitor Pie Chart
var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;

var oilData = {
    labels: [
        "AA BBQ",
        "Abaca Baking Company",
		"Ilaputi",
		"Cafe Marco",
		"Pizzeria Michelangelo",
		"Vikings Luxury Buffet"
    ],
    datasets: [
        {
            data: [56,76,67,119,77,44],
			options: {
				responsive: true,
				legend: {
					position: 'bottom',
					labels: {
						fontColor: "white",
						boxWidth: 20,
						padding: 20
					}
				}
			},
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ],
		
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData,
  options: {
	responsive: true,
	legend: {
		position: 'bottom',
		labels: {
			boxWidth: 30,
			padding: 10
		}
	}
}
});
