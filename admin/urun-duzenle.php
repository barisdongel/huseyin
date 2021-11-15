<?php include 'header.php' ?>
<?php include 'sidebar.php';
$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
$urunsor->execute(array("urun_id" => $_GET['urun_id']));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Ürün Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="urun_id" value="<?=$uruncek['urun_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<div class="form-group">
							<img style="width: 20%;" src="../<?=$uruncek['urun_foto'] ?>">
						</div>
						<div class="form-group">
							<label><i class="fa fa-image"></i> Ürün Fotoğrafı</label>
							<input style="height: 50px;" type="file" name="urun_foto" class="form-control" value="../<?=$uruncek['urun_foto'] ?>">
						</div>
						<div class="form-group">
							<img style="width: 20%;" src="../<?=$uruncek['urun_icon'] ?>">
						</div>
						<div class="form-group">
							<label><i class="fas fa-icons"></i> Ürün İcon</label>
							<input style="height: 50px;" type="file" name="urun_icon" class="form-control">
						</div>
						<label><i class="fa fa-heading"></i> Ürün Ad</label>
						<input type="text" name="urun_ad" class="form-control" value="<?=$uruncek['urun_ad'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-file"></i> Ürün Açıklaması</label>
						<input type="text" name="urun_aciklama" class="form-control" value="<?=$uruncek['urun_aciklama'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-list"></i> Ürün Özellikleri</label>
						<textarea name="urun_ozellik" type="submit" id="ckeditor1"><?=$uruncek['urun_ozellik'] ?></textarea>
					</div>
					<div class="form-group">
						<label><i class="fa fa-list-alt"></i> Ürün Kategorisi</label>
						<select class="form-control" name="urun_kategori">
							<?php
							$kategorisor=$db->prepare("SELECT * FROM kategori_tbl");
							$kategorisor->execute()?>
							<?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?=$kategoricek['kategori_id'] ?>"><?=$kategoricek['kategori_ad'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="urunler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="urunduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
