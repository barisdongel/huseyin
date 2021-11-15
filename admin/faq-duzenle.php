<?php include 'header.php' ?>
<?php include 'sidebar.php';
$faqsor=$db->prepare("SELECT * FROM faq_tbl where faq_id=:faq_id");
$faqsor->execute(array("faq_id" => $_GET['faq_id']));
$faqcek=$faqsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Sık Sorulan Soru Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST">

				<input type="hidden" name="faq_id" value="<?php echo $faqcek['faq_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Soru Başlık</label>
						<input type="text" name="faq_baslik" value="<?php echo $faqcek['faq_baslik'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Soru İçerik</label>
						<textarea name="faq_icerik" type="submit" id="ckeditor1"><?php echo $faqcek['faq_icerik'] ?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="faqduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
