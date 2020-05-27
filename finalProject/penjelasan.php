<?php
require'functions.php';

$id=$_GET["id"];
$iklan = query("SELECT * FROM iklan WHERE id='$id';");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dagangan Lapak Pasar Senen</title>
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
				<li><a href="index.php">Iklan Jajanan</a></li>
				<li><a href="login.php">Login Penjual</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div id="content">
		<div id="container">		
			<?php foreach ($iklan as $row):?>
			<article class="card">
				<h3><?php echo $row["nama"];?></h3>
					<img src="img/<?php echo $row["gambar"];?>" width="500" alt="<?php echo $row["nama"];?>">
					<br><br>					
					<p>Email : <?php echo $row["email"];?></p>
					<p><?php echo $row["deskripsi"];?></p>
			</article>
		</div>
		</div>
		<aside>
			<article class="profile card">
			<header>
			<h2>Tentang Penjual</h2>
				<section>
					<table>
						<tr>
							<th>Username</th>
							<td><?php echo $row["username"];?></td>
						</tr>
						<tr>
							<th>No. Telepon</th>
							<td><?php echo $row["noTelp"];?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td><?php echo $row["alamat"];?></td>
						</tr>
					</table>
				</section>
			</article>
		</aside>
			<div id="sugest">
			<h3>Produk lain oleh <?php echo $row["username"];?> </h3>
				<?php $sugest = query("SELECT * FROM iklan WHERE username='".$row["username"]."';");?>
					<?php foreach ($sugest as $row):?>
						<div id="content" class="aman">		
							<article id="iklan">
								<a href="penjelasan.php?id=<?php echo $row["id"];?>" target='_blank'>
									<h3><?php echo $row["nama"];?></h3> 
								</a>
									<img src="img/<?php echo $row["gambar"];?>" width="200" height="150" alt="<?php echo $row["nama"];?>">
							</article>
						</div>
				<?php endforeach;?>
			</div>
		<?php endforeach;?>
	</main>
	<footer>
		<p class="fontputih">Copyright &copy;yudhayp2020</p>
	</footer>

	<script src="js/script.js"></script>
</body>

</html>