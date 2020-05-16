<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require'functions.php';
$username=$_SESSION["username"];
$iklan = query("SELECT * FROM iklan WHERE username='$username';");

// tombol cari ditekan
    if ( isset($_POST["cari"]) ) {
        $iklan = cari($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Penjual</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">

</head>

<body class="wallpaper">
<main class="kotak_daftar">
    <h1>Daftar Iklan</h1>
    <a href="tambah.php">Tambah data iklan</a>
    <br><br>

    <form action="" method="post">
        <input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button class="button" type="submit" name="cari">Cari!</button>
    </form>

    <br>
    <center>
    <table cellpading="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>No. Telepon</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
        
        <?php $i = 1;?>
        <?php foreach ($iklan as $row):?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                <a class="ubah" href="ubah.php?id=<?php echo $row["id"];?>">Ubah</a> |
                <a class="hapus" href="hapus.php?id=<?php echo $row["id"];?>" onclick="return confirm('yakin?')">Hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"];?>" width="50"></td>
            <td><?php echo $row["noTelp"];?></td>
            <td><?php echo $row["nama"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["alamat"];?></td>
        </tr>
        <?php $i++;?>
    <?php endforeach;?>
    </table>
    </center>
    <br><br>
    <a href="logout.php">Logut Akun</a>
</main>
</body>

</html>