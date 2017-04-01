$('document').ready(function()
{
  var count = 0;

  $('nav li').click(function(e) {
    e.preventDefault();
    $('.posts ul:last').empty();
    postData = "&board="+e.target.innerText;
    // alert(e.target.innerText);
    $.post("../ajax/setBoard.php",postData);
  });

  (function worker() {
    // alert("Test");
    $.ajax({
      type: 'POST',
      url: 'ajax/getPosts.php',
      dataType: 'json',
      success: function(data) {
        for(x in data){
          p = data[x];
          //Only post if not in list already
          var exists = $('#post'+p.postID);
          if(! exists.length){
            $('.posts ul:last').prepend('<li id = "post'+p.postID+'" id><h2><a href = "post.php?id='+p.postID+'">'+
            p.title+'</a></h2><img src="data:image/(png|jpg|jpeg);base64,'+p.image+'"/>   '+p.postText+ '<p><i>'+p.username+'</i></p></li>');
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
