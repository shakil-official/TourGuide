function yScrollHandler() {
  var win = document.getElementById("peekaboo");
  if (win != null) {
    console.log(window.pageYOffset + "  " + window.innerHeight);

    if (window.pageYOffset > 530) {
      // if((window.pageYOffset + window.innerHeight) >= document.body.offsetHeight){
      //win.style.webkitTransition = "right 0.7s ease-in-out 0s";
      win.style.transition = "left 0.7s ease-in-out 0s";
      win.style.left = "0px";
    } else {
      win.style.transition = "left 0.7s ease-in-out 0s";
      win.style.left = "-452px";
    }

  }

}
try {

  window.onscroll = yScrollHandler;
} catch (e) {
  console.log(e);
}


$(function() {
  var availableRestauants = [
    "ActionScript"
  ];

  $.ajax({
    type: "GET",
    url: "http://localhost:8000/RestauantSearchGet",

    success: function(data) {

      console.log(data.restaurant);
      if (data != '') {

        var ArrayCounter = 0;

        for (var i = 0; i < data.restaurant.length; i++) {

          availableRestauants[i] = data.restaurant[i].name;



        }
      }
    },
    error: function(error) {
      console.log(error);
    }
  });
  /* End here */

  $("#availableRestauants").autocomplete({
    source: availableRestauants
  });
});




$(function() {
  var availableTags = [
    "ActionScript"
  ];

  $.ajax({
    type: "GET",
    url: "http://localhost:8000/searchGet",

    success: function(data) {

      if (data != '') {

        var ArrayCounter = 0;

        for (var i = 0; i < data.search.length; i++) {

          availableTags[ArrayCounter] = data.search[i].countryName;
          availableTags[ArrayCounter + 1] = data.search[i].divisionName;
          availableTags[ArrayCounter + 2] = data.search[i].districtName;
          availableTags[ArrayCounter + 3] = data.search[i].placeName;
          ArrayCounter = ArrayCounter + 4;

        }


      }


    },
    error: function(error) {
      console.log(error);
    }
  });
  /* End here */

  $("#tags").autocomplete({
    source: availableTags
  });
});





/* Hotel */
$(function() {
  var availableHotels = [
    "ActionScript"
  ];

  $.ajax({
    type: "GET",
    url: "http://localhost:8000/HotelSearchGet",

    success: function(data) {



      if (data != '') {

        var HotelCounter = 0;

        for (var i = 0; i < data.hotel.length; i++) {
          console.log(data.hotel[i].hotelName);

          availableHotels[i] = data.hotel[i].hotelName;



        }
      }
    },
    error: function(error) {
      console.log(error);
    }
  });
  /* End here */

  $("#availablehotels").autocomplete({
    source: availableHotels
  });
});

/* Place Search */
$(function() {
  var availablePlace = [
    "No Place In Database"
  ];

  $.ajax({
    type: "GET",
    url: "http://localhost:8000/placeSearchGet",

    success: function(data) {
      if (data != '') {

        for (var i = 0; i < data.place.length; i++) {


          availablePlace[i] = data.place[i].placeName;


        }
      }
    },
    error: function(error) {
      console.log(error);
    }
  });
  /* End here */

  $("#availablePlace").autocomplete({
    source: availablePlace
  });
});
