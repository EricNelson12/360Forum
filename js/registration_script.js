$('document').ready(function()
{

  //Add listener for submit button
  $('#registration-form').submit(function(e) {

    $('#reg-error').css("display","none");

    e.preventDefault();

    $.ajax({
        url: "ajax/register.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          // Had to check for string because login is echoing something too.
          if(! (data == "ok")){
              $('#reg-error').css("display","inline");
            $('#reg-error').html(data);
          }else{
            // $('#reg-error').css("display","inline");
            // $('#reg-error').html("THIS IS GOOD:"+data);

            window.location.replace("index.php");
          }
        }

    });


});

});
