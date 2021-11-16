<?php include 'header.php';
$projesor=$db->prepare("SELECT * FROM hizmetler_tbl");
$projesor->execute(array(0));
?>
	<!--Blog-->
	<section id="blog" class="m-150">
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2 class="title-dark">PROJELER</h2>
						<hr>
						<div class="blog-item">
							<div class="row">
								<?php foreach ($projesor as $rows): ?>
									<div class="col-md-6">
										<div class="card blog-portfolio">
											<img src="<?=$rows['hizmet_foto']?>" class="card-img blog-img" alt="<?=$rows['hizmet_ad']?>">
											<div class="card-img-overlay blog-overlay d-flex" id="data-1">
												<div class="d-flex-title">
													<h1><?=$rows['hizmet_ad']?></h1>
												</div>
<!--
												<div class="flex-text d-flex">
													<a href="project?hizmet_id=<?=$rows['hizmet_id']?>" class="card-text d-none">Daha Fazlasını Gör</a>
												</div>
-->
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</section>
	<!--Blog End-->
<?php include 'footer.php' ?>
