<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// ambil data di url
$id = $_GET["id"];

//query data dari id
$ad = query("SELECT * FROM iklan WHERE id=$id")[0];

//cek apakah data udah masuk ke submit
if ( isset($_POST["submit"]) ) {
    // cek data berhasil diubah
    if ( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'penjual.php';
            </script>
            ";
    }else {
        echo "
            <script>
                alert('data gagal diubah!');
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
    <title>Ubah Data Iklan</title>
    <link rel="stylesheet" type="text/css" href="assets/input.css">

</head>
<body class="wallpaper">
    <div class="container">
    <h1>Ubah data iklan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $ad["id"];?>">
        <input type="hidden" name="gambarLama" value="<?php echo $ad["gambar"];?>">
    <div class="row">
            <div class="col-25">
                <label for="telp">No. Telepon :</label>
            </div>
            <div class="col-75">
                <input id="telp" type="text" name="noTelp" required value="<?php echo $ad["noTelp"];?>">
            </div> 
    </div>
    <div class="row">
            <div class="col-25"> 
                <label for="nama">Nama :</label>
            </div>
            <div class="col-75">
                <input id="nama" type="text" name="nama" required value="<?php echo $ad["nama"];?>">
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="email">E-mail :</label>
            </div>
            <div class="col-75">
                <input id="email" type="text" name="email"  value="<?php echo $ad["email"];?>">    
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="alamat">Alamat :</label>
            </div>
            <div class="col-75">
                <input id="alamat" type="text" name="alamat" value="<?php echo $ad["alamat"];?>">    
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="subject">Deskripsi :</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="deskripsi" style="height:200px" placeholder="<?php echo $ad["deskripsi"];?>"></textarea>
            </div>
            <div class="col-75">
                <p>*ketik ulang jika ingin merubah</p>
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="gambar">Gambar :</label>
            </div>
            <div class="col-25">
                <input type="file" id="gambar" class="custom-file-input" name="gambar">
            </div>
            <div class="col-5">
                <img src="img/<?php echo $ad["gambar"];?>" width=50px>     
            </div>    
    </div>
            <div class="row">
                <input type="submit" name="submit"></input>
            </div> 
        </ul>

    </form>
    </div>
</body>
</html>