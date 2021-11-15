<?php include 'header.php' ?>
<?php include 'sidebar.php';
$kullanicisor=$db->prepare("SELECT * FROM kullanici_tbl where kullanici_id=:kullanici_id");
$kullanicisor->execute(array("kullanici_id" => $_GET['kullanici_id']));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Kullanici Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="kullanici_id" value="<?=$kullanicicek['kullanici_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<img style="width: 20%;" src="<?=$kullanicicek['kullanici_foto'] ?>">
						<div class="form-group">
		          <label><i class="fa fa-image text-primary"></i> Çalışan Resim</label>
		          <input style="height: 50px;" type="file" name="kullanici_foto" class="form-control">
		        </div>
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading"></i> KullaniciAdı</label>
						<input type="email" name="kullanici_ad" class="form-control" value="<?=$kullanicicek['kullanici_ad'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-share"></i> Kullanici Şifre</label>
						<input type="text" name="kullanici_sifre" class="form-control" value="<?=$kullanicicek['kullanici_sifre']?>">
					</div>
					<div class="form-group">
						<label><i class="fas fa-list-ol"></i> Kullanici Ad Soyad</label>
						<input type="text" name="kullanici_adsoyad" class="form-control" value="<?=$kullanicicek['kullanici_adsoyad']?>">
					</div>
					<div class="form-group">
						<label><i class="fas fa-list-ol"></i> Kullanici Hakkında</label>
						<textarea rows="8" name="kullanici_hakkinda" class="form-control" id="ckeditor1"><?=$kullanicicek['kullanici_hakkinda'] ?></textarea>
					</div>
					<div class="form-group">
						<label><i class="fas fa-list-ol"></i> Kullanici Doğum Yeri</label>
						<input type="text" name="kullanici_dogumyeri" class="form-control" value="<?=$kullanicicek['kullanici_dogumyeri'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fas fa-list-ol"></i> Kullanici Doğum Tarihi</label>
						<input type="date" name="kullanici_zaman" class="form-control" value="<?=$kullanicicek['kullanici_zaman']?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-phone"></i> Telefon Numarası</label>
						<input type="tel" name="kullanici_tel" class="form-control" value="<?=$kullanicicek['kullanici_tel'] ?>">
					</div>
					<div class="form-group">
						<select class="form-control" name="kullanici_yetki">
							<option value="1">Yönetici</option>
							<option value="2">Üye</option>
						</select>
					</div>
					<h6>Sosyal Medya Hesapları</h6>
					<div class="form-group">
						<label><i class="fab fa-facebook"></i> Facebook</label>
						<input type="text" name="kullanici_facebook" class="form-control" value="<?=$kullanicicek['kullanici_facebook']?>">
					</div>
					<div class="form-group">
						<label><i class="fab fa-twitter"></i> Twitter</label>
						<input type="text" name="kullanici_twitter" class="form-control" value="<?=$kullanicicek['kullanici_twitter']?>">
					</div>
					<div class="form-group">
						<label><i class="fab fa-github"></i> Github</label>
						<input type="text" name="kullanici_github" class="form-control" value="<?=$kullanicicek['kullanici_github']?>">
					</div>
					<div class="form-group">
						<label><i class="fab fa-instagram"></i> Instagram</label>
						<input type="text" name="kullanici_instagram" class="form-control" value="<?=$kullanicicek['kullanici_instagram']?>">
					</div>
				</div>

			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="kullanicilar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="kullaniciduzenle">Güncelle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
