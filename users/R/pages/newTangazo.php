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
  
  $getCompany = "SELECT * FROM tangazoowner";
  $results = mysqli_query($conn,$getCompany);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WAPORADIO | newAd</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
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
      <img src="../../../dist/img/w.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Wapo Mission</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/img/p.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="../profile.php" class="d-block"><?php echo $_SESSION['USER_NAME']; ?></a>
        <a href="../../../action.php?out_admin='true'" class="d-block">Log Out</a>
        <a href="../profile.php"><i class="far fa-dot-circle nav-icon"></i><span style="margin-left: 10px">Profile</span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="../reception.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Ad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../reception.php">Home</a></li>
              <li class="breadcrumb-item active">Register Ad</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary"> 
              <div class="card-header">
                <p class="card-title" id="errorss" styles="color:red"></p>
              </div>
              <div class="card-body">
                <button id="ExistingCompany">Existing Company</button>
                <button id="NewCompany">New Company</button>
                 <!-- action="../../../action.php" method="post"  id="ad_registration"-->
                <form method="POST" action="../../../action.php" method="post">
                <!-- <form> -->
                <div id="companyExists" class="form-group">
                  <label>Choose Company Name</label>
                  <select name="cmpny" class="form-control select2" style="width: 100%;" id="cnameOption">
                    <option value="0" selected="selected">Select Company</option>
                    <?php 
                      $required = '';
                        while($row = mysqli_fetch_array($results)){
                          echo '<option value="'.$row['id'].'">'.$row['ownerName'].'</option>';
                        }
                      // if (mysqli_num_rows($results) <= 0) {
                      //   echo '<select name="cmpny" class="form-control select2" style="width: 100%;" id="cnameOption">';
                      //   echo '<option value="0" selected="selected">No company registered at the moment, select \'New company\' to register</option>';
                      //   echo '</select>';
                      // }else{
                      //   echo '<select name="cmpny" class="form-control select2" style="width: 100%;" id="cnameOption">';
                      //   echo '<option value="0" selected="selected">No company registered at the moment, select \'New company\' to register</option>';
                      //   while($row = mysqli_fetch_array($results)){
                      //     echo '<option value="'.$row['id'].'">'.$row['ownerName'].'</option>';
                      //   }
                      //   echo '</select>';
                      // }
                    ?>
                    </select>
                </div>
                <div id="companyNew" class="form-group">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                          <label for="exampleInputEmail1">Enter Company Name</label>
                          <input type="text" name="cname" class="form-control" placeholder="Enter ..." id="cname" <?php echo $required ?>>
                        </div>      
                        <div class="form-group">
                          <label for="exampleInputAddress">Phone Number</label>
                          <input type="text" name="cphone" class="form-control" placeholder="Enter Phone" <?php echo $required ?> id="phone">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="text" name="cemail" class="form-control" placeholder="Enter email" <?php echo $required ?> id="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputAddress">Address</label>
                          <input type="text" name="caddress" class="form-control" placeholder="Enter Address" <?php echo $required ?> id="address">
                        </div>  
                      </div>
                        <div class="col">
                        <div class="form-group">
                        <label for="exampleInput">CONTACT PERSON DETAILS</label>
                        <div class="form-group">
                        <label for="exampleInputName">Conatct Person Name</label>
                        <input type="text" name="cpname" class="form-control" placeholder="Enter Address" <?php echo $required ?> id="cpName">
                        <label for="exampleInputAddress">Conatct Person Phone</label>
                        <input type="text" name="cpphone" class="form-control" placeholder="Enter Phone" <?php echo $required ?>id="cpPhone">
                        <label for="exampleInputEmail">Conatct Person Email</label>
                        <input type="email" name="cpemail" class="form-control" placeholder="Enter Email" <?php echo $required ?> id="cpEmail">
                      </div>
                        </div>
                      </div>
                      
                      </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                  <label>Ad Name</label>
                  <input type="text" name="tname" class="form-control" placeholder="Enter ..." required id="adName">
                </div>
                <div class="form-group">
                  <div class="row">
                  <div class="col-6">  
                  <label>Ad Cost</label>
                  <input type='currency' name="tcost" class="form-control" placeholder="Enter Ad Costs.." required id="adCost">
                  </div>
                  <div class="col-6">  
                  <label>Payment Method</label>
                  <select style='width:105px' name='costType' class='form-control select2' style='width: 100%;' id='cnameOption'>
                        <option value='Cash' selected='selected'>Cash</option>
                        <option value='Mobile Money'>Mobile Money</option>
                        <option value='Bank'>Bank</option>
                  </select>
                  </div>
                  </div>
                </div>
                <!-- Date range -->
                <div class="form-group">
                  <label>Ad Play Date range: FRMO - TO</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="fromto" class="form-control float-right" id="reservation" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="card-footer">
                  <button type="submit" name="saveData" class="btn btn-primary" id="post">Submit</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="#">WAPORADIO</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- Page script -->



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>



<script>
  $(document).ready(function(){
    $("#companyExists").hide();
    $("#companyNew").hide();
    $("#ExistingCompany").click(function(){
      $("#companyNew").hide();
      $("#companyExists").show();
      $y = true;
      $x = false;
    });
    $("#NewCompany").click(function(){
      $("#companyExists").hide();
      $("#companyNew").show();
      $x = true;
      $y = false;
    });

    $('#ad_registration').on('submit', function(event){
      event.preventDefault();
      if($y == true){
        if($('#cnameOption').val() != '' && $('#adName').val() != '' && $('#adCost').val() != '' && $('#reservation').val() != ''){
          
          var formData = $(this).serialize();
          $.ajax({
            url: 'insertAd.php',
            method: 'POST',
            data: formData,
            success: function(data){
              console.log(data);
            }
          });
        }else{
          alert('choose option for company is empty');
        }  
      }

      if($x == true){
        if($('#cname').val() != '' && $('#phone').val() != '' && $('#email').val() != '' && $('#address').val() != '' && $('#cpname').val() != '' && $('#cpPhone').val() != '' && $('#cnEmail').val() != '' && $('#cname').val() != '' && $('#adName').val() != '' && $('#adCost').val() != '' && $('#reservation').val() != ''){
          var formData = $(this).serialize();
          $.ajax({
            url: 'insertAd.php',//../../../action.php
            method: 'POST',
            data: formData,
            success: function(data){
              console.log(data);
            }
          });
        }else{
          alert('All data fields for new company are epmty');
        }
      }
    });
});
</script>
</body>
</html>