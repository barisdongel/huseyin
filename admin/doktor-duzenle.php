<?php include 'header.php' ?>
<?php include 'sidebar.php';
$calisansor=$db->prepare("SELECT * FROM calisanlar_tbl where calisanlar_id=:calisanlar_id");
$calisansor->execute(array("calisanlar_id" => $_GET['calisanlar_id']));
$calisancek=$calisansor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Çalışan Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="calisanlar_id" value="<?=$calisancek['calisanlar_id']; ?>">
				<div class="card-body">
					<img src="../<?=$calisancek['calisan_foto']?>" alt="<?=$calisancek['calisanlar_id']?>" height="200">
					<div class="form-group">
	          <label><i class="fa fa-image text-primary"></i> Çalışan Ana Resim</label>
	          <input style="height: 50px;" type="file" name="calisan_foto" class="form-control">
	        </div><hr>
					<img src="../<?=$calisancek['calisan_ikincifoto']?>" alt="<?=$calisancek['calisanlar_id']?>" height="200">
					<div class="form-group">
						<label><i class="fa fa-image text-primary"></i> Çalışan İkinci Resim</label>
						<input style="height: 50px;" type="file" name="calisan_ikincifoto" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading text-primary"></i> Çalışan Ad Soyad</label>
						<input type="text" name="calisanlar_adsoyad" value="<?=$calisancek['calisanlar_adsoyad'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Çalışan Görevi</label>
						<input type="text" name="calisanlar_gorevi" value="<?=$calisancek['calisanlar_gorevi'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-phone text-primary"></i> Çalışan Telefon</label>
						<input type="text" name="calisan_telefon" value="<?=$calisancek['calisan_telefon'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-envelope text-primary"></i> Çalışan Mail</label>
						<input type="text" name="calisan_mail" value="<?=$calisancek['calisan_mail'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fab fa-facebook text-primary"></i> Çalışan Facebook</label>
						<input type="text" name="calisan_facebook" value="<?=$calisancek['calisan_facebook'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fab fa-instagram text-primary"></i> Çalışan Instagram</label>
						<input type="text" name="calisan_instagram" value="<?=$calisancek['calisan_instagram'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fab fa-twitter text-primary"></i> Çalışan Twitter</label>
						<input type="text" name="calisan_twitter" value="<?=$calisancek['calisan_twitter'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fas fa-barcode text-primary"></i> Çalışan Kodu</label>
						<input type="text" name="calisan_kodu" value="<?=$calisancek['calisan_kodu'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="doktorlar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="doktorduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
