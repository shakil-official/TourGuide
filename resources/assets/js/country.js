/*
*
    ============================  Jquery Code in below =====================
*
*/

$.ajaxSetup({
  beforeSend: function(xhr, type) {
    if (!type.crossDomain) {
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    }
  },
});




//==========================



function switchStatus(id) {
  var i = id;


  $.ajax({
    type: "POST",
    url: "http://localhost:8000/restaurant/" + i + "/status",
    data: {
      id: i,
    },
    success: function(data) {
      console.log("#switch" + i);

      if (data.status == 1) {
        //alert(data.status);
        $("#switch" + i).removeClass("fa-toggle-off");
        $("#switch" + i).addClass("fa-toggle-on");
        //  e.stopPropagation();
      } else {
        $("#switch" + i).removeClass("fa-toggle-on");
        $("#switch" + i).addClass("fa-toggle-off");
        //  e.stopPropagation();
      }

    },
    error: function(error) {
      console.log(error);
    }
  });


}


$(document).ready(function() {






  $("#hearts-existing").click(function() {
    var rating = $(this).find('.glyphicon-star-empty').length;
    rating = rating - 5
    rating = Math.abs(rating);
    user_id = $(this).attr("data-user");
    post_id = $(this).attr("data-id");
    //alert(rating + " " + user_id + " " +post_id);
    $.ajax({
      type: "POST",
      url: 'http://localhost:8000/rating',
      data: {
        id: user_id,
        rating: rating,
        visitinformation_id: post_id,
      },
      success: function(data) {
        console.log(data);
        console.log("rating");
        if (data.auth != null) {
          $('#ratingmodel').modal('show');
        } else {
          $('.starrr').data('data-rating', data.no);
          window.location = "http://localhost:8000/singlepage/" + post_id;
          $(".media-heading").load("http://localhost:8000/singlepage/" + post_id);
        }

      },
      error: function(error) {
        console.log(error);
      }
    });
  });


  slide();

  function slide() {
    $("#flexiselDemo3").flexisel({
      visibleItems: 3,
      itemsToScroll: 1,
      autoPlay: {
        enable: true,
        interval: 5000,
        pauseOnHover: true
      }
    });
  }



  // ------------------------------------------------wait




  //  showImage();
  showPlace();


  $('.js-example-basic-multiple').select2();
  //-------------------------------------------------------------

  // global variable here
  $("#restaurantSearchResultSow").hide();
  $(".part-one").show();
  $(".other-btn-box").hide();
  $(".select-body-country").hide();
  $(".select-body-division").hide();
  $(".select-body-district").hide();
  $(".select-body-place").hide();
  $(".show-edit-division").hide();
  $(".show-edit-country").hide();
  $(".divisionshowCreate").hide();
  $(".show-edit-district").hide();
  $(".PlacehowCreate").hide();
  $(".show-edit-Place").hide();

  //$(".guide").animate({top: '600px'}, "slow").slideToggle(2000);
  $(".guide").delay(62000).animate({
    left: '851px'
  }).css({
    "border-bottom-right-radius": "27px",
    "background-color": "tomato"
  });
  var on = true;
  var countrycreateOnBox = true;

  $(".showCreate").hide();

  $("#countryCreateBox").click(function() {

    if (countrycreateOnBox == true) {
      $(".showCreate").show().slideDown(2000);
      countrycreateOnBox = false;

    } else {
      $(".showCreate").hide().slideUp(2000);
      countrycreateOnBox = true;
    }


  });


  /*--------------------  ----------------------------------------------*/

  var PlaceCreateVar = true;

  $("#PlaceCreateBox").click(function() {



    if (PlaceCreateVar == true) {
      $(".PlacehowCreate").show().slideDown(2000);
      PlaceCreateVar = false;

    } else {
      $(".PlacehowCreate").hide().slideUp(2000);
      PlaceCreateVar = true;
    }


  });


  /* ---------------------------------------------------------------------*/
  districtCreateBox = false;

  $("#districtCreateBox").click(function() {
    districtCreateBox == true;
    if (districtCreateBox == true) {
      $(".districtshowCreate").show().slideDown(2000);
      districtCreateBox = false;

    } else {
      $(".districtshowCreate").hide().slideUp(2000);
      districtCreateBox = true;
    }


  });

  $(".btn-one").click(function() {
    $(".part-one").show().slideUp(2000);

  });



  $(".btn-custom-box").click(function() {
    $(".select-body-tourGuide").show();
    if (on == true) {
      $(".other-btn-box").show().animate({
        left: '100px'
      }, "slow");
      $(".headline-of-page").html("Please select any option");
      on = false;
    } else {
      $(".other-btn-box").hide().animate({
        left: '100px'
      }, "slow");
      $(".headline-of-page").html("Tour Guide");
      $(".select-body-country").hide();
      $(".select-body-division").hide();
      $(".select-body-district").hide();
      $(".select-body-place").hide();
      on = true;
    }
  });



  $(".country-option").click(function() {
    showCountry();
    $(".select-body-country").show().slideDown("slow");
    $(".select-body-division").hide();
    $(".select-body-district").hide();
    $(".select-body-place").hide();
    $(".select-body-tourGuide").hide();
    $(".divisionshowCreate").hide();
    $(".headline-of-page").html("Country");
  });


  $(".division-option").click(function() {
    showCountry();
    showDivision();
    $(".select-body-division").show().slideDown("slow");
    $(".select-body-country").hide();
    $(".select-body-district").hide();
    $(".select-body-place").hide();
    $(".select-body-tourGuide").hide();
    $(".divisionshowCreate").hide();
    $(".headline-of-page").html("Division");
  });


  $(".district-option").click(function() {
    showDivision();
    showDistrict();
    $(".select-body-district").show().slideDown("slow");
    $(".districtshowCreate").hide();
    $(".select-body-country").hide();
    $(".select-body-division").hide();
    $(".select-body-place").hide();
    $(".select-body-tourGuide").hide();
    $(".divisionshowCreate").hide();
    $(".headline-of-page").html("District");

  });


  /* --------------------------  Place option  ---------------------------------*/

  $(".place-option").click(function() {
    //  $(".placeShowBox").show();
    $(".select-body-place").show().slideDown("slow");
    $(".select-body-country").hide();
    $(".select-body-division").hide();
    $(".select-body-district").hide();
    $(".select-body-tourGuide").hide();
    $(".divisionshowCreate").hide();
    $(".headline-of-page").html("Place");
    showDistrict();
    showPlace();
  });


  $(".btn-edit-box").click(function() {
    alert("hhhhhhhhhhhhhhh");

    $(".show-edit-country").show().slideDown("slow");
    $(".header-box").hide();
  });



  /* ------------------------------- division Design Start  ------------------------------------  */

  var divisionshowCreate = false;

  $("#divisionCreateBtn").click(function() {
    if (divisionshowCreate == true) {
      $(".divisionshowCreate").show().slideDown(2000);
      divisionshowCreate = false;
    } else {
      $(".divisionshowCreate").hide().slideUp(2000);
      divisionshowCreate = true;
    }
  });

  /* -------------------------------------           division Design end  --------------------------------*/



  var countryEditName = "countryEditName";

  $("#countryEdit").submit(function() {

    var countryEditName = $('#countryEditName').val();
    var countryId = $('.idofEdit').val();



    if (countryEditName == '') {
      console.log(" empty ");

    } else {
      var url = "http://localhost:8000/post/" + countryId;


      $.ajax({
        type: "POST",
        url: url,

        data: {
          id: countryId,
          countryName: countryEditName,
        },
        success: function(data) {


          console.log(data);


          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
            $(".show-edit-country").hide().slideUp("slow");

          }


          showDivision();
          showCountry();


        },
        error: function(error) {
          console.log(error);
        }
      });
      return false;
    }
  });




  function Edit(id) {
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/edit/' + id,
      success: function(data) {
        var edited = "<input type=text id='" + countryEditName + "' value='" + data.country.countryName + "' data-i='" + id + "' class='form-control'> <br/> <input type='hidden' value='" + data.country.id + "' name='id' class='idofEdit'>";

        $('.countryEdit-box').html(edited + "</br>");

      }
    }, "json");

  }



  function showCountry() {


    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/CountryController/get',
      success: function(data) {

        $("tr").remove();

        $(".optionCountry").remove();


        var i, x = "",
          y = "";

        for (i in data.task) {
          x += data.task[i].countryName + " ";
          y += data.task[i].id + " ";

          if (data.task[i].id > data.task[i].id - 1) {
            $('#countryTbody').append("<tr id ='countryTR'><td width='10px'>" + data.task[i].id + "</td> <td> " + data.task[i].countryName + "</td><td width='10px'><button type='button' name = 'button' class='btn btn-primary btn-edit-box-" + data.task[i].id + "'  data-id='" + data.task[i].id + "'>Edit</button></td><td width='10px'><button type='button' class='btn  btn-danger'  id='" + data.task[i].id + "' >Delete</button></td></tr>");

            $('.countrySelect').append("<option class='optionCountry'>" + data.task[i].countryName + "</option>");

          }
          // <td width='10px'><button type='button' name = 'button' class='btn  btn-danger  '  Deletedata-id='" + data.task[i].id + "'>Edit</button> </td>
          // <td width='10px'><a href='#' class='btn btn-danger btn-edit-box-' Deletedata-id='" + data.task[i].id + "'>Delete</a></td>

          // if you click any edit button you can find the this post id
          $(".btn-edit-box-" + data.task[i].id).click(function() {


            var aa = $(this).attr("data-id");


            $(".show-edit-country").show().slideDown("slow");

            Edit(aa);
          });

          // -----------------delete --------------------------

          $("#" + data.task[i].id).click(function() {
            var deleteCountry = $(this).attr("id");

            $.confirm({
              icon: 'fa fa-spinner fa-spin',
              title: 'What is up?',
              content: 'Here goes a little content',
              type: 'green',

              buttons: {
                ok: {
                  text: "ok!",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function() {
                    $.ajax({
                      type: "GET",
                      url: 'http://localhost:8000/CountryDeleted/' + deleteCountry,
                      data: {
                        id: deleteCountry,
                      },
                      success: function(data) {
                        if (data.delete != null) {
                          toastr.success(data.delete);
                        } else {
                          toastr.error(data.exception);
                        }
                        showCountry();
                      },
                      error: function(error) {
                        console.log(error);
                      }
                    });

                  }
                },
                cancel: function() {
                  console.log('the user clicked cancel');
                }
              }

            });
          });
          // -------------------- delete ----------------------------
        }
      }
    }, "json");
  }


  //============================================


  $('#register').submit(function() {

    var fName = $('#createCountryName').val();
    var token = $('#_token').val();

    if ($('#createCountryName').val() == '') {
      toastr.success("Empty");
    } else {
      var url = "http://localhost:8000/CountryController/countryCreate";

      $.ajax({
        type: "POST",
        url: url,
        data: {
          countryName: fName,
        },
        success: function(data) {
          $('#createCountryName').val('');
          toastr.options.showMethod = 'slideDown';
          toastr.options.hideMethod = 'slideUp';
          // toastr.options.positionClass = 'toast-top-full-width';

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
            $(".show-edit-country").hide().slideUp("slow");
          }
          showCountry();
        },
        error: function(error) {
          console.log(error);
        }
      });

    }
    return false;
  });



  /* -------------------------------  Division Section   ------------------------------------------*/

  $("#DivisionEditForm").submit(function() {

    var DivisioneditEditName = $('#DivisionEditName').val();

    var DivisiondataId = $('.idofDivisionEdit').val();

    if (DivisioneditEditName == '') {
      console.log(" empty ");

    } else {
      var url = "http://localhost:8000/Division/post/" + DivisiondataId;


      $.ajax({
        type: "POST",
        url: url,

        data: {
          div_id: DivisiondataId,
          divisionName: DivisioneditEditName,
        },
        success: function(data) {


          console.log(data);


          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
            $(".show-edit-division").hide();
            var DivisioneditEditName = $('#DivisionEditName').val('');
            var DivisiondataId = $('.idofDivisionEdit').val('');

          }



          showCountry();
          showDivision();



        },
        error: function(error) {
          console.log("### " + error);
        }
      });
      return false;
    }
  });




  function DivisionEdit(id) {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/Division/edit/' + id,
      success: function(data) {
        console.log(data.country.countryName);



        var CountryNameShow = "<select class='form-control countrySelect' id='' name=''> <option>" + data.country.countryName + "</option> </select>";
        var edited = "<input type=text id='DivisionEditName' name='divisionName' value='" + data.division.divisionName + "' divdata-i='" + id + "' class='form-control'> <br/> <input type='hidden' value='" + data.division.id + "' name='id' class='idofDivisionEdit'> <br> " + CountryNameShow + "";


        $('.DivisionEdit-box').html(edited + "</br>");
        //  console.log(edited);
      }
    }, "json");

    return false;
  }

  /*--------------------------------- Division insert   -----------------------------------------*/
  $('#divisionRegister').submit(function() {

    var divisionName = $('#createdivisionName').val();
    var divisionCountry = $('#divisionCountry').val();
    var token = $('#division_token').val();

    if (divisionName == '' || divisionCountry == '') {
      console.log(" empty ");
    } else {
      var url = "http://localhost:8000/DivisionController/divisionCreate";


      $.ajax({
        type: "POST",
        url: url,
        data: {
          divisionName: divisionName,
          countryName: divisionCountry

        },
        success: function(data) {
          console.log(data);
          var divisionName = $('#createdivisionName').val('');
          var divisionCountry = $('#divisionCountry').val('');
          var token = $('#division_token').val('');
          $(".divisionshowCreate").hide().slideUp(2000);

          toastr.options.showMethod = 'slideDown';
          toastr.options.hideMethod = 'slideUp';
          // toastr.options.positionClass = 'toast-top-full-width';

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
          }

          showCountry();
          showDivision();

        },
        error: function(error) {
          console.log(error);
        }
      });


    }
    return false;
  });





  /* -------------------------------- Division Show -------------------------------------------------*/

  function showDivision() {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/DivisionController/get',
      success: function(data) {

        //$("td .division_td").remove();
        $("tr").remove();
        $(".optionDivision").remove();


        var i, x = "",
          y = "";

        for (i in data.division) {
          x += data.division[i].divisionName + " ";

          y += data.division[i].id + " ";

          if (data.division[i].id > data.division[i].id - 1) {
            $('#divisionTbody').append("<tr id = 'divisionTR'> <td> " + data.division[i].divisionName + "</td><td width='10px'>  <button type='button' class='btn btn-primary btn-Divisionedit-box-" + data.division[i].id + "'division-data-id='" + data.division[i].id + "'>Edit</button> </td><td width='10px'> <button type='button'  class='btn btn-danger  deletedata-id-" + data.division[i].id + "' deletedata = '" + data.division[i].id + "'>Delete</button> </td></tr>");
            $('#districtDivision').append("<option class = 'optionDivision'>" + data.division[i].divisionName + "</option>");
          }
          //>

          $(".btn-Divisionedit-box-" + data.division[i].id).click(function() {

            var country_id_get = $(this).attr("division-data-id");


            $(".show-edit-division").show().slideDown("slow");

            DivisionEdit(country_id_get);
          });

          // -----------------delete --------------------------

          $(".deletedata-id-" + data.division[i].id).click(function() {
            var deleteDivision = $(this).attr("deletedata");
            //  alert(deleteDivision);
            $.confirm({
              icon: 'fa fa-spinner fa-spin',
              title: 'What is up?',
              content: 'Here goes a little content',
              type: 'green',

              buttons: {
                ok: {
                  text: "ok!",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function() {
                    $.ajax({
                      type: "GET",
                      url: 'http://localhost:8000/deleteDivision/' + deleteDivision,
                      data: {
                        id: deleteDivision,
                      },
                      success: function(data) {
                        if (data.delete != null) {
                          toastr.success(data.delete);
                        } else {
                          toastr.error(data.exception);
                        }
                        showDivision();
                      },
                      error: function(error) {
                        console.log(error);
                      }
                    });

                  }
                },
                cancel: function() {
                  console.log('the user clicked cancel');
                }
              }

            });
          });
          // -------------------- delete ----------------------------
        }
      }
    }, "json"); // ajax ======
  }

  /*  ---------------------------------------------  District ------------------------------------------------------------------------*/




  /* --------------------------------------  ------------------------------------------*/

  $("#DistrictEditForm").submit(function() {


    var DistrictNameEdit = $('#DistrictEditName').val();
    var idofDistrictEdit = $('.idofDistrictEdit').val();


    if (DistrictNameEdit == '') {
      console.log(" empty ");

    } else {
      var url = "http://localhost:8000/District/post/" + idofDistrictEdit;


      $.ajax({
        type: "POST",
        url: url,

        data: {
          DistrictName: DistrictNameEdit,
          idofDistrict: idofDistrictEdit,
        },
        success: function(data) {

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
            $('#DistrictEditName').val('');
            $('.idofDistrictEdit').val('');
            $(".show-edit-district").hide();

          }

          // show value
          showDistrict();


        },
        error: function(error) {
          console.log("### " + error);
        }
      });
      return false;
    }
  });



  /* --------------------------------------  ------------------------------------------*/

  function DistrictEdit(id) {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/District/edit/' + id,
      success: function(data) {


        //var CountryNameShow ="<select class='form-control countrySelect' id='' name=''> <option>"+ data.country.countryName +"</option> </select>";
        var edited = "<input type=text id='DistrictEditName' name='DistrictName' value='" + data.district.districtName + "'Districtdata-i='" + id + "' class='form-control'> <br/> <input type='hidden' value='" + data.district.id + "' name='id' class='idofDistrictEdit'>";


        $('.districtEdit-box').html(edited + "</br>");
        //console.log(edited);
      }
    }, "json");

    return false;
  }




  /*  --------------------------------------------- District insert -----------------------------------------------------------------*/

  $('#districtRegister').submit(function() {


    var districtName = $('#createdistrictName').val();
    var district_division = $('#districtDivision').val();

    var token = $('#token').val();


    if (districtName == '' || district_division == '') {
      toastr.success("Empty");
    } else {

      var url = "http://localhost:8000/DistrictController/districtCreate";


      $.ajax({
        type: "POST",
        url: url,
        data: {
          districtName: districtName,
          division_name: district_division

        },
        success: function(data) {


          $('#createdistrictName').val('');
          $('#districtDivision').val('');
          $('#token').val('');
          $(".districtshowCreate").hide().slideUp(2000);

          toastr.options.showMethod = 'slideDown';
          toastr.options.hideMethod = 'slideUp';
          // toastr.options.positionClass = 'toast-top-full-width';

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);

          }

          // show here district all value
          showDistrict();

        },
        error: function(error) {
          console.log(error);
        }
      });

    }

    return false;
  });



  /* -------------------------------- District Show -------------------------------------------------*/

  function showDistrict() {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/DistrictController/get',
      success: function(data) {


        $("tr").remove();
        $(".optionDistrict").remove();




        var i, x = "",
          y = "";

        for (i in data.district) {
          x += data.district[i].districtName + " ";

          y += data.district[i].id + " ";

          if (data.district[i].id > data.district[i].id - 1) {
            $('#districtTbody').append("<tr id = 'DistrictTR'><td> " + data.district[i].districtName + "</td><td width='10px'>  <button type='button' name = 'button' class='btn btn-primary btn-districtedit-box-" + data.district[i].id + "' district-data-id='" + data.district[i].id + "'>Edit</button> </td> <td width='10px'>  <button type='button' class='btn btn-danger  disdeletedata-id-" + data.district[i].id + "' disdataDelete = '" + data.district[i].id + "'>Delete</button> </td></tr>");
            $('#Placedistrict').append("<option class = 'optionDistrict'>" + data.district[i].districtName + "</option>");
          }



          $(".btn-districtedit-box-" + data.district[i].id).click(function() {

            var division_id_get = $(this).attr("district-data-id");


            $(".show-edit-district").show().slideDown("slow");

            DistrictEdit(division_id_get);
          });


          // -----------------delete --------------------------

          $(".disdeletedata-id-" + data.district[i].id).click(function() {
            var disdataDelete = $(this).attr("disdataDelete");

            $.confirm({
              icon: 'fa fa-spinner fa-spin',
              title: 'What is up?',
              content: 'Here goes a little content',
              type: 'green',

              buttons: {
                ok: {
                  text: "ok!",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function() {

                    $.ajax({
                      type: "GET",
                      url: 'http://localhost:8000/deleteDistrict/' + disdataDelete,
                      data: {
                        id: disdataDelete,
                      },
                      success: function(data) {
                        if (data.delete != null) {
                          toastr.success(data.delete);
                        } else {
                          toastr.error(data.exception);
                        }
                        showDistrict();
                      },
                      error: function(error) {
                        console.log(error);
                      }
                    });

                  }
                },
                cancel: function() {
                  console.log('the user clicked cancel');
                }
              }

            });









          });
          // -------------------- delete ----------------------------



        }




      }
    }, "json"); // ajax ======
  }

  /*   ----- ----------- district End -------- ------*/


  /*  ------- --------  Place -------- --------------*/




  /* --------------------------------------  ------------------------------------------*/

  $("#PlaceEditForm").submit(function() {


    var PlaceNameEdit = $('#PlaceEditName').val();
    var id = $('.idofPlaceEdit').val();
    console.log(PlaceNameEdit + "" + id);
    //  var Placedistrict = $('#Placedistrict').val();


    if (PlaceNameEdit == '') {
      console.log(" empty ");

    } else {

      var url = "http://localhost:8000/Place/post/" + id;


      $.ajax({
        type: "POST",
        url: url,

        data: {
          placeName: PlaceNameEdit,
          id: id,
        },
        success: function(data) {
          console.log(data);

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);
            $('#PlaceEditName').val('');
            $('.idofPlaceEdit').val('');


          }
          $(".show-edit-Place").hide();

          // show value
          showPlace();


        },
        error: function(error) {
          console.log("### " + error);
        }
      });

    }
    return false;
  });



  /* --------------------------------------  ------------------------------------------*/

  function PlaceEdit(id) {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/Place/edit/' + id,
      success: function(data) {
        //  console.log(data);


        var edited = "<input type=text id='PlaceEditName' name='PlaceName' value='" + data.place.placeName + "'Placedata-i='" + id + "' class='form-control'> <br/> <input type='hidden' value='" + data.place.id + "' name='id' class='idofPlaceEdit'>";


        $('.PlaceEdit-box').html(edited + "</br>");
        //console.log(edited);
      }
    }, "json");

    return false;
  }







  $('#restauantsSearch').submit(function() {
    var name = $('#availableRestauants').val();
    var placeName = $('#placeName').val();

    if (name != '') {
      var url = "http://localhost:8000/restauantSearchPost";
      $.ajax({
        type: "POST",
        url: url,
        data: {
          search: name,
          placeName: placeName
        },
        success: function(data) {

          if (data != null) {


              $('#notFound').html("<h2 style='text-align: center; margin-top: 30px; color: red;' id ='not'>Not Found Any Restaurant</h2>");
          }

          $("#restaurantSearchResultSow").show();
          $(".imageshoing").remove();

          var ArrayCounter = 0;

          for (var i = 0; i < data.restaurant.length; i++) {
            console.log(data.restaurant[i].image);
            $('#not').hide();


            $('.restaurantSearchBox').append("<div class='row imageshoing borderOfRestanunt' ><div class='media'><div class='col-sm-4'> <div class='media-left' ><div id=''><div class=''> <a href=/restaurantList/" + data.restaurant[i].id + " id = ''><img class='media-object img-responsive' style='width: 300px;height: 160px;' src='images/" + data.restaurant[i].image + "' alt=''></a></div></div></div></div><div class='col-sm-8'><div class='media-body'> <h4 style=' margin-top: 10px; margin-bottom: 10px; '>" + data.restaurant[i].name + " <span id='restaurantSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.58406em; '>" + data.restaurant[i].placeName + "</span> </h4><span id='restaurantSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.8406em; '>Address</span> <p style='margin-top: 12px;margin-bottom: 5px;color: #4a4a4a;font-size: 0.95em;'>" + data.restaurant[i].address + "</p> <span id='restaurantSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.8406em; '><a href=/restaurantList/" + data.restaurant[i].id + " class='btn btn-sm' style='color: white; '> Read More </a></span> <div></div></div></div></div></div>");


          }


        },
        error: function(error) {
          console.log(error);
        }
      });
    } else {
      $(".imageshoing").remove();
    }
    return false;
  });

  /*=================================================    Hotel Search ===========================================*/

  $('#hotelsSearch').submit(function() {
    var name = $('#availablehotels').val();
    var placeName = $('#placeName').val();
    console.log(name + " " + placeName);
    if (name != '') {
      var url = "http://localhost:8000/hotelSearchPost";
      $.ajax({
        type: "POST",
        url: url,
        data: {
          search: name,
          placeName: placeName
        },
        success: function(data) {


          if (data != null) {


              $('#notFound').html("<h2 style='text-align: center; margin-top: 30px; color: red;' id ='not'>Not Found Any Restaurant</h2>");
          }

          $("#hotelSearchResultSow").show();
          $(".imageshoing").remove();

          var ArrayCounter = 0;

          for (var i = 0; i < data.hotel.length; i++) {
            console.log(data.hotel[i].image);
            $('#not').hide();


            $('.hotelSearchBox').append("<div class='row imageshoing borderOfHotel' ><div class='media'><div class='col-sm-4'> <div class='media-left' ><div id=''><div class=''> <a href=/hotelList/" + data.hotel[i].id + " id = ''><img class='media-object img-responsive' style='width: 300px;height: 160px;' src='images/" + data.hotel[i].image + "' alt=''></a></div></div></div></div><div class='col-sm-8'><div class='media-body'> <h4 style=' margin-top: 10px; margin-bottom: 10px; '>" + data.hotel[i].hotelName + " <span id='restaurantSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.58406em; '>" + data.hotel[i].placeName + "</span> </h4><span id='restaurantSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.8406em; '>Address</span> <p style='margin-top: 12px;margin-bottom: 5px;color: #4a4a4a;font-size: 0.95em;'>" + data.hotel[i].address + "</p> <span id='HotelSearchAddressSpan' class='label label-default' style='background: #45b3de; font-size: 0.8406em; '><a href=/hotelList/" + data.hotel[i].id + " class='btn btn-sm' style='color: white; '> Read More </a></span> <div></div></div></div></div></div>");


          }


        },
        error: function(error) {
          console.log(error);
        }
      });
    } else {
      $(".imageshoing").remove();
    }
    return false;
  });



  /*  --------------------------------------------- Place insert -----------------------------------------------------------------*/

  $('#PlaceRegister').submit(function() {

    var PlaceName = $('#createPlaceName').val();
    var Place_division = $('#Placedistrict').val();
    var token = $('#Place_token').val();


    if (PlaceName == '' || Place_division == '') {
      toastr.success("Empty");
    } else {

      var url = "http://localhost:8000/PlaceController/placeCreate";


      $.ajax({
        type: "POST",
        url: url,
        data: {
          PlaceName: PlaceName,
          Place_division: Place_division
        },
        success: function(data) {


          $('#createPlaceName').val('');
          $('#Placedistrict').val('');
          $('#Place_token').val('');
          $(".PlacehowCreate").hide().slideUp("slow");

          toastr.options.showMethod = 'slideDown';
          toastr.options.hideMethod = 'slideUp';
          // toastr.options.positionClass = 'toast-top-full-width';

          if (data.already != null) {
            toastr.success(data.already);
          } else {
            toastr.success(data.no);

          }

          // show here Place all value
          showPlace();

        },
        error: function(error) {
          console.log(error);
        }
      });

    }

    return false;
  });



  /* -------------------------------- Place Show -------------------------------------------------*/

  function showPlace() {

    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/PlaceController/get',
      success: function(data) {


        $(".placeshowing").remove();

        var i, x = "",
          y = "";

        for (i in data.Place) {
          x += data.Place[i].placeName + " ";

          y += data.Place[i].id + " ";

          if (data.Place[i].id > data.Place[i].id - 1) {
            $('#PlaceTbody').append("<tr class = 'placeshowing' id = 'PlaceTR'> <td> " + data.Place[i].placeName + "</td><td width='10px'>  <button type='button' name = 'button' class='btn btn-primary btn-Placeedit-box-" + data.Place[i].id + "' Place-data-id='" + data.Place[i].id + "'>Edit</button> </td><td width='10px'><td width='10px'>  <button type='button' class='btn btn-danger  placedeletedata-id-" + data.Place[i].id + "' placedataDelete = '" + data.Place[i].id + "'>Delete</button></td></tr>");
            $('.ShowPostPlace').append("<option class = 'postPlace'>" + data.Place[i].placeName + "</option>");
          }

          // </td> <td width='10px'>  <button type='button' class='btn btn-danger  disdeletedata-id-"+data.district[i].id+"' disdataDelete = '"+data.district[i].id+"'>Delete</button> </td>
          $(".btn-Placeedit-box-" + data.Place[i].id).click(function() {

            var division_id_get = $(this).attr("Place-data-id");
            console.log(" division_id_get : -> " + division_id_get);



            $(".show-edit-Place").show().slideDown("slow");

            PlaceEdit(division_id_get);
          });

          // -----------------delete ---------------------------------------############################################






          $(".placedeletedata-id-" + data.Place[i].id).click(function() {
            var placedataDelete = $(this).attr("placedataDelete");

            $.confirm({
              icon: 'fa fa-spinner fa-spin',
              title: 'What is up?',
              content: 'Here goes a little content',
              type: 'green',

              buttons: {
                ok: {
                  text: "ok!",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function() {

                    $.ajax({
                      type: "GET",
                      url: 'http://localhost:8000/deletePlace/' + placedataDelete,
                      data: {
                        id: placedataDelete,
                      },
                      success: function(data) {

                        if (data.delete != null) {
                          toastr.success(data.delete);
                          showPlace();
                        } else {
                          toastr.error(data.exception);
                        }



                      },
                      error: function(error) {

                        console.log(error);
                      }
                    });

                  }
                },
                cancel: function() {
                  console.log('the user clicked cancel');
                }
              }

            });


          });





        } // loop End


        //showDistrict();


      }
    }, "json"); // ajax ======
  }

  /*   ----------------------------------------------- Place End ------------------------------------------------- */






  // function showImage() {
  //
  //   $.ajax({
  //     type: 'GET',
  //     url: 'http://localhost:8000/showImage',
  //     success: function(data) {
  //
  //       if (data != null) {
  //         for (var i in data.showImage) {
  //           var x = data.showImage[i].id;
  //           var title = data.showImage[i].title;
  //
  //           //  console.log(x);
  //           //  console.log(title);
  //         }
  //
  //
  //       }
  //
  //
  //
  //
  //     }
  //   }, "json"); // ajax ======
  // }

  // $(".postViewDelete").on("submit", function(){
  //      return confirm("Do you want to delete this item?");
  //  });

  /*---------------------------------------------------------------------------------------*/

  // For A Delete Record Popup
  $('.remove-record').click(function() {
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');

    console.log(id + " " + url);

    $.confirm({
      icon: 'fa fa-spinner fa-spin',
      title: 'What is up?',
      content: 'Here goes a little content',
      type: 'green',

      buttons: {
        ok: {
          text: "ok!",
          btnClass: 'btn-primary',
          keys: ['enter'],
          action: function() {

            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/postdelete/' + id,
              data: {
                id: id,
              },
              success: function(data) {
                console.log("working");

                // window.location = loc.protocol+"//"+loc.hostname+"/admin/dashboard";
                window.location = "http://localhost:8000/postview";
                if (data.delete != null) {
                  toastr.success(data.delete);
                  window.location = "http://localhost:8000/postview";
                } else {
                  toastr.error(data.exception);
                }




              },
              error: function(error) {

                console.log(error);
              }
            });

          }
        },
        cancel: function() {
          console.log('the user clicked cancel');
        }
      }

    });

  });

  /*-------------------------------------------------------------------------------*/




  // For A Delete Record Popup
  $('.remove-restaurant').click(function() {
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');

    console.log(id + " " + url);

    $.confirm({
      icon: 'fa fa-spinner fa-spin',
      title: 'What is up?',
      content: 'Here goes a little content',
      type: 'green',

      buttons: {
        ok: {
          text: "ok!",
          btnClass: 'btn-primary',
          keys: ['enter'],
          action: function() {

            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/restaurantdelete/' + id,
              data: {
                id: id,
              },
              success: function(data) {
                console.log("working");

                // window.location = loc.protocol+"//"+loc.hostname+"/admin/dashboard";
                window.location = "http://localhost:8000/restaurant";
                if (data.delete != null) {
                  toastr.success(data.delete);
                  window.location = "http://localhost:8000/restaurant";
                } else {
                  toastr.error(data.exception);
                }

              },
              error: function(error) {
                console.log(error);
              }
            });

          }
        },
        cancel: function() {
          console.log('the user clicked cancel');
        }
      }

    });

  });

  /*-------------------------------------------------------------------------------*/


  $('.responsive').slick({
    dots: true,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
// scroll position
 


});

/*   ----------------------------   Jquery End   -----------------------------------------    */
