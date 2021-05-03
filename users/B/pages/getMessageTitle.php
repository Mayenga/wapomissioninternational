<?php
require '../../../action.php';
$selectmsgs = "SELECT * FROM messages WHERE userFk = 2 AND status = 'not read' order by id DESC";
if(mysqli_query($conn,$selectmsgs)){}
$query = mysqli_query($conn,$selectmsgs);
while($row = mysqli_fetch_array($query)){
    $Weddingdate = new DateTime($row["time"]);
    $mstime = $Weddingdate->format('d-m-Y H:i');
    $X = $row['id'];
    echo "<a href='$X' class='dropdown-item'>
    <div class='media'>
      <img src='dist/img/user1-128x128.jpg' alt='User Avatar' class='img-size-50 mr-3 img-circle'>
      <div class='media-body'>
        <h3 class='dropdown-item-title'>
          Manager
        </h3>
        <p class='text-sm'>".$row['subject']."</p>
        <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i>".$row['time']."</p>
      </div>
    </div>
  </a>
  <div class='dropdown-divider'></div>";
}
?>