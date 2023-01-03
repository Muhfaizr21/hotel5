<?php 

include "koneksi.php";
// $sql = "SELECT kamar.no_kamar, kamar.tipe_kamar, kamar.harga_kamar, fasilitas_kamar.fasilitas 
//         FROM kamar 
//         RIGHT JOIN fasilitas_kamar 
//         ON kamar.no_kamar = fasilitas_kamar.no_kamar;";
$id_fasilitas = $_GET['id_fasilitas'];
$sql = "SELECT * FROM fasilitas_kamar where id_fasilitas='$id_fasilitas'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);


if(isset($_POST['hapus'])) {
    $no_kamar = $_POST['no_kamar'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $fasilitas = $_POST['fasilitas'];

    $sql = "DELETE FROM fasilitas_kamar where id_fasilitas='$id_fasilitas'";

    mysqli_query($link, $sql);

    header("location: fasilitas-kamar.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include "navbar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  <?php include "sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Fasilitas Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Fasilitas Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kamar</label>
                    <input type="number" name="no_kamar" value="<?= $data['no_kamar']; ?>" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectBorder">Tipe Kamar</label>
                  <select class="custom-select form-control-border" name="tipe_kamar" id="exampleSelectBorder" value="<?= $data['tipe_kamar']; ?>">
                    <option value="1">Standart Room</option>
                    <option value="2">Superrior Room</option>
                    <option value="3">Deluxe Room</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fasilitas</label>
                    <input type="text" value="<?= $data['fasilitas']; ?>" name="fasilitas" class="form-control" id="exampleInputEmail1" placeholder="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  
  <?php include "footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
