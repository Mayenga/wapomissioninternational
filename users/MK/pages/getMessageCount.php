<?php
require '../../../action.php';
$qrry = 'SELECT * FROM messages WHERE userFk = 1 AND status = "not read"';
$total_messagess = mysqli_query($conn,$qrry);
$total_messages = mysqli_num_rows($total_messagess);
if($total_messages == 0){
    echo '';
}else{
    echo $total_messages;
}
?>