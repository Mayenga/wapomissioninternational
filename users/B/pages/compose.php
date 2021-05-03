<?php 
require '../../../action.php';
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.php');
	exit;
}

$noww = time(); // Checking the time now when home page starts.
if ($noww > $_SESSION['expire']) {
    session_destroy();
    header('Location: ../../index.php');
}

$now = date("Y-m-d");
//count all matangazo
$sql1 = "SELECT * FROM matangazo";
$sql5 = "SELECT * FROM matangazo WHERE issueDate = '$now'";
$sql2 = "SELECT * FROM matangazo  WHERE statuss = 'Active'";
$sql3 = "SELECT * FROM matangazo  WHERE statuss = 'Deactive'";
$sql4 = "SELECT * FROM matangazo  WHERE statuss = 'Pending'";

$total_matangazo = mysqli_query($conn,$sql1);
$total_matangazo = mysqli_num_rows($total_matangazo);

$total_matangazo_leo = mysqli_query($conn,$sql5);
$total_matangazo_leo = mysqli_num_rows($total_matangazo_leo);

$total_active  = mysqli_query($conn,$sql2);
$total_active = mysqli_num_rows($total_active);

$total_deactive  = mysqli_query($conn,$sql3);
$total_deactive = mysqli_num_rows($total_deactive);

$total_pending  = mysqli_query($conn,$sql4);
$total_pending = mysqli_num_rows($total_pending); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPORADIO | Mail</title>
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
        <a href="../bshop.php" class="nav-link">Home</a>
      </li>
    </ul> 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="notification"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php 
          $selectmsgs = "SELECT lineup.adpTime,adnotifications.responce,adnotifications.id,adnotifications.status,adnotifications.feedback,matangazo.tangazoName,vipindi.kipindiname FROM adnotifications,lineup,matangazo,vipindi WHERE adnotifications.lineupFk = lineup.id AND lineup.adFk = matangazo.id AND lineup.kipindFk = vipindi.id AND adnotifications.status = 'not read' order by adnotifications.id desc";
          $query = mysqli_query($conn,$selectmsgs);
          while($row = mysqli_fetch_array($query)){ 
              $id = $row['id'];
              echo "<div class='dropdown-divider'></div>
              <a href='./readNotification.php?id=$id' class='dropdown-item'>    
              <div class='media'>
              <div class='media-body'>
                <h3 class='dropdown-item-title'>
                  Mangager
                  <span class='float-right text-sm text-muted'></span>
                </h3>
                <p class='text-sm' style='font-weight:bold'>".$row['kipindiname']."</p>
                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".$row['responce']."</p>
              </div>
            </div></a>";
          }
          ?>
          <a href="./notifications.php" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    <!-- Messages Dropdown Menu -->
   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge msg_count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php 
          $selectmsgs = "SELECT * FROM messages WHERE userFk = 2 AND status = 'not read' order by id DESC";
          $query = mysqli_query($conn,$selectmsgs);
          while($row = mysqli_fetch_array($query)){ 
              $id = $row['id'];
              $Weddingdate = new DateTime($row["time"]);
              $mstime = $Weddingdate->format('d-m-Y H:i');
              echo "<div class='dropdown-divider'></div>
              <a href='./readMail.php?id=$id' class='dropdown-item'>    
              <div class='media'>
              <img src='../../../dist/img/p.jpg' alt='User Avatar' class='img-size-50 img-circle mr-3'>
              <div class='media-body'>
                <h3 class='dropdown-item-title'>
                  Mangager
                  <span class='float-right text-sm text-muted'></span>
                </h3>
                <p class='text-sm' style='font-weight:bold'>".$row['subject']."</p>
                <p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> ".$mstime."</p>
              </div>
            </div></a>";
          }
          ?>
          <a href="./mailbox.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item">
        <h4 style="color:green"><a href="../profile.php">B Shop</a></h4>
      </li>
    </ul>
  </nav> 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../bshop.php" class="brand-link">
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
            <a href="../bshop.php" class="nav-link active">
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
                <a href="./outdated.php" class="nav-link">
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
              <li class="breadcrumb-item"><a href="../bshop.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row">
          <div class="col-md-3">
            <a href="./mailbox.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="./mailbox.php" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right msg_count"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./sents.php" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          
          <div class="col-md-9"> 
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" action="../../../action.php">
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px" required>
                        
                    </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" name="sendMessage" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
              <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<script>
  function loadNotificationscount(){
      var user = 1;
      $.ajax({
        type: 'post',
        url: './getNotificationsCount.php', 
        data: {
        user_id:user,
        },
        success: function (response) { 
          $('#notification').html(response);
        }
      });
    };
    function loadcountInbox(){
      var user = 1;
      $.ajax({
        type: 'post',
        url: './getMessageCount.php',
        data: {
        user_id:user,
        },
        success: function (response) { 
          $('.msg_count').html(response);
        }
      });
    };
  $(document).ready(function(){
    loadNotificationscount();
    loadcountInbox();
    setInterval(function(){
      loadNotificationscount();
      loadcountInbox();
    }, 1000);
  });
</script>
</body>
</html>