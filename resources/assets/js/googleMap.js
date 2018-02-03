$(function() {

  var city = $(".placeload").text();
  city = city.trim()

  if (city != '') {
    $.ajax({
      type: "GET",
      url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + city + "&key=AIzaSyB02GTmRhfs86fq3o61rX4Rst2rMjF0e4A",
      dataType: 'json',
      success: function(data) {
        console.log("LatLng");
        console.log(data.results[0].geometry.location.lat);
        console.log(data.results[0].geometry.location.lng);

        var lat = data.results[0].geometry.location.lat;

        var lng = data.results[0].geometry.location.lng


        function initMap() {


          // var location = new google.maps.LatLng(24.890150,91.860748);
          var location = new google.maps.LatLng(lat, lng);

          var mapCanvas = document.getElementById('map');
          var mapOptions = {
            center: location,
            zoom: 16,
            // panControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map = new google.maps.Map(mapCanvas, mapOptions);

          // var markerImage = "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m";

          var marker = new google.maps.Marker({
            position: location,
            map: map
            // icon: markerImage
          });

          var styles = [{
            "featureType": "landscape",
            "stylers": [{
              "saturation": -100
            }, {
              "lightness": 65
            }, {
              "visibility": "on"
            }]
          }, {
            "featureType": "poi",
            "stylers": [{
              "saturation": -100
            }, {
              "lightness": 51
            }, {
              "visibility": "simplified"
            }]
          }, {
            "featureType": "road.highway",
            "stylers": [{
              "saturation": -100
            }, {
              "visibility": "simplified"
            }]
          }, {
            "featureType": "road.arterial",
            "stylers": [{
              "saturation": -100
            }, {
              "lightness": 30
            }, {
              "visibility": "on"
            }]
          }, {
            "featureType": "road.local",
            "stylers": [{
              "saturation": -100
            }, {
              "lightness": 40
            }, {
              "visibility": "on"
            }]
          }, {
            "featureType": "transit",
            "stylers": [{
              "saturation": -100
            }, {
              "visibility": "simplified"
            }]
          }, {
            "featureType": "administrative.province",
            "stylers": [{
              "visibility": "on"
            }]
          }, {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [{
              "visibility": "on"
            }, {
              "lightness": -25
            }, {
              "saturation": -100
            }]
          }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "hue": "#ffff00"
            }, {
              "lightness": -25
            }, {
              "saturation": -97
            }]
          }];

          //  map.set('styles', styles);
        }

        google.maps.event.addDomListener(window, 'load', initMap);
        //google.maps.event.addDomListener(window, 'load', initatmMap);


      },
      error: function(error) {
        console.log(error);
      }
    });



  }
});
