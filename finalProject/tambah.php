<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
if ( isset($_POST["submit"]) ) {
    // cek data berhasil masuk
    if ( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'penjual.php';
            </script>
            ";
    }else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
            </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Iklan</title>
    <link rel="stylesheet" type="text/css" href="assets/input.css">
</head>

<body class="wallpaper">
    <div class="container">
    <h1>Tambah data iklan</h1>
    <!--enctype buat handle gambar yang diupload -->
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="col-25">
                <label for="telp">No. Telepon :</label>
            </div>
            <div class="col-75">
                <input id="telp" type="text" name="noTelp" required>
            </div> 
    </div>
    <div class="row">
            <div class="col-25"> 
                <label for="nama">Nama :</label>
            </div>
            <div class="col-75">
                <input id="nama" type="text" name="nama" required>
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="email">E-mail :</label>
            </div>
            <div class="col-75">
                <input id="email" type="text" name="email">    
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="alamat">Alamat :</label>
            </div>
            <div class="col-75">
                <input id="alamat" type="text" name="alamat">    
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="subject">Deskripsi :</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="deskripsi" placeholder="Tuliskan sesuatu..." style="height:200px"></textarea>
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="gambar">Gambar :</label>
            </div>     
            <div class="col-25">
                <input type="file" id="gambar" class="custom-file-input" name="gambar">
            </div>    
    </div>
            <div class="row">
                <input type="submit" name="submit"></input>
            </div> 
    </div>
    </form>
    </div>
</body>
</html>