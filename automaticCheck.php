<?php
require './action.php';
//automatic check date and remove item to de active
$now = date("Y-m-d h:i:sa");
if($conn == true){
    $sql = "SELECT * FROM matangazo";
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        while($row = $results->fetch_assoc()) {
          $to = $row["playTo"];
          $from = $row["playFrom"];
          $id = $row["id"];
          if($now > $to){
            $sql2 = "UPDATE matangazo SET statuss = 'Deactive' WHERE id = '$id'";
            $conn->query($sql2);
          }elseif($from > $now){
            $sql3 = "UPDATE matangazo SET statuss = 'Pending' WHERE id = '$id'";
            $conn->query($sql3);
          }else{
            $sql2 = "UPDATE matangazo SET statuss = 'Active' WHERE id = '$id'";
            $conn->query($sql2);
          }
        }
    }
}
?>