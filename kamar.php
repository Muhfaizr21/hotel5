<?php 
error_reporting(0);
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login-tamu.php");
}
$tipe_kamar = $_GET['tipe_kamar'];
$sql = "SELECT * FROM kamar where tipe_kamar='$tipe_kamar'";
$result = mysqli_query($link, $sql);

// $sql = "SELECT * FROM fasilitas_kamar where "

// $data = mysqli_fetch_array($result);

// $sqlfas = "SELECT * FROM fasilitas_kamar where tipe_kamar='$tipe_kamar'";
// $resultfas = mysqli_query($link, $sqlfas);

if($tipe_kamar == 1){
    $tipe = "Standart Room";

} else if ($tipe_kamar == 2){

    $tipe = "Superrior Room";

} else {
    $tipe = "Deluxe Room";
}

$query = "SELECT * FROM fasilitas_kamar WHERE tipe_kamar='$tipe_kamar'";
$faskamar = mysqli_query($link, $query);
// $kamar = mysqli_fetch_array($faskamar);

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
        #kamar {
            margin-top: 40px;
        }
    </style>

    <section class="tipekamar mt-5 pt-5 text-center">
        <h3 class="text-center">Kamar Tipe <?= $tipe; ?> Yang Tersedia</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary text-center mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Lihat Fasilitas
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fasilitas Kamar <?= $tipe; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol class="text-start">
                        <?php while($kamar = mysqli_fetch_array($faskamar)) {?>
                        <li><?= $kamar['fasilitas']; ?></li>
                        <?php } ?>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kamar">
        <div class="container text-center mt-2">
            <div class="row">
                <div class="col d-flex justify-content-center flex-wrap">
                    <?php while($data = mysqli_fetch_array($result)) {?>
                    <div class="card m-4 shadow-sm" style="width: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Kamar <?= $data['no_kamar']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Rp. <?= $data['harga_kamar']; ?></h6>
                            <p class="card-text">Ayo pesan segera.</p>
                            <a href="pesan.php?no_kamar=<?php echo $data['no_kamar'] ?>" class="card-link">Pesan</a>
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