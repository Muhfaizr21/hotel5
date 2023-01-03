<?php 

include "koneksi.php";

session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: pesan.php");
}
 
if (isset($_POST['masuk'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM tamu WHERE email='$email' AND password='$password'";
    $result = mysqli_query($link, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php#kamar");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
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
        background: url(img/bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .card {
        width: 30rem;
        padding: 2rem;
        margin-top: 100px;
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
                        <h5 class="card-title text-center mb-2">Login Disini</h5>
                        <hr>
                        <p class="card-subtitle mb-2 text-center text-muted">Pastikan sudah login sebelum memulai reservasi online!</p>
                        <br>
                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="w-100 text-center">
                        <button type="submit" name="masuk" class="btn btn-primary mt-2 col-md-4 ms-auto">Login</button>
                        <br>
                        <br>
                        <p>Or</p>
                        <a href="registrasi-tamu.php">Sign Up</a>
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