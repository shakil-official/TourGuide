// onclick="switchStatus({!! $restaurant[$i]->id !!});"
// window.onload="weather({!! $place->placeName !!});"


$(document).ready(function() {

  function weather() {


    var city = $(".DistrictWeather").text();
    var token = $('#token').val();

    city = city.trim();
    console.log(city);
    if (city != '') {
      console.log("city not null");

      var url = 'http://api.apixu.com/v1/forecast.json?key=866243a0b5014c69840143750171612&q=' + city + '&days=3';
      try {
        $.ajax({
          type: "GET",
          url: url,
          dataType: 'json',
          success: function(data) {

            $(".weather").html("<img src=" + data.current.condition.icon + ">");


            $(".weather-information").html("<span style='border:  1px solid blue; padding:  1px 7px; margin: 0px 3px;'>Cloud : " + data.current.cloud + " </span><span style='border:  1px solid blue; padding:  1px 7px; margin: 0px 3px;'>Humidity : " + data.current.humidity + " </span><span style='border:  1px solid blue; padding:  1px 7px; margin: 0px 3px;'> " + data.current.temp_c + "&nbsp; C </span> <span style='border:  1px solid blue; padding:  1px 7px; margin: 0px 3px;'>" + data.current.temp_f + "&nbsp; F</span><span style='border:1px solid blue; padding:  1px 7px; margin: 0px 3px;'>" + data.current.condition.text + " </span>");


            $(".weather-celsius").html("<span class='text-right label label-default' style='margin-right: 2px; font-size: 1.17em; color: #ff4b4c; background: #ffffff; border: 1px solid yellow;'> " + data.current.temp_c + "&nbsp; C </span><span class='text-right label label-default' style='margin-right: 2px; font-size: 1.17em; color: #ff4b4c; background: #ffffff; border: 1px solid yellow;'>" + data.current.condition.text + "&nbsp; Day </span>");


          },
          error: function(error) {
            console.log("weather .....");
          }
        });

      } catch (e) {
        console.log("Nothing .....");
      }

    }

  }


  window.onload = weather;


});
