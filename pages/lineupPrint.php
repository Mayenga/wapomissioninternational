<?php
    require '../action.php';

    //Retrieve all programs
    $sql = "SELECT vipindi.id,vipindi.kipindiname,vipindi.fromTime,vipindi.toTime,vipindi.type,vipindi.oderedBy FROM vipindi";
    $results = $conn->query($sql);
    
    // $sql2 = "SELECT * FROM tangazoplays WHERE id = '$tangzID'";
    // $results = $conn->query($sql);
    // $results2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPORADIO | Lineup Print</title>
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
    <!-- Main content -->
    <section class="invoice">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h2>STUDIO: WAPO RADIO FM</h2>
                  <h4>
                    <i class="fas fa-globe"></i> CONTENT LINE UP
                  </h4>
                </div>
                <!-- /.col -->
              </div>
                <!-- /.col -->
                <div class="col-sm-12 invoice-col">
                  <b>CHECK CONTENTS IN MATANGAZO FOLDER</b><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr style="font-size:20px">
                      <th>S/NO</th>
                      <th>SAVED IN</th>
                      <th>PRODUCT NAME</th>
                      <th>ODERED BY</th>
                      <th>START TIME</th>
                      <th>END TIME</th>
                      <th>ACTUAL</th>
                      <th>REMARKS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $NO = 1;
                      if ($results->num_rows > 0) {
                        while($row = $results->fetch_assoc()) {
                          //$prgId = $row['kipindFk'];
                          $prgId = $row['id'];
                          echo '<tr style="background-color:wheat"><td></td>
                          <td style="font-weight:bold;">'.$row["type"].'</td>
                          <td style="font-weight:bold;font-size:20px">'.$row["kipindiname"].'</td>
                          <td style="font-style:italic">'.$row["oderedBy"].'</td>
                          <td style="font-weight:bold;color:black">'.$row["fromTime"].'</td>
                          <td style="font-weight:bold;color:black">'.$row["toTime"].'</td>
                          <td></td>
                          <td></td>
                          </tr>';
                          $sql2 = "SELECT matangazo.tangazoName,lineup.tid,lineup.adpTime FROM matangazo,lineup,vipindi WHERE lineup.adFk = matangazo.id AND lineup.kipindFk = '$prgId' AND lineup.kipindFk = vipindi.id";
                          $results2 = $conn->query($sql2);
                          while($row = $results2->fetch_assoc()){
                            echo '<tr style="background-color:#f0efeb;color:black"><td></td> 
                            <td style="color:green">CPU</td>
                            <td style="font-style:italic">'.$row["tangazoName"].'</td>
                            <td>'.$row["tid"].'</td>
                            <td style="font-style:italic;font-size:15px;color:black;font-weight:bold">Ad Play Time : <span style="font-size:20px;color:black">'.$row["adpTime"].'</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>';
                          }
                        }
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row" style="margin-top:30px">
                <!-- accepted payments column -->
                <div class="col-6">
                  <div class="row">
                    <div class="col-6">
                      <p class="lead">MARKETING DEPT: </p>
                      <p>PREPARED BY: </p>
                      <p>NAME: </p>
                      <p>TITLE: </p>
                      <p>DATE: </p>   
                      <p>TIME: </p>
                      <p>SIGNATURE : </p>
                    </div>
                    <div class="col-6">
                      <p style="font-weight:bold">WAPOMEDIA</p>
                      <p>.</p>
                      <p>.</p>
                      <p>N MKURUGENZI</p>
                      <p>.</p>
                      <p>.</p>
                      <p>.</p>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-6">
                      <p class="lead">PROGRAMS AND CONTENT: </p>
                      <p>RECEIVED AND APPROVED BY: </p>
                      <p>NAME: </p>
                      <p>TITLE: </p>
                      <p>DATE: </p>
                      <p>TIME: </p>
                      <p>SIGNATURE: </p>
                    </div>
                    <div class="col-6">
                      <p style="font-weight:bold">WAPOMEDIA</p>
                      <p>.</p>
                      <p>.</p>
                      <p>.</p>
                      <p>.</p>
                      <p>.</p>
                      <p>.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  <!-- /.content -->

</div>
<!-- ./wrapper -->
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>