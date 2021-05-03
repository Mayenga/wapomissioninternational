<?php
require '../../../action.php';
background($conn);
$qrry = 'SELECT * FROM messages WHERE userFk = 2 AND status = "not read"';
$total_messagess = mysqli_query($conn,$qrry);
$total_messages = mysqli_num_rows($total_messagess);
if($total_messages == 0){
    echo '';
}else{
    echo $total_messages;
}
?>