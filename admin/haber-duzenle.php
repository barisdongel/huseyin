<?php include 'header.php'; include 'sidebar.php';
$habersor=$db->prepare("SELECT * FROM haberler_tbl where haber_id=:haber_id");
$habersor->execute(array("haber_id" => $_GET['haber_id']));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Haber Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="haber_id" value="<?=$habercek['haber_id']; ?>">
				<div class="card-body">
					<img src="../<?=$habercek['haber_resim']?>" alt="<?=$habercek['haber_id']?>" height="200">
					<div class="form-group">
	          <label><i class="fa fa-image text-primary"></i> Haber Resim</label>
	          <input style="height: 50px;" type="file" name="haber_resim" class="form-control">
	        </div>
					<div class="form-group">
						<label><i class="fa fa-heading text-primary"></i> Haber Başlık</label>
						<input type="text" name="haber_baslik" value="<?=$habercek['haber_baslik'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Haber İçerik</label>
						<textarea name="haber_icerik" type="submit" id="ckeditor1"><?=$habercek['haber_icerik']?></textarea>
					</div>
					<div class="form-group">
						<label><i class="fa fa-phone text-primary"></i> Haber Tarih</label>
						<input type="text" name="haber_tarih" value="<?=$habercek['haber_tarih'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="haberler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="haberduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
