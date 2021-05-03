<?php
require '../../../action.php';
$selectmsgs = "SELECT lineup.adpTime,adnotifications.responce,adnotifications.id,adnotifications.status,adnotifications.feedback,matangazo.tangazoName,vipindi.kipindiname FROM adnotifications,lineup,matangazo,vipindi WHERE adnotifications.lineupFk = lineup.id AND lineup.adFk = matangazo.id AND lineup.kipindFk = vipindi.id order by adnotifications.id desc";
if(mysqli_query($conn,$selectmsgs)){}
$query = mysqli_query($conn,$selectmsgs);
if ($query->num_rows > 0) {
    while($row = mysqli_fetch_array($query)){
        $Weddingdate = new DateTime($row["adpTime"]);
        $mstime = $Weddingdate->format('d-m-Y H:i');
        $X = $row['id'];
        if($row['status'] == 'read'){
            $color = 'white';
        }else{
            $color = 'wheat';
        }
        echo "<tr style='background-color:$color'>
            <td class='mailbox-name'><a href='./readNotification.php?id=$X'>".$row['tangazoName']."</a></td>
            <td class='mailbox-subject'><b>".$row['responce']."</b></td>
        </tr>";
    }
}else{
    echo '<tr><td>No Notifications at the moment...</td></tr>';
}
?>