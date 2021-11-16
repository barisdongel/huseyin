<?php include 'header.php';
$blogsor=$db->prepare("SELECT * FROM blog_tbl");
$blogsor->execute(array(0));
?>
	<!--Blog-->
	<section id="blog" class="m-150">
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2 class="title-dark">BLOG</h2>
						<hr>
						<div class="blog-item">
							<div class="row">
								<?php foreach ($blogsor as $rows): ?>
									<div class="col-md-4">
										<div class="card blog-portfolio">
											<img src="<?=$rows['blog_resim']?>" class="card-img blog-img" alt="<?=$rows['blog_baslik']?>">
											<div class="card-img-overlay blog-overlay d-flex" id="data-1">
												<div class="d-flex-title">
													<h1><?=$rows['blog_baslik']?></h1>
												</div>
												<span class="date"><?=$rows['blog_tarih']?></span>
												<div class="flex-text d-flex">
													<a href="blog-detail.php?blog_id=<?=$rows['blog_id']?>" class="card-text d-none">Daha Fazlasını Gör</a>
												</div>
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
