<?php include 'header.php' ?>
<?php include 'sidebar.php';
$kategorisor=$db->prepare("SELECT * FROM kategori_tbl where kategori_id=:kategori_id");
$kategorisor->execute(array("kategori_id" => $_GET['kategori_id']));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Kategori Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST">

				<input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Katgori Ad</label>
						<input type="text" name="kategori_ad" value="<?php echo $kategoricek['kategori_ad'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="kategoriduzenle">Ekle</button>              
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
