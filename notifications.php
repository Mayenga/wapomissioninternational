<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div id="user_msg"></div>
<script> 
  function loaddata(){
    var user = 1;
    $.ajax({
      type: 'post',
      url: './notfy.php', 
      data: {
        user_id:user,
      }, 
      success: function (response) { 
        $('#user_msg').html(response);
      }
    });
  }
    setInterval(function(){
        loaddata();
    }, 1000);     
</script>
</body>
</html>
