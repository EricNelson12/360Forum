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
          if(data != 'ok'){
              $('#reg-error').css("display","inline");
            $('#reg-error').html(data);
          }else{
            window.location.replace("index.php");
          }
        }

    });


});

});
