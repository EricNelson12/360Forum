$('document').ready(function()
{
  var count = 0;

  $.ajax({
    type: 'POST',
    url: '../ajax/getPost.php',
    //Gets the parameter from the post
    data: 'url=' + window.location.search.split("&")[0].replace("?","").split("=")[1].toString(),
    dataType: 'json',
    success: function(data) {
      p = data[0];
      $('.posts img').replaceWith('<img src="data:image/(png|jpg|jpeg);base64,'+p.image+'"/>');
      $('.posts figcaption').replaceWith('<figcaption>'+p.title+'</figcaption>');
    }
  });

  (function worker() {
    // alert("Test");
    $.ajax({
      type: 'POST',
      url: '../ajax/getComments.php',
      //Gets the parameter from the post
      data: 'url=' + window.location.search.split("&")[0].replace("?","").split("=")[1].toString(),
      dataType: 'json',
      success: function(data) {
        for(x in data){
          p = data[x];
          //Only post if not in list already
          var exists = $('#post'+p.commentID);
          if(! exists.length){
            $('.comments ul:last').append('<li id = "post'+p.commentID+'"><h2>'+p.comment+'</h2><p><i>'+p.username+'</i></p></li>');
          }
        }
        count++;
      },
      error: function(e){
        // alert("Error "+e.responseText );

      },
      complete: function() {
        // Schedule the next request when the current one's complete
        setTimeout(worker, 5000);
      }
    });
  })();

});
