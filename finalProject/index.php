<?php
require'functions.php';
$iklan = query("SELECT * FROM iklan;");

// tombol cari ditekan
    if ( isset($_POST["cari"]) ) {
        $iklan = cari($_POST["keyword"]);
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Pasar Senen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<header>
		<div class="jumbotron">
			<h1>Pasar Senen</h1>
			<p class="fontputih">Lapak jual jajanan tradisional Indonesia</p>
		</div>
		<nav>
			<ul>
				<li><a href="#iklan">Iklan Jajanan</a></li>
				<li><a href="login.php">Login Penjual</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div id="content">
			<form action="" method="post">
				<input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
				<button class="button" type="submit" name="cari">Cari!</button>
			</form>
		<?php foreach ($iklan as $row):?>
		<article class="card" id="iklan">
			<h3><?php echo $row["nama"];?></h3>
				<img src="img/<?php echo $row["gambar"];?>" width="500">
				<h4><?php echo $row["noTelp"];?></h4>
				<p><?php echo $row["email"];?></p>
				<p><?php echo $row["alamat"];?></p>
				<p><?php echo $row["deskripsi"];?></p>
		</article>
		<?php endforeach;?>
		</div>
		<aside>
			<article class="profile card">
			<header>
			<h2>Tentang Developper</h2>
			<figure>
						<img src="assets/profil.png">
					</figure>
				</header>
				<section>
					<table>
						<tr>
							<th>Nama</th>
							<td>Yudha & Hasan</td>
						</tr>
						<tr>
							<th>Universitas</th>
							<td>UPN "Veteran" Jawa Timur</td>
						</tr>
					</table>
				</section>
			</article>
		</aside>
	</main>
	<footer>
		<p class="fontputih">Copyright &copy;yudhayp2020</p>
	</footer>
</body>

</html>