<?php include 'header.php'; include 'sidebar.php';
$sayfasor=$db->prepare("SELECT * FROM sayfalar_tbl where sayfa_id=:sayfa_id");
$sayfasor->execute(array("sayfa_id" => $_GET['sayfa_id']));
$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Sayfa Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="sayfa_id" value="<?=$sayfacek['sayfa_id']; ?>">
				<div class="card-body">
					<img src="../<?=$sayfacek['sayfa_banner']?>" alt="<?=$sayfacek['sayfa_banner']?>" height="200">
					<div class="form-group">
	          <label><i class="fa fa-image text-primary"></i> Sayfa Banner</label>
	          <input style="height: 50px;" type="file" name="sayfa_banner" class="form-control">
	        </div>
					<img src="../<?=$sayfacek['sayfa_resim']?>" alt="<?=$sayfacek['sayfa_resim']?>" height="200">
					<div class="form-group">
						<label><i class="fa fa-images text-primary"></i> Sayfa Resim</label>
						<input style="height: 50px;" type="file" name="sayfa_resim" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading text-primary"></i> Sayfa Adı</label>
						<input type="text" name="sayfa_adi" value="<?=$sayfacek['sayfa_adi'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Sayfa İçerik</label>
						<textarea name="sayfa_icerik" type="submit" id="ckeditor1"><?=$sayfacek['sayfa_icerik']?></textarea>
					</div>
					<div class="form-group">
						<label><i class="fa fa-share text-primary"></i> Sayfa link</label>
						<input type="text" name="sayfa_link" value="<?=$sayfacek['sayfa_link'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="sayfalar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="sayfaduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
