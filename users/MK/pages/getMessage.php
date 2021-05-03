<?php
require '../../../action.php';
$selectmsgs = "SELECT * FROM messages WHERE userFk = 1 order by id DESC";
$query = mysqli_query($conn,$selectmsgs);
if ($query->num_rows > 0) {
    while($row = mysqli_fetch_array($query)){ 
        $Weddingdate = new DateTime($row["time"]);
        $mstime = $Weddingdate->format('d-m-Y H:i');
        $X = $row['id'];
        if($row['status'] == 'read'){
            $color = 'white';
        }else{
            $color = 'wheat';
        }
        echo "<tr style='background-color:$color'>
            <td class='mailbox-name'><a href='./readMailInbox.php?id=$X'>B Shop</a></td>
            <td class='mailbox-subject'><b>".$row['subject']."</b></td>
            <td class='mailbox-date'>".$mstime."</td>
        </tr>";
    }
}else{
    echo '<tr><td>No messages</td></tr>';
}
?>