<?php 

include "koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * FROM reservasi WHERE id='$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
if($data['tipe_kamar'] == 1){
    $tipe = "Standart Room";

} else if ($data['tipe_kamar'] == 2){

    $tipe = "Superrior Room";

} else {
    $tipe = "Deluxe Room";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<body>
    <div class="container p-5 w-100 border rounded mt-4">
        <h2 class="text-center">Bukti Reservasi Online</h2>
        <br>
        <br>
        <p>Data reservasi online kamu :</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data['nama']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $data['nik']; ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><?= $data['nama']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Checkin</td>
                <td>:</td>
                <td><?= $data['tgl_cekin']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Checkout</td>
                <td>:</td>
                <td><?= $data['tgl_cekout']; ?></td>
            </tr>
            <tr>
                <td>Tipe Kamar</td>
                <td>:</td>
                <td><?= $tipe; ?></td>
            </tr>
            <tr>
                <td>Nomor Kamar</td>
                <td>:</td>
                <td><?= $data['kamar']; ?></td>
            </tr>
        </table>
        <br>
        <br>
        <p>Cetak bukti reservasi ini dan sertakan KTP untuk melakukan reservasi ulang secara langsung.</p>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>