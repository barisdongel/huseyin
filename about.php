<?php include 'header.php';
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda_tbl WHERE hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

	<section id="about" class="m-150">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="prompt title-dark bold"><?=$hakkimizdacek['hakkimizda_baslik']?></h2>
					<hr class="cizgi">
				</div>
				<div class="col-md-8">
					<p class="iki-yana-yasla prompt bold"><?=$hakkimizdacek['hakkimizda_yazi']?></p>
				</div>
				<div class="col-md-4">
					<img src="<?=$hakkimizdacek['hakkimizda_foto']?>" class="w-100">
				</div>
			</div>
		</div>
	</section>
<?php include 'footer.php' ?>
