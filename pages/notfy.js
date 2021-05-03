function loaddata(){
    var user = 1;
    $.ajax({
        type: 'post',
        url: './notfy.php', 
        data: {
            user_id:user,
        }, 
        success: function (response) { 
            //$('#user_msg').html(response);
        }
    });
}
setInterval(function(){
    loaddata();
}, 1000); 