$('document').ready(function()
{
  var count = 0;

  (function worker() {
    // alert("Test");
    $.ajax({
      type: 'POST',
      url: '../ajax/getPosts.php',
      dataType: 'json',
      success: function(data) {
        for(x in data){
          p = data[x];
          //Only post if not in list already
          var exists = $('#post'+p.postID)
          if(! exists.length){
            $('.posts li:last').after('<li id = "post'+p.postID+'" id><img src="data:image/(png|jpg|jpeg);base64,'+p.image+'"/>'+
            p.title+'   '+p.postText+ '</li>');
          }
        }
        count++;
      },
      error: function(e){
        alert("Error "+e.responseText );

      },
      complete: function() {
        // Schedule the next request when the current one's complete
        setTimeout(worker, 5000);
      }
    });
  })();

});
