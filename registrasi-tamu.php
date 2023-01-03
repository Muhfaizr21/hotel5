<?php 

include "koneksi.php";

if(isset($_POST['daftar'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $username = $_POST['nama'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tamu(nik, nama, telp, email, username, password) 
    VALUES('$nik', '$nama', '$telp', '$email', '$username', '$password')";

    mysqli_query($link, $sql);

    echo "<script>alert('Berhasil mendaftar')</script>";
    header("location: login-tamu.php");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Hebat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
<?php include "navbar.php"; ?>

<style>
    body {
        background: url(assets/img/jumbotron.jpg);
        background-position: center;
        background-size: cover;
    }

    #jumbotron {
        width: 100%;
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .card {
        width: 30rem;
        padding: 1rem;
        margin-top: 80px;
        margin-bottom: 20px;
        background: #fff;
        backdrop-filter: blur(10px);
    }
</style>

<section id="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-2">Daftar Sebagai Tamu</h5>
                        <hr> 
                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nik</label>
                            <input type="number" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Telepon</label>
                            <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputPassword1">
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="w-100 text-center">
                        <button type="submit" name="daftar" class="btn btn-primary mt-2 col-md-4 ms-auto">Daftar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>