<?php 
require 'functions.php';

if( isset($_POST["register"]) ){
    if( registrasi($_POST) > 0){
        echo "<script>
            alert('user baru berhasil ditambahkan!');
        </script>";
        header("Location: login.php");
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="assets/login.css">
</head>

<body class="wallpaper">
    <h1 class="tulisan_login">Halaman Registrasi</h1>
    <form action="" method="post">

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Registrasi</p>
        <form action="" method="POST">
            <label>Username :</label>
                <input type="text" name="username" class="form_login">

            <label>Password :</label>
                <input type="password" name="password" class="form_login">

            <label>Konfirmasi Password :</label>
                <input type="password" name="password2" class="form_login">

            <button type="submit" name="register" class="tombol_login">Register!</button>
            <br><br>
            <button type="reset" name="reset" class="tombol_reset">Reset</button>
            <br><br>
        </form>
    </div>
</body>

</html>