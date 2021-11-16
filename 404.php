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
						<h2 class="title-dark">404</h2>
						<hr>
						<div class="blog-item">
							<div class="row d-flex" style="justify-content:center;">
									<h3 class="text-center mt-5 mb-5">ARADIĞINIZ SAYFAYI BULAMADIK!</h3>
									<a href="anasayfa" style="text-transform: uppercase; text-decoration:none;" class="text-center prompt text-light p-5 mt-5 mb-5 bg-dark w-50 justify-content-center"><i class="fa fa-share"></i> Anasayfa'ya Dön.</a>
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
