<?php include 'header.php' ?>
<?php include 'sidebar.php';
$yedekparcasor=$db->prepare("SELECT * FROM yedekparca_tbl where yedekparca_id=:yedekparca_id");
$yedekparcasor->execute(array("yedekparca_id" => $_GET['yedekparca_id']));
$yedekparcacek=$yedekparcasor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Yedek Parça Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="yedekparca_id" value="<?php echo $yedekparcacek['yedekparca_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<div class="form-group">
							<img style="width: 20%;" src="../<?php echo $yedekparcacek['yedekparca_foto'] ?>">
						</div>
						<div class="form-group">
							<label><i class="fa fa-image"></i> Yedekparça Fotoğrafı</label>
							<input style="height: 50px;" type="file" name="yedekparca_foto" class="form-control">
						</div>
						<label><i class="fa fa-heading"></i> Ürün Ad</label>
						<input type="text" name="yedekparca_ad" class="form-control" value="<?php echo $yedekparcacek['yedekparca_ad'] ?>">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="yedekparca.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="yedekparcaduzenle">Düzenle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
