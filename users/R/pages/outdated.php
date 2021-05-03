<?php 
require '../../../action.php';
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../../index.php');
	exit;
}

$now = time(); // Checking the time now when home page starts.
if ($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: ../../../index.php');
}

//Retrieve all matangazo
$sql = "SELECT * FROM matangazo WHERE statuss = 'Deactive' ORDER BY id DESC";
$results = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Refresh page automatically  -->
  <meta http-equiv="refresh" content="5">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPORADIO | Outdated Ads</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../reception.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./newTangazo.php" class="nav-link">New Ad</a>
      </li>
    </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="../profile.php"><h4 style="color:green">Reception</h4></a>
    </li>
</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../reception.php" class="brand-link">
      <img src="../../../dist/img/w.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Wapo Mission</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="../profile.php"><img src="../../../dist/img/p.jpg" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
        <a href="../profile.php" class="d-block"><?php echo $_SESSION['USER_NAME']; ?></a>
        <a href="../../../action.php?out_admin='true'" class="d-block">Log Out</a>
        <a href="../profile.php"><i class="far fa-dot-circle nav-icon"></i><span style="margin-left: 10px">Profile</span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./matangazo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./active.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./pending.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outated Ads</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../reception.php">Home</a></li>
              <li class="breadcrumb-item active">Outdated Ads</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Outdated Ads</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="table_id" class="display table table-hover text-nowrap">
                <thead>
                <?php 
                  if ($results->num_rows > 0) {
                   echo '<tr>
                   <th>No</th>
                   <th>Ad Name</th>
                   <th>Ad Owner</th>
                   <th>Status</th>
                   <th>Action</th>
                 </tr>'; 
                  }
                ?>
                </thead>
                <tbody>
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
                    $url1 = '../../../action.php?moreR=0';
                    $more = "More";

                    $forLink = 0;
                    
                    $more = "More";
                    $NO = 1;
                    if ($results->num_rows > 0) {
                      while($row = $results->fetch_assoc()) {
                        $ownerId = $row["ownerFk"];
                        $forLink = $row["id"];
                        
                        $url = add_or_update_params($url1,'more',$forLink);
                        $link = 'href="'.$url.'"';
                            
                        $date2=$row["playFrom"];
                        $date1=$row["playTo"];
                        $date1 = strtotime($date1);
                        $date2 = strtotime($date2);
                        $diff = $date1 - $date2;
                        $diff = round($diff / (60 * 60 * 24));
                        if($diff == 0){
                          $diff = 1;
                        }
                        $class = '';//put dynamic colors based on number of days remained

                        $ownerQry = "SELECT ownerName FROM tangazoowner WHERE id = '$ownerId'";
                        $ownerName = $conn->query($ownerQry);
                        if($ownerName->num_rows > 0){
                          while($nameOwner = $ownerName->fetch_assoc()){
                            $ownerNamee = $nameOwner["ownerName"];
                          }
                        }
                        echo "<tr><td>" . $NO. "</td><td>". $row["tangazoName"]."</td><td>". $ownerNamee."</td><td>". $row["statuss"]."</td><td><a $link>$more</a></td>";
                        $NO++;
                      }
                    } else {
                      echo '<tr><td><h6 style="color:red">No Outdated Ad at the moment...</h6></td></tr>';
                    }
                    $conn->close();
                  ?>
                  </tr>
                </tbody>
              </table>

              <!-- Modal -->
              <div id="myModal" class="modal">
                <div class="modal-dialog">
                <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">WAPORADIO</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>
$(document).ready( function () {
    $('#table_id').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search Tangazo",
        }
    });
} );
</script>
<script>
  function loaddata(){
    var user = 1;
    $.ajax({
      type: 'post',
      url: '../../../automaticCheck.php', 
      data: {
      user_id:user,
      },
      success: function (response) { 
        // $('#user_msg').html(response);
      }
    });
  }
  $(document).ready(function(){
    loaddata();
    setInterval(function(){
      loaddata();
    }, 1000);
  });     
</script>
</body>
</html>