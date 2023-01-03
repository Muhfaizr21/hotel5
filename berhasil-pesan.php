<?php 
error_reporting();
include "koneksi.php";
session_start();
$tamu = $_SESSION['username'];
$sql = "SELECT * FROM reservasi where nama='$tamu'";
$result = mysqli_query($link, $sql);

// $sql = "SELECT * FROM fasilitas_kamar where "

// $data = mysqli_fetch_array($result);


// if($data['tipe_kamar'] == 1){
//     $tipe_kamar = "Standart Room";

// } else if ($data['tipe_kamar'] == 2){

//     $tipe_kamar = "Superrior Room";

// } else {
//     $tipe_kamar = "Deluxe Room";
// }

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
            margin-top: 100px;
        }

        .data-reservasi .card {
            transition: all 0.7s ease;
        }

        .data-reservasi .card:hover {
            background-color: #0F3560;
            transform: translateY(-15px);
            color: #fff;
        }
    </style>

    <section id="kamar">
        <div class="container">
            <div class="row">
                <h1 class="mb-3">Data Reservasi Kamu</h1>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            Ini adalah data reservasi yang sudah kamu lakukan. <br> Untuk melakukan pembayaran secara langsung, kamu bisa mencetak bukti reservasi dan membawa KTP untuk diberikan kepada resepsionis.
                            <br>
                            <form method="get">
                                <br>
                                  <label for="exampleSelectBorder">Data Reservasi Terbaru :</label>
                                <?php if(isset($_GET['terbaru'])){
                                      $new = $_GET['terbaru'];
                                      $result = mysqli_query($link, "SELECT * FROM reservasi WHERE nama='$tamu' AND tgl_cekin LIKE '%".$new."%'");
                                    } ?>
                                <div class="form-group col-md-2 d-flex">
                                  
                                  <input type="text" value="<?= date('Y-m-d') ?>" name="terbaru" class="form-control me-3" style="position: absolute; opacity: 0; z-index: -99;" readonly></input>
                                  <button type="submit" class="btn btn-secondary mt-2">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center d-flex justify-content-center text-center w-100 m-auto">
            <div class="row mb-5">
                <?php
                 while($data = mysqli_fetch_array($result)) {
                    if($data['tipe_kamar'] == 1){
                        $tipe_kamar = "Standart Room";

                    } else if ($data['tipe_kamar'] == 2){

                        $tipe_kamar = "Superrior Room";

                    } else {
                        $tipe_kamar = "Deluxe Room";
                    }?>
                <div class="col mt-4 data-reservasi">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama']; ?></h5>
                            <h6 class="card-subtitle mb- text-secondary"><?= $tipe_kamar; ?></h6>
                            <p class="card-text">Klik link dibawah untuk mencetak bukti reservasi online kamu.</p>
                            <a href="cetak.php?id=<?= $data['id']; ?>" class="card-link btn btn-primary">Cetak</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>