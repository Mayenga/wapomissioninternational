<?php
require './action.php';
// include ('Push.php');  
// $push = new Push(); 
$array=array(); 
$rows=array(); 
// $notifList = $push->listNotificationUser($_SESSION['username']); 
    $sql = "SELECT * FROM lineup"; 
    $results = $conn->query($sql);
    $record = 0;
foreach ($results as $key) {
 $data['adFk'] = $key['adFk'];
 $data['kipindFk'] = $key['kipindFk'];
 $rows[] = $data;
//  $nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
//  $push->updateNotification($key['id'],$nextime);
 $record++;
}
$array['notif'] = $rows;
$array['count'] = $record;
$array['result'] = true;
echo json_encode($array);
?>