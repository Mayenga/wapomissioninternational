<?php
require '../../../action.php';
backgroundPro($conn);
$qrry = 'SELECT * FROM adnotifications WHERE status = "not read"';
$total_notifications = mysqli_query($conn,$qrry);
$total_notfications = mysqli_num_rows($total_notifications);
if($total_notfications == 0){
    echo '';
}else{
    echo $total_notfications;
}
?> 