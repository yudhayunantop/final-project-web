<?php
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
                document.location.href = 'index.php';
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
<body>
    <h1>Ubah data iklan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $ad["id"];?>">
        <input type="hidden" name="gambarLama" value="<?php echo $ad["gambar"];?>">
        <ul>
            <li>
                <label>
                    No. Telepon :
                    <input type="text" name="noTelp" required value="<?php echo $ad["noTelp"];?>">
                </label>
            </li>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" required value="<?php echo $ad["nama"];?>">
                </label>
            </li>
            <li>
                <label>
                    E-mail :
                    <input type="text" name="email" value="<?php echo $ad["email"];?>">
                </label>
            </li>
            <li>
                <label>
                    Alamat :
                    <input type="text" name="alamat" value="<?php echo $ad["alamat"];?>">
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <img src="img/<?php echo $ad["gambar"];?>" width=50px>
                    <input type="file" name="gambar">
                </label>
            </li>
    <div class="row">
            <div class="col-25">
                <label for="gambar">Gambar :</label>
            </div>     
            <div class="col-25">
                <img src="img/<?php echo $ad["gambar"];?>" width=50px>
                <input type="file" id="gambar" class="custom-file-input" name="gambar">
            </div>    
    </div>
            <div class="row">
                <input type="submit" name="submit"></input>
            </div> 
        </ul>

    </form>
</body>
</html>