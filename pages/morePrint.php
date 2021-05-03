<?php
    require '../action.php';

    $tangzID =  $_SESSION['moreId'];
    //Retrieve all matangazo
    $sql = "SELECT * FROM matangazo WHERE id = '$tangzID'";
    $sql2 = "SELECT vipindi.kipindiname,adnotifications.day,adnotifications.responce FROM matangazo,lineup,vipindi,adnotifications WHERE lineup.adFk = matangazo.id AND lineup.kipindFk = vipindi.id AND adnotifications.lineupFK = lineup.id";
    $results = $conn->query($sql);
    $results2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPORADIO | Ad Report Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<?php 
function add_or_update_params($url,$key,$value){
  $a = parse_url($url);
  $query = $a['query'] ? $a['query'] : '';
  parse_str($query,$params);
  $params[$key] = $value;
  $query = http_build_query($params);
  $result = '';
  // if($a['scheme']){
  //     $result .= $a['scheme'] . ':';
  // }
  // if($a['host']){
  //     $result .= '//' . $a['host'];
  // }
  if($a['path']){
      $result .=  $a['path'];
  }
  if($query){
      $result .=  '?' . $query;
  }
  return $result;
}

$url1 = '../action.php?edit=0';
$forLink = $_SESSION['moreId'];
$url = add_or_update_params($url1,'tangazo',$forLink);
$link = 'href="'.$url.'"';

if ($results->num_rows > 0) {
    while($row = $results->fetch_assoc()) {
      $ownerId = $row["ownerFk"];
      $cost = $row["cost"];
      $date2=$row["playFrom"];
      $date1=$row["playTo"];

      $fromDate = $row["playFrom"];
      $timestamp = strtotime($fromDate);
      $fromDate = date("d-m-Y", $timestamp);

      $toDate = $row["playTo"];
      $timestamp = strtotime($toDate);
      $toDate = date("d-m-Y", $timestamp);

      $date1 = strtotime($date1);
      $date2 = strtotime($date2);
      $diff = $date1 - $date2;
      $diff = round($diff / (60 * 60 * 24));
      if($diff == 0){
        $diff = 1;
      }
      $diff = $diff + 1;
      
      $ownerQry = "SELECT * FROM tangazoowner WHERE id = '$ownerId'";
      $ownerName = $conn->query($ownerQry);
      $contactPersonQry = "SELECT * FROM contactperson WHERE ownerFk = '$ownerId'";
      $contactPerson = $conn->query($contactPersonQry);
      $issueDate = $row["issueDate"];
      $timestamp = strtotime($issueDate);
      $issueDate = date("d-m-Y", $timestamp);

      if($ownerName->num_rows > 0){
        while($nameOwner = $ownerName->fetch_assoc()){
          $ownerNamee = $nameOwner["ownerName"];
          $ownerPhone = $nameOwner["ownerPhone"];
          $ownerEmail = $nameOwner["ownerEmail"];
          $owneraddress = $nameOwner["addresss"];
        }
        if($ownerPhone == '' && $ownerEmail == ''){
            $ownerPhone ='None';
            $ownerEmail ='None';
        }
      }

      
      //<!-- Main content -->
 echo '<section class="content">';
 echo    '<div class="container-fluid">';
        echo  '<div class="col-12">';
              echo '<div class="card">';
                //   <!-- /.card-header -->
                  echo'<div class="card-body table-responsive p-0">';
                    //   <!-- Main content -->
                      echo'<div class="invoice p-3 mb-3">';
                        //   <!-- title row -->
                        echo'<div class="row">';
                        echo'<div class="col-12">';
                        echo'<h4>';
                        echo'<i class="fas fa-globe"></i> '.$row["tangazoName"].
                                    '<small class="float-right">Issue Date: '.$issueDate.'</small>
                                  </h4>
                              </div>
                          </div>
                          <div class="row invoice-info">
                              <div class="col-sm-3 invoice-col">
                                  Play From.
                                  <address>
                                      <strong>'.$fromDate.'</strong><br>
                                  </address>
                              </div>
                              <div class="col-sm-3 invoice-col">
                                  Play To.
                                  <address>
                                      <strong>'.$toDate.'</strong><br>
                                  </address>
                              </div>
                              <div class="col-sm-3 invoice-col">
                                  Status
                                  <address>
                                      <strong>'.$row["statuss"].'</strong><br>
                                  </address>
                              </div>
                              <div class="col-sm-3 invoice-col">
                                  Active Days
                                  <address>
                                      <strong>'.$diff.'</strong><br>
                                  </address>
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <p class="lead">Ad Play Details</p>
                            </div>
                          </div>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>';
                    if ($results2->num_rows > 0) {
                      echo '<tr>
                      <th>Event</th>
                      <th>Kipindi</th>
                      <th>Day</th>
                      </tr>';
                    }
                    echo '
                    </thead>
                    <tbody>';                    
                      if ($results2->num_rows > 0) {
                        while($row = mysqli_fetch_array($results2)){
                          $day = $row["day"];
                          $event = $row["responce"];
                          $kipindi = $row["kipindiname"];
                          echo '<tr>
                            <th>'.$event.'</th>
                            <th>'.$kipindi.'</th>
                            <th>'.$day.'</th>
                          </tr>';
                        }
                      }else{
                        echo '<tr><th colspan="4"> No Details available at the moment</th></tr>';
                      }
                      echo '
                    </tbody>
                    </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
                          <div class="row">
                              <div class="col-6">
                                  <p class="lead">Ad Costs</p>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                              <th style="width:50%">Subtotal:</th>
                                              <td>Tsh '.$cost.'</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                              <div class="col-6">
                                  <p class="lead">Ad Owner Details</p>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                              <th style="width:50%">Name:</th>
                                              <td>'.$ownerNamee.'</td>
                                          </tr>
                                          <tr>
                                              <th style="width:50%">Phone Number:</th>
                                              <td>'.$ownerPhone.'</td>
                                          </tr>
                                          <tr>
                                              <th style="width:50%">Email:</th>
                                              <td>'.$ownerEmail.'</td>
                                          </tr>
                                          <tr>
                                              <th style="width:50%">Address:</th>
                                              <td>'.$owneraddress.'</td>
                                          </tr>';
                                            if($contactPerson->num_rows > 0){
                                              while($contactP = $contactPerson->fetch_assoc()){
                                                $contactpName = $contactP["namee"];
                                                $contactpPhone = $contactP["phone"];
                                                $contactpEmail = $contactP["email"];
                                                      echo  ' <tr>
                                                    <th style="width:50%">Contact Person Name:</th>
                                                    <td>'.$contactpName.'</td>
                                                  </tr>
                                                  <tr>
                                                  <th style="width:50%">Contact Person Phone:</th>
                                                  <td>'.$contactpPhone.'</td>
                                                  </tr>
                                                  <tr>
                                                  <th style="width:50%">Contact Person Email:</th>
                                                  <td>'.$contactpEmail.'</td>
                                                  </tr>';
                                              }
                                            }else{
                                              echo '<th style="width:50%; color:red" colspan="2">No Contact Person Details available For this user</th>';
                                            }
                                          echo '
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div class="row no-print">
                              <div class="col-12">
                                  <a href="morePrint.php" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                  ';echo "<a $link>";echo '<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                      <i class="fas fa-edit"></i> Edit
                                  </button></a>
                              </div>
                          </div>
                      </div>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </section>';
        //   <!-- /.content -->
    }
  } else {
    echo "No data";
  }
  $conn->close();
?>
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
