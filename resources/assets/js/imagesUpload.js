 var form = document.getElementById('upload');
var request = new XMLHttpRequest();
if (form) {
  var fup = document.getElementById('ImageUpload');
  var types = document.getElementById('types');

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var formdata = new FormData(form);
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" )
    {
      request.open('post', '/upload');
      request.addEventListener("load", transferComplete);
      request.send(formdata);
    }
    else
    {
        toastr.success("Type Error");
      fup.focus();
    }

  });


  function transferComplete(data){
    console.log(JSON.parse(JSON.stringify(data.currentTarget.response)));

      if(JSON.parse(JSON.stringify(data.currentTarget.response))){
        title.value = "";
        description.value = "";
        address.value = "";

        fup.value= "";
        $('document').ready(function() {
           $('#types').val(null).trigger('change');

        });
        toastr.success("Successfully Uploaded");
          document.getElementById('message').innerHTML = "Successfully Uploaded ";
      }else {
          document.getElementById('message').innerHTML = "Sorry";
      }
  }

 
}


// -------------------------------------  show image ----------------------------------------
