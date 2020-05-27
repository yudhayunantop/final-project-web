<?php
require'functions.php';
$iklan = query("SELECT * FROM iklan;");
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
		<form action="" method="post">
			<input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
		</form>
		<div id="container">
			<?php foreach ($iklan as $row):?>
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
	</main>
	<footer>
		<p class="fontputih">Copyright &copy;yudhayp2020</p>
	</footer>

	<script src="js/script.js"></script>
</body>

</html>
