<?php 
    require '../../../action.php';
    function add_or_update_params($url,$key,$value){
        $a = parse_url($url);
        $query = $a['query'] ? $a['query'] : '';
        parse_str($query,$params);
        $params[$key] = $value;
        $query = http_build_query($params);
        $result = '';
        if($a['path']){
            $result .=  $a['path'];
        }
        if($query){
            $result .=  '?' . $query;
        }
        return $result;
    }

    $url1 = '../../../action.php?moreB=0';
    $more = "More";
    $forLink = 0;

    $q = $_GET['q'];
    $leo = date("Y-m-d");
    $sql="SELECT * FROM matangazo WHERE issueDate BETWEEN '".$q."' AND '".$leo."'";
    $total = "SELECT sum(cost) AS totalCost FROM matangazo WHERE issueDate BETWEEN '".$q."' AND '".$leo."'";
    $totalCash = "SELECT sum(cost) AS totalCost FROM matangazo WHERE issueDate BETWEEN '".$q."' AND '".$leo."' AND costType = 'Cash'";
    $totalBank = "SELECT sum(cost) AS totalCost FROM matangazo WHERE issueDate BETWEEN '".$q."' AND '".$leo."' AND costType = 'Bank'";
    $totalMobile = "SELECT sum(cost) AS totalCost FROM matangazo WHERE issueDate BETWEEN '".$q."' AND '".$leo."' AND costType = 'Mobile Money'";

    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$total);
    $result3 = mysqli_query($conn,$totalCash);
    $result4 = mysqli_query($conn,$totalBank);
    $result5 = mysqli_query($conn,$totalMobile);

    $today = 'today';
    $cls = 'display table table-hover text-nowrap';
    $cardheader = 'card-header';
    $cardtitle = 'card-title';
    $margin = 'margin-left:90px';
    $card = 'card-body table-responsive p-0';
    while($row = mysqli_fetch_array($result2)) {
      if ($result2->num_rows > 0) {
        $cost = $row["totalCost"];
      }
    }
    while($row = mysqli_fetch_array($result3)) {
      if ($result3->num_rows > 0) {
        $cash = $row["totalCost"];
      }
    }
    while($row = mysqli_fetch_array($result4)) {
      if ($result4->num_rows > 0) {
        $bank = $row["totalCost"];
      }
    }
    while($row = mysqli_fetch_array($result5)) {
      if ($result4->num_rows > 0) {
        $mobile = $row["totalCost"];
      }
    }
    
    echo '<div class="$cardheader">
    <h3 class="$cardtitle">Ads</h3>';
    if ($result->num_rows > 0) {
      echo "<span style='$margin'>Total Cost : $cost</span>";
      // echo '</span><span>/=</span>';
      echo "<span style='$margin'>Total Cash : $cash</span>";
      // echo '</span><span>/=</span>';
      echo "<span style='$margin'>Total Bank : $bank</span>";
      // echo '</span><span>/=</span>';
      echo "<span style='$margin'>Total Mobile Money : $mobile</span>";
      // echo '</span><span>/=</span>';
    }
    echo '
  </div>
  <!-- /.card-header -->
  <div class="$card">';
    echo "<table class='$cls'>
    <thead>
    ";
    if ($result->num_rows > 0) {
      echo '<tr>
      <th>No</th>
      <th>Ad Name</th>
      <th>Ad Owner</th>
      <th>Date Issued</th>
      <th>No of Days to play</th>
      <th>Costs</th>
      <th>Cost Type</th>
    </tr>';
    }
    echo "
    </thead>
    <tbody>";
    $NO = 1;
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $url = add_or_update_params($url1,'more',$forLink);
        $link = 'href="'.$url.'"';
        $date2=$row["playFrom"];
        $date1=$row["playTo"];
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);
        $diff = $date1 - $date2;
        $diff = round($diff / (60 * 60 * 24));
        $display = $diff;
        $ownerId = $row["ownerFk"];
        $ownerQry = "SELECT ownerName FROM tangazoowner WHERE id = '$ownerId'";
        $ownerName = $conn->query($ownerQry);
        if($ownerName->num_rows > 0){
            while($nameOwner = $ownerName->fetch_assoc()){
              $ownerNamee = $nameOwner["ownerName"];
            }
        }
        echo "<tr><td>" . $NO. "</td><td>". $row["tangazoName"]."</td><td>". $ownerNamee."</td><td>". $row["issueDate"]."</td><td>".$display."</td><td>". $row["cost"]."</td><td>". $row["costType"]."</td>";
        $NO++;
      }
    }else{
      echo '<tr><td>No Ads Currently...</td></tr>';
    }
    echo "  </tr>
    </tbody>
  </table>";
?>