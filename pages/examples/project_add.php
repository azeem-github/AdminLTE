<?php 
session_start();
?>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'admins');

  $errorproject_name='';
  $errorproject_description ='';
  $errorstatus='';
  $errorclient_company='';
  $errorproject_leader='';
  $errorestimated_budget='';
  $errortotal_amount='';
  $errorestimated_duration='';


  if(isset($_POST['submit'])) {

    $project_name = $_POST['project_name'];
    $project_description = $_POST['project_description'];
    $status = $_POST['status'];
    $client_company = $_POST['client_company'];
    $project_leader = $_POST['project_leader'];
    $estimated_budget = $_POST['estimated_budget'];
    $total_amount = $_POST['total_amount'];
    $estimated_duration = $_POST['estimated_duration'];

    if(empty($project_name)){
    $errorproject_name .= "Project name Is Required";
}

if(empty($project_description)){
$errorproject_description .= "Project description Is Required";
}
if(empty($status)){
$errorstatus .= "Status Is Required";
}
if(empty($client_company)){
$errorclient_company .= "Client company Is Required";
}
if(empty($project_leader)){
$errorproject_leader .= "Project leader Is Required";
}
if(empty($estimated_budget)){
$errorestimated_budget .= "Estimated budget Is Required";
}
if(empty($total_amount)){
$errortotal_amount .= "Total_amount Is Required";
}
if(empty($estimated_duration)){
$errorestimated_duration .= "Estimated_duration Is Required";
}

$query = "INSERT INTO projects (project_name, project_description, status, client_company, project_leader, estimated_budget, total_amount, estimated_duration) VALUES('$project_name', '$project_description', '$status', '$client_company', '$project_leader', '$estimated_budget', '$total_amount', '$estimated_duration')";
$submit = mysqli_query($conn, $query);

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE | Project Add</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
 

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- SidebarSearch Form -->     

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
                
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="./data.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>DataTables</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="./project_add.php" class="nav-link">
                <i class="fa fa-plus"></i>
                <p>Project Add</p>
              </a>
            </li>           
        <li class="nav-item">
          <a href="./login.php" class="nav-link">
            <i class=" fas fa-lock"></i>
            <p> Login</p>
          </a>
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
            <h1>Project Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" name="project_name" id="inputName" class="form-control">
                <span style="color:red";><?php echo $errorproject_name;?></span>
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="project_description"
                class="form-control" rows="4"></textarea>
                <span style="color:red";><?php echo $errorproject_description;?></span>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="status"class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div>
              <span style="color:red";><?php echo $errorstatus;?></span>
              <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" name="client_company" id="inputClientCompany" class="form-control">
              </div>
              <span style="color:red";><?php echo $errorclient_company;?></span>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" name="project_leader" id="inputProjectLeader" class="form-control">
              </div>
              <span style="color:red";><?php echo $errorproject_leader;?></span>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" name="estimated_budget" id="inputEstimatedBudget" class="form-control">
              </div>
              <span style="color:red";><?php echo $errorestimated_budget;?></span>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" name="total_amount" id="inputSpentBudget" class="form-control">
              </div>
              <span style="color:red";><?php echo $errortotal_amount;?></span>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" name="estimated_duration" id="inputEstimatedDuration" class="form-control">
              </div>
              <span style="color:red";><?php echo $errorestimated_duration;?></span>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="./index.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
