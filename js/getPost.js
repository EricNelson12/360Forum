$('document').ready(function()
{
  var count = 0;
  (function worker() {
    $.ajax({
      type: 'POST',
      url: 'ajax/getPosts.php',
      dataType: 'json',
      success: function(data) {
        // alert(data);
        for(x in data){          
          $('.posts li:last').after('<li>'+data[x].postText+"  Test"+count+'</li>');
        }
        count++;
      },
      complete: function() {
        // Schedule the next request when the current one's complete
        setTimeout(worker, 2000);
      }
    });
  })();

});
