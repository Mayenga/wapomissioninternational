<?php
require '../action.php';
$selectmsgs = "SELECT vipindi.kipindiname,matangazo.tangazoName,adnotifications.responce,adnotifications.feedback FROM adnotifications,lineup,matangazo,vipindi WHERE matangazo.id = lineup.adFk AND vipindi.id = lineup.kipindFk AND lineup.id = adnotifications.lineupFk";
$query = mysqli_query($conn,$selectmsgs);
while($row = mysqli_fetch_array($query)){
    $X = $row['id'];
    echo "<a href='$X' class='dropdown-item'>
        <i class='fas fa-envelope mr-2'></i> 4 new messages
        <span class='float-right text-muted text-sm'>3 mins</span>
        </a>
        <div class='dropdown-divider'></div>";
}
?>