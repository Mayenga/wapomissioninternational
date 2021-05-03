    <?php 
    echo '<script language="javascript">';
    echo 'alert("This ad shall be played now please!");';
    echo '</script>';
    // date_default_timezone_set("Africa/Dar_es_Salaam");
    // require '../action.php';
    // $now = date("h:i");

    // if($conn == true){
    //     $sql = "SELECT * FROM lineup";
    //     $results = $conn->query($sql);
    //     $duration=674165;
    //     $x = 1;
    //     if ($results->num_rows > 0) {
    //         while($row = $results->fetch_assoc()) {
    //             $adTime = $row["adpTime"];
    //             $adFk = $row["id"];
    //             if(strtotime($now) == strtotime($adTime) && $x == 1){
    //                 echo '<script language="javascript">';
    //                 echo 'alert("This ad shall be played now please!");location.href="./users/A/pages/users.php";';
    //                 echo '</script>';
    //                 //echo $adTime. ' is same to now '.$now;
    //                 $lineupdata = "INSERT INTO adnotifications (lineupFk,status) VALUES ('$adFk','not read')";
    //                 if($conn->query($lineupdata)){
    //                     $x = 0;
    //                 }
    //             }else{}
    //         }
    //     }
    // }
?>