<?php 
require '../functions.php';
$keyword = $_GET["keyword"]; 
$query = "SELECT * FROM iklan 
            WHERE
            nama LIKE '%$keyword%' OR
            noTelp LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%'
        ";
$iklan = query($query);

?>

<div id="container">		
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