$('document').ready(function()
{

  //Add listener for submit button
  $('#login-form').submit(function(e) {
    e.preventDefault();

    var postData =	$("#login-form").serialize();
    var posting  = $.post("ajax/processlogin.php",	postData);

    posting.done(function( data ){
    try{
     var info =  jQuery.parseJSON(data);
      location.reload();
     }catch(e){
       $('#login-error').css('display','inline');
     }
    });


});

});
