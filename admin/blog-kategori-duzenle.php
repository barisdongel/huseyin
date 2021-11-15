<?php include 'header.php'; include 'sidebar.php';
$kategorisor=$db->prepare("SELECT * FROM blog_kategori where blog_kat_id=:blog_kat_id");
$kategorisor->execute(array("blog_kat_id" => $_GET['blog_kat_id']));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Blog Kategori Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST">

				<input type="hidden" name="blog_kat_id" value="<?=$kategoricek['blog_kat_id']; ?>">

				<div class="card-body">
					<img src="../<?=$kategoricek['kategori_resim']?>" alt="<?=$kategoricek['blog_kat_id']?>" height="200">
					<div class="form-group">
						<label><i class="fa fa-image text-primary"></i> Kategori Resim</label>
						<input style="height: 50px;" type="file" name="kategori_resim" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Katgori Ad</label>
						<input type="text" name="kategori_adi" value="<?=$kategoricek['kategori_adi'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-list-alt"></i> Kategori Açıklama</label>
						<textarea name="kategori_aciklama" type="submit" id="ckeditor1"><?=$kategoricek['kategori_aciklama'] ?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="blog-kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="blogkategoriduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
