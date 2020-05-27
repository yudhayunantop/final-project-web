<?php 
require '../functions.php';
$keyword = $_GET["keyword"]; 
$query = "SELECT * FROM iklan 
            WHERE
            nama LIKE '%$keyword%'
        ";
$iklan = query($query);
?>
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
