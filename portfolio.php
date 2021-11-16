<?php include 'header.php';
//portfolyo
$portfolyosor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=31");
$portfolyosor->execute(array(0));
?>

<!--Portfolio-->
<section id="page-portfolio" class="m-150">
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<h2 class="title-dark">PORTFOLYO</h2>
					<hr class="cizgi">
					<div class="portfolio-item">
						<div class="row">
							<?php foreach ($portfolyosor as $rows): ?>

								<div class="col-md-6">
                  <div class="card card-portfolio">
                    <img src="<?=$rows['urun_foto']?>" class="portfolio-img" alt="<?=$rows['urun_ad']?>">
                    <div class="card-img-overlay portfolio-overlay">
                      <div class="d-flex d-flex-title">
                        <h4><?=$rows['urun_ad']?></h4>
                      </div>
											<!--
                      <div class="d-flex d-flex-link d-none">
                        <a href="portfolio?urun_id=<?=$rows['urun_id']?>" class="card-text">Daha Fazlasını Gör</a>
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
<!--Portfolio End-->

<!--Footer-->
<footer id="contact">
	<div>
		<div class="footer-social">
			<a href="#"><img src="assets/icon/behance-dark.png"></a>
			<a href="#"><img src="assets/icon/facebook-dark.png"></a>
			<a href="#"><img src="assets/icon/instagram-dark.png"></a>
			<a href="#"><img src="assets/icon/youtube-dark.png"></a>
		</div>
	</div>
</footer>
<!--Footer End-->


<!-- Javascript -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
