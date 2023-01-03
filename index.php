<?php

use LDAP\Result;

include "koneksi.php";

$sql = "SELECT * from fasilitas_hotel";
$result = mysqli_query($link, $sql);

$sqlfaskamar = "SELECT * from fasilitas_kamar";
$resultfaskamar = mysqli_query($link, $sqlfaskamar);

$sqlkamar = "SELECT * from kamar";
$resultkamar = mysqli_query($link, $sqlkamar);
$datakamar = mysqli_fetch_array($resultkamar);

?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php"; ?>

<body>

<!-- Ini Navbar -->

<?php include "navbar.php"; ?>

<!-- Container -->

<section id="jumbotron" class="pe-4 ps-4">
    <div class="container jumbotron">
        <div class="row justify-content-between">
            <div class="col-6">
                <h1 class="text-jumbotron text-light p-4 text-title">Selamat Datang di <br> Hotel Hebat</h1>
                <p class="p-jumbotron text-light p-4">
                    Hotel bintang 5 dengan fasilitas lengkap dan sertifikasi halal
                </p>
            </div>
            <div class="col-4">
                <!--  -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-available">
                    <div class="row align-items-center row-av">
                        <div class="col">
                        <h6>Date</h6>
                        <form action="" method="post" class="form-av">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mt-1 me-1" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> -->
                            <input type="date" value="<?php echo date('Y-m-d') ?>" class="form-group input-av">
                        </form>
                        </div>
                        <div class="col">
                            <h6>Date Check</h6>
                        <form action="" method="post" class="form-av">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mt-1 me-1" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> -->
                            <input type="date" value="<?php echo date('Y-m-d',strtotime("+1 day")) ?>" class="form-group input-av">
                        </form>
                        </div>
                        <div class="col">
                            <h6 class="pt-2">Price</h6>
                            <p>$100-$200</p>
                        </div>
                        <div class="col text-end w-100">
                            <a href="check-available.php" class="btn btn-primary" style="width: 150px;">Check Available</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container about text-center">
        <div class="row">
            <div class="col d-flex kolom-about">
                <div class="gambar gambar1">
                    <img src="assets/img/about1.jpg" height="400px" alt="">
                </div>
                <div class="gambar gambar2">
                    <img src="assets/img/about2.jpg" height="400px" alt="">
                </div>
                <div class="gambar gambar3">
                    <img src="assets/img/about3.jpg" height="400px" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center  fasilitas-hotel" id="fasilitas-hotel">
                <h1 class="mb-5">Tentang Hotel Hebat</h1>
                <p class="mb-4">Hotel Hebat adalah hotel bintang 5 dengan fasilitas yang cukup lengkap dan sertifikasi halal.<br> Selain itu juga, Hotel Hebat adalah hotel bintang 5 dengan harga yang cukup terjangkau, sehingga ini membuat Hotel Hebat menjadi hotel langganan semua orang. </p>
                <style>
                    .fasilitas {
                        background: #fff;
                        text-align: left;
                        height: 300px;
                        padding: 20px;
                        border-radius: 8px;
                        width: 80%;
                        margin: auto;
                        margin-top: 20px;
                    }

                    .fasilitas ul {
                        width: 50%;
                        margin: auto;
                        text-align: left;
                        background: #fff;
                    }

                    /* .fasilitas ul li {
                        list-style: ;
                    } */
                </style>
                <div class="fasilitas text-center shadow">
                    <h4>Fasilitas Hotel</h4>
                    <hr>
                    <ul>
                        <?php while($data = mysqli_fetch_array($result)) {?>
                        <li><?= $data['fasilitas']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="kamar">
    <div class="container text-center">
        <div class="row">
            <style>
                .title-tipe {
                    margin-top: 100px;
                    margin-bottom: 5rem;
                }
            </style>
            <div class="col title-tipe">
                <h1>Tipe Kamar Yang Tersedia</h1>
            </div>
        </div>
        <style>
            .card-tipe {
                height: 300px;
                margin-bottom: 100px;
            }

            #kamar:hover .tipe .card {
                animation: puter 1s ease-in-out;
            }

            @keyframes puter{
                0% {
                    transform: rotate(0);
                }
                50% {
                    transform: rotate(27deg);
                }
                75% {
                    transform: rotate(-27deg);
                }
                100% {
                    transform: rotate(0);
                }
            }
        </style>
        <div class="row tipe">
            <div class="col d-flex justify-content-center">
                <div class="card card-tipe shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Standart Room</h5>
                        <p class="card-text">Kamar dengan luas dan fasilitas yang cukup dengan harga yang terjangkau.</p>
                        <a href="kamar.php?tipe_kamar=<?= 1; ?>" class="card-link text-center">Lihat Kamar</a>
                        
                    </div>
                    <img src="assets/img/building.png" alt="" width="200px" style="margin: auto; position: absolute; bottom: -10px;left: 50px;">
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card card-tipe shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Superrior Room</h5>
                        <p class="card-text">Kamar lebih luas dan fasilitas lebih lengkap dengan harga yang masih terjangkau.</p>
                        <a href="kamar.php?tipe_kamar=<?= 2; ?>" class="card-link text-center">Lihat Kamar</a>
                        
                    </div>
                    <img src="assets/img/building.png" alt="" width="200px" style="margin: auto; position: absolute; bottom: -10px;left: 50px;">
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card card-tipe shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Kamar yang luas dan fasilitas yang sangat lengkap dengan harga premium.</p>
                        <a href="kamar.php?tipe_kamar=<?= 3; ?>" class="card-link text-center">Lihat Kamar</a>
                        
                    </div>
                    <img src="assets/img/building.png" alt="" width="200px" style="margin: auto; position: absolute; bottom: -10px;left: 50px;">
                </div>
            </div>
        </div>
    </div>
</section>



    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>