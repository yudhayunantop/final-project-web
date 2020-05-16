<?php
session_start();
$_SESSION["username"]=[];
if (isset($_SESSION["login"])) {
    header("Location: penjual.php");
    exit;
}

require'functions.php';

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE 
    username = '$username'");

    //cek username
    if (mysqli_num_rows($result)===1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            // set session agar bisa tampil peruser dashboard penjual
            $_SESSION["username"]=$username;
            $_SESSION["login"] = true;

            header("Location: penjual.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="assets/login.css">
</head>

<body class="wallpaper">
    <h1 class="tulisan_login">Halaman Login</h1>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>
        <form action="" method="POST">
            <label>Username :</label>
                <input type="text" name="username" class="form_login">

            <label>Password :</label>
                <input type="password" name="password" class="form_login">

            <button type="submit" name="login" class="tombol_login">Login!</button>
            <br><br>
            <button type="reset" name="reset" class="tombol_reset">Reset</button>
            <br><br>
            <div class="link">
                <p>Belum memiliki akun?</p>
            <a href="registrasi.php">Register!</a>
            </div>
            
        <?php if( isset($error)) : ?>
            <p style="color: red; font-style:italic;"> username / password salah</p>
        <?php endif; ?>
        </form>
    </div>
</body>

</html>