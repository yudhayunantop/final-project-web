<?php
    //konek db
    $conn=mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        // variabel global untuk cari $conn diluar function
        global $conn;
        //grab data
        $result = mysqli_query($conn, $query);
        $rows = [];

        // ambil data(fetch) mahasiswa dari objek result
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        $username=$_SESSION["username"];
        //ambil data tiap elemen form
        $noTelp = htmlspecialchars($data["noTelp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);

        //upload gambar dulu
        $gambar = upload();
        if( $gambar===false){
            return false;
        }

        //query insert data
        $query = "INSERT INTO iklan
                    VALUES
                ('', '$noTelp', '$nama', '$email', '$alamat', '$gambar', '$deskripsi','$username')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if( $error === 4){/*4 adalah pesan error ga upload file dari $_FILES*/
            echo " <script>
                    alert('Silahkan pilih gambar terlebih dahulu!');
                    </script>
                ";
            return false;
        }
        // cek yang diupload harus gambar
        $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ektensiGambar = explode('.', $namaFile); //memecah nama dan ekstensinya
        $ektensiGambar = strtolower(end($ektensiGambar)); //mengambil hasil pecahan yang berupa array
        if ( !in_array($ektensiGambar, $ektensiGambarValid)){
                echo " <script>
                    alert('Anda bukan mengupload gambar');
                    </script>
                ";
                return false;
        }
        // cek gambar yang diupload terlalu besar
        if ( $ukuranFile > 1000000){
                echo " <script>
                    alert('Ukuran gambar terlalu besar');
                    </script>
                ";
                return false;
        }

        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ektensiGambar;
        
        // lolos cek, gambar siap upload
        move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
        return $namaFileBaru;// return nama file karena yang diupload ke db nama file nya
    }

    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM iklan WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;
        $username=$_SESSION["username"];
        //ambil data tiap elemen form
        $id = $data["id"];
        $noTelp = htmlspecialchars($data["noTelp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        //cek apakah user pilih gambar baru atau tidak
        if( $_FILES['gambar']['error']===4) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
        

        //query insert data
        $query = "UPDATE iklan SET
                    noTelp ='$noTelp', 
                    nama = '$nama',
                    email = '$email',
                    alamat = '$alamat',
                    gambar = '$gambar',
                    deskripsi= '$deskripsi',
                    username='$username'
                    WHERE id= $id;
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM iklan 
                    WHERE
                      nama LIKE '%$keyword%' OR
                      noTelp LIKE '%$keyword%' OR
                      alamat LIKE '%$keyword%'
                ";
        return query($query);
    }

    function registrasi($data) {
        global $conn;

        //memaksa karakter menjadi lower dan membersihkan backslash
        $username = strtolower(stripslashes($data["username"]));
        //biar user bisa pakai petik di pw
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
        // cek username sudah ada atau blm
        $result = mysqli_query($conn,"SELECT username FROM user 
                                    WHERE username='$username'");
        
        if ( mysqli_fetch_assoc($result) ) {
            echo "<script>
                alert('Username sudah ada!');
            </script>";
            return false;
        }

        // cek konfirmasi pw sama atau tidak
        if ($password !== $password2){
            echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
            return false;
        }
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // TAMBAH user ke db
        mysqli_query($conn, "INSERT INTO user VALUES ('','$username', '$password');");
        return mysqli_affected_rows($conn);
    }
?>
