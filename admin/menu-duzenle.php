<?php include 'header.php' ?>
<?php include 'sidebar.php';
$menusor=$db->prepare("SELECT * FROM menu_tbl where menu_id=:menu_id");
$menusor->execute(array("menu_id" => $_GET['menu_id']));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

$menuso1=$db->prepare("SELECT * FROM menu_tbl where menu_id=:menu_id");
$menuso1->execute(array("menu_id" => $_GET['menu_id']));
$menuce1=$menuso1->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Menü Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST">

				<input type="hidden" name="menu_id" value="<?=$menucek['menu_id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<label><i class="fa fa-thumbtack"></i> Menü Üst</label>
						<select class="form-control" name="menu_ust">
							<option value="0">Üst Menü</option>
							<?php
							$menusor=$db->prepare("SELECT * FROM menu_tbl ORDER BY menu_ad ASC");
							$menusor->execute();
							while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?=$menucek['menu_id'] ?>"><?=$menucek['menu_ad'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label><i class="fa fa-thumbtack"></i> Menü Sayfa</label>
						<select class="form-control" name="menu_sayfa">
							<option value="0">Sayfa Yok</option>
							<?php
							$sayfasor=$db->prepare("SELECT * FROM sayfalar_tbl ORDER BY sayfa_adi ASC");
              $sayfasor->execute();
							while ($sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?=$sayfacek['sayfa_id'] ?>"><?=$sayfacek['sayfa_adi'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Menü Ad</label>
						<input type="text" name="menu_ad" value="<?=$menuce1['menu_ad'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fa fa-share"></i> Menü URL</label>
						<input type="text" name="menu_url" value="<?=$menuce1['menu_url'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label><i class="fas fa-list-ol"></i> Menü Sıra</label>
						<input type="number" name="menu_sira" value="<?=$menuce1['menu_sira'] ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="menu.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="menuduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
