<?php include 'header.php' ?>
<?php include 'sidebar.php';
$terimsor=$db->prepare("SELECT * FROM terimler_tbl where terim_id=:terim_id");
$terimsor->execute(array("terim_id" => $_GET['terim_id']));
$terimcek=$terimsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Terim Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST">

				<input type="hidden" name="terim_id" value="<?=$terimcek['terim_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<label><i class="fa fa-heading"></i>Terim Ad</label>
						<input type="text" name="terim_ad" value="<?=$terimcek['terim_ad'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-list-alt"></i>Terim</label>
						<input type="text" name="terim" value="<?=$terimcek['terim'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="terimler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="terimduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
