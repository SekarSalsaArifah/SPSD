<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Dinas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('plugins/fontawesome-free/css/all.min.css');?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/css/adminlte.css');?>">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png');?>">
    <!-- CSS Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <?php
      $nama_instansi = $this->session->userdata('nama_instansi');
    ?>
    <ul class="navbar-nav ml-auto mr-3" style="color:grey">
    <div class="d-flex" style="align-items: center;">
      <?php
      if (!empty($nama_instansi)) {
          echo "<h4> $nama_instansi</h4>";
      } else {
          echo "";
      }
      ?>
    </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url("dashdinas")?>" class="brand-link">
      <img src="<?=base_url('assets/img/logo.png')?>" alt="Logo" class="brand-image elevation-3 mr-2" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('dashdinas')?>" class="nav-link">
              <i class="nav-icon fa fa-home active"></i> 
              <p>Home</p>
            </a>
          </li>
          <li class="logout nav-item">
            <a href="<?=base_url('login/aksi_logout')?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i> 
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Page Content  -->
    <div id="content" class="">
      <?=$contents?>
    </div>
</div>
    </tbody>
</table>

<!-- jQuery -->
<script src="<?=base_url('plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?=base_url('plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE -->
<script src="<?=base_url('dist/js/adminlte.js');?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url('plugins/chart.js/Chart.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('dist/js/pages/dashboard3.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/js/popper.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/js/main.js');?>"></script>
    <!-- JS Data Table -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>new DataTable('#datatable');</script>
    <!-- /JS Data Table -->

    <script type="text/javascript">
        $(document).ready(function () {
            $(".alert").hide().fadeIn(0, function () {
                window.setTimeout(function () {
                    $(".alert").animate({
                        opacity: 1,
                        top: 0,
                    }, 1000, function () {
                    });
                },0);
                window.setTimeout(function () {
                    $(".alert").animate({
                        opacity: 0,
                        top: -80,
                    }, 1700, function () {
                        $(this).remove();
                    });
                }, 5000);
            });
        });
    </script>
</body>
</html>
