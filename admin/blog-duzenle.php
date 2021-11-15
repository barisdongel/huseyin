<?php include 'header.php'; include 'sidebar.php';
$blogsor=$db->prepare("SELECT * FROM blog_tbl where blog_id=:blog_id");
$blogsor->execute(array("blog_id" => $_GET['blog_id']));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Blog Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="blog_id" value="<?=$blogcek['blog_id']; ?>">
				<div class="card-body">
					<img src="../<?=$blogcek['blog_resim']?>" alt="<?=$blogcek['blog_id']?>" height="200">
					<div class="form-group">
	          <label><i class="fa fa-image text-primary"></i> Blog Resim</label>
	          <input style="height: 50px;" type="file" name="blog_resim" class="form-control">
	        </div>
					<div class="form-group">
						<label><i class="fa fa-heading text-primary"></i> Blog Başlık</label>
						<input type="text" name="blog_baslik" value="<?=$blogcek['blog_baslik'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-list-alt"></i> Blog Kategorisi</label>
						<select class="form-control" name="blog_kategori">
							<?php
							$kategorisor=$db->prepare("SELECT * FROM blog_kategori");
							$kategorisor->execute()?>
							<?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?=$kategoricek['blog_kat_id'] ?>"><?=$kategoricek['kategori_adi'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Blog İçerik</label>
						<textarea name="blog_icerik" type="submit" id="ckeditor1"><?=$blogcek['blog_icerik']?></textarea>
					</div>
					<div class="form-group">
						<label><i class="fa fa-phone text-primary"></i> Blog Tarih</label>
						<input type="text" name="blog_tarih" value="<?=$blogcek['blog_tarih'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="bloglar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="blogduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
