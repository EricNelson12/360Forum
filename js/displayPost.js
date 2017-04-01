$('document').ready(function()
{
  var count = 0;
  var thisPostID = window.location.search.split("&")[0].replace("?","").split("=")[1].toString();

  //Ajax for displaying Post
  $.ajax({
    type: 'POST',
    url: 'ajax/getPost.php',
    //Gets the parameter from the post
    data: 'url=' + thisPostID,
    dataType: 'json',
    success: function(data) {
      p = data[0];
      $('img').replaceWith('<img src="data:image/(png|jpg|jpeg);base64,'+p.image+'"/>');
      $('figcaption').replaceWith('<figcaption>'+p.title+'</figcaption>');
    }
  });


  //Add listener for comment button
  $('#comment-form').submit(function(e) {
    e.preventDefault();
    //Get the postID and the comment
    postData = "&comment="+$('#commentArea').val() + "&postID="+thisPostID;
    $.ajax({
      type: 'POST',
      url: '../ajax/postComment.php',
      data: postData
    });
    $('#commentArea').val("");
  });




  //Repeating function for Displaying and updating comments
  (function worker() {
    // y("Test");
    $.ajax({
      type: 'POST',
      url: 'ajax/getComments.php',
      //Gets the parameter from the post
      data: 'url=' + thisPostID,
      dataType: 'json',
      success: function(data) {
        for(x in data){
          p = data[x];
          //Only post if not in list already
          var exists = $('#post'+p.commentID);
          if(! exists.length){
            $(' ul:last').prepend('<li class= "comment" id = "post'+p.commentID+
            '"><p>'+p.comment+'</p><p><i>'+p.username+'</i></p></li>');
          }
        }
        count++;
      },
      error: function(e){
        // alert("Error "+e.responseText );

      },
      complete: function() {
        // Schedule the next request when the current one's complete
        setTimeout(worker, 2000);
      }
    });
  })();

});
