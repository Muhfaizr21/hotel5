<?php 

include "koneksi.php";
// $sql = "SELECT kamar.no_kamar, kamar.tipe_kamar, kamar.harga_kamar, fasilitas_kamar.fasilitas 
//         FROM kamar 
//         RIGHT JOIN fasilitas_kamar 
//         ON kamar.no_kamar = fasilitas_kamar.no_kamar;";
$sql = "SELECT * FROM reservasi";
$result = mysqli_query($link, $sql);


// if(isset($_POST['cari'])) {
//     $txtCari = $_POST['txtCari'];

//     $sql = "SELECT * from reservasi where nama like '%".$txtCari."%'  order by nama asc";
//     mysqli_query($link, $sql);
// }

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
            <h1 class="m-0">Data Reservasi Hotel Hebat</h1>
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
          <div class="col-12">
          <!-- <a href="add-kamar.php" class="btn btn-primary col-md-12 mb-3">Tambah Data Reservasi</a> -->
          <form method="get">
            <input type="date" name="dari" class="col-md-2 d-inline form-control">
            <!-- <input type="date" name="ke" class="col-md-2 d-inline form-control"> -->
            <button type="submit" name="find" class="btn btn-info">Cari</button>
          </form>
            <div class="card">
                  <form method="get">
              <div class="card-header">
                <h3 class="card-title">Reservasi</h3>
                <?php if(isset($_GET['nama'])){
                      $nama = $_GET['nama'];
                      $result = mysqli_query($link, "SELECT * FROM reservasi WHERE nama LIKE '%".$nama."%'");
                    } ?>
                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="nama" id="search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" name="cari" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="table">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Nik</th>
                      <th>Telp</th>
                      <th>Tanggal Awal</th>
                      <th>Tanggal Akhir</th>
                      <th>Tipe Kamar</th>
                      <th>Nomor Kamar</th>
                      <!-- <th class="col-md-2 text-center">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($_GET['dari'])){
                      $tgl_cekin = $_GET['dari'];
                      $result = mysqli_query($link, "SELECT * FROM reservasi WHERE tgl_cekin LIKE '%".$tgl_cekin."%'");
                    }
                    while($data = mysqli_fetch_array($result)) {
                    if($data['tipe_kamar'] == 1){
                      $tipe_kamar = "Standart Room";
                    }
                    if($data['tipe_kamar'] == 2){
                      $tipe_kamar = "Superrior Room";
                    }
                    if($data['tipe_kamar'] == 3){
                      $tipe_kamar = "Deluxe Room";
                    }?>
                    <tr>
                      <td><?= $data['nama']; ?></td>
                      <td><?= $data['nik']; ?></td>
                      <td><?= $data['telp']; ?></td>
                      <td><?= $data['tgl_cekin']; ?></td>
                      <td><?= $data['tgl_cekout']; ?></td>
                      <td><?= $tipe_kamar; ?></td>
                      <td><?= $data['kamar']; ?></td>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
<script>
    function find(){
        var input, filter, table, tr, td, tgl, i, txtValue;
        input = document.getElementById("search")
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");

        for(i = 0; i < tr.length; i++){
          td = tr[i].getElementsByTagName("td")[0];
          tgl = tr[i].getElementsByTagName("td")[3];
          if(td){
            txtValue = td.textContent || td.innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";

            }
          }
          
          if(tgl){
            tglValue = tgl.textContent || tgl.innerText;
            if(txtTgl.toUpperCase().indexOf(filter) > -1){
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";

            }
          }
        }
      }
</script>
</body>
</html>
