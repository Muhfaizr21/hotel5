<?php 
error_reporting(0);
include "koneksi.php";
session_start();
$tamu = $_SESSION['username'];




$no_kamar = $_GET['no_kamar'];
$sql = "SELECT * FROM kamar WHERE no_kamar='$no_kamar'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
if($data['tipe_kamar'] == 1){
    $tipe_kamar = "Standart Room";

} else if ($data['tipe_kamar'] == 2){

    $tipe_kamar = "Superrior Room";

} else {
    $tipe_kamar = "Deluxe Room";
}

// $sql = "SELECT * FROM fasilitas_kamar where "
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $telp = $_POST['telp'];
    $kamar = $_POST['kamar'];
    $tgl_cekin = $_POST['tgl_cekin'];
    $tgl_cekout = $_POST['tgl_cekout'];
    $tipe_kamar = $_POST['tipe_kamar'];

    $sql = "INSERT INTO reservasi(nama, nik, telp, tgl_cekin, tgl_cekout, tipe_kamar, kamar)
            VALUES('$nama', '$nik', '$telp', '$tgl_cekin', '$tgl_cekout', '$tipe_kamar', '$kamar')";
    mysqli_query($link, $sql);
    header("location: berhasil-pesan.php");
}


$queryTamu = "SELECT * FROM tamu WHERE username='$tamu'";
$tamuhotel = mysqli_query($link, $queryTamu);
$tamu = mysqli_fetch_array($tamuhotel);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Hotel Hebat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>

    <?php include "navbar.php"; ?>

    <style>
        body {
            background-color: #eff;
        }

        #kamar {
            margin-top: 100px;
        }
    </style>

    <section id="kamar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow p-4">
                        <div class="card-body">
                             <h1 class="mb-3">Pesan Kamar</h1>
                             <hr>
                            <form method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                    <input type="text" required value="<?php echo $_SESSION['username']; ?>" name="nama" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">NIK</label>
                                    <input type="number" value="<?php echo $tamu['nik']; ?>" required name="nik" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress" class="form-label">Telepon</label>
                                    <input type="number" value="<?php echo $tamu['telp']; ?>" required name="telp" class="form-control" id="inputAddress" placeholder="08...">
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress2" class="form-label">No Kamar</label>
                                    <input type="number" required name="kamar" value="<?= $data['no_kamar']; ?>" class="form-control" id="inputAddress2" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputState" class="form-label">Tipe Kamar</label>
                                    <select id="inputState" name="tipe_kamar" class="form-select">
                                    <option selected value="<?= $data['tipe_kamar']; ?>"><?= $tipe_kamar; ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Tanggal Check-in</label>
                                    <input type="date" required name="tgl_cekin" value="<?php echo date('Y-m-d') ?>" class="form-control" id="inputCity">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputZip" class="form-label">Tanggal Check-out</label>
                                    <input type="date" required name="tgl_cekout" value="<?php echo date('Y-m-d',strtotime("+1 day")) ?>" class="form-control" id="inputZip">
                                </div>
                                <div class="col-12 text-center pt-4">
                                    <button type="submit" name="tambah" class="btn btn-primary w-50">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center mt-5">
            <div class="row">
                <div class="col d-flex justify-content-center flex-wrap">
                    <?php while($data = mysqli_fetch_array($result)) {?>
                    <div class="card m-4 shadow-sm" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Kamar <?= $data['no_kamar']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Rp. <?= $data['harga_kamar']; ?></h6>
                            <p class="card-text">Kamar tipe <?= $tipe_kamar; ?>, Ayo pesan segera.</p>
                            <a href="pesan.php?no_kamar<?php echo $data['no_kamar'] ?>" class="card-link">Pesan</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>