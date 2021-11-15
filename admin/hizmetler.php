<?php include 'header.php'; include 'sidebar.php';

$url = $_SERVER['QUERY_STRING'];
if ($url == '' || $url== NULL || $url == 'durum=ok' || $url == 'durum=no') {
	$kategorisor=$db->prepare("SELECT * FROM hizmetler_tbl inner join hizmetkategori_tbl on hizmetkategori_tbl.kategori_id=hizmetler_tbl.hizmet_kategori");
	$kategorisor->execute();

	$hizmetsor=$db->prepare("SELECT * FROM hizmetler_tbl ORDER BY hizmet_id ASC limit 20");
	$hizmetsor->execute();
	$say=$hizmetsor->rowCount();
}else{
	$kategorisor=$db->prepare("SELECT * FROM hizmetler_tbl inner join hizmetkategori_tbl on hizmetkategori_tbl.kategori_id=hizmetler_tbl.hizmet_kategori where hizmet_kategori=:hizmet_kategori");
	$kategorisor->execute(array('hizmet_kategori' => $_GET['hizmet_kategori']));

	$hizmetsor=$db->prepare("SELECT * FROM hizmetler_tbl where hizmet_kategori=:hizmet_kategori");
	$hizmetsor->execute(array('hizmet_kategori' => $_GET['hizmet_kategori']));
}
if (isset($_POST['arama'])) {
	$aranan=$_POST['aranan'];
	$hizmetsor=$db->prepare("SELECT * FROM hizmetler_tbl WHERE hizmet_ad LIKE '%$aranan%' ORDER BY hizmet_id ASC limit 20");
	$hizmetsor->execute();
	$say=$hizmetsor->rowCount();
}
$kategoriso1=$db->prepare("SELECT * FROM hizmetkategori_tbl");
$kategoriso1->execute();
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<h4 class="text-center p-3">Hizmetler</h4>
			<h6 class="text-center p-3">Hizmet Kategorileri:</h6>
			<div class="card-header bg-primary justify-content-center">
				<td><a href="hizmetler.php" class="ktgry btn p-3 text-center text-white">Tümü</a></td>
				<?php while ($kategorice1=$kategoriso1->fetch(PDO::FETCH_ASSOC)) { ?>
					<style media="screen">
						.ktgry{transition: .4s; border-radius: 0px !important;}
						.ktgry:hover{
  						color: #e91e63  !important;
						}
					</style>
					<td><a style="color:#fff;" href="hizmetler.php?hizmet_kategori=<?=$kategorice1['kategori_id'] ?>" class="ktgry btn p-3 text-center"><?=$kategorice1['kategori_ad'];?></a></td>
				<?php } ?>
			</div>
			<form action="" method="POST">
				<div class="input-group col-md-6 m-2">
					<i style="border: 0.1px solid #e91e63; background-color: #e91e63; color: #fff;" class="fa fa-search p-2"></i><input style="border: 1px solid #e91e63;" type="text" name="aranan" class="form-control" placeholder="Aramak istediğiniz hizmetin adı...">
					<button style="border-radius: 0px;" type="submit" name="arama" class="btn btn-primary">Ara!</button>
				</div>
			</form>
			<form action="../islem.php" method="POST">
				<table class="table table-striped table-md">
					<tr>
						<th class="text-center">Hizmet Resim</th>
						<th>Hizmet Ad</th>
						<th>Hizmet Kategori</th>
						<th></th>
						<th style="width: 15%;"><a href="hizmet-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
					</tr>

					<?php while ($hizmetcek=$hizmetsor->fetch(PDO::FETCH_ASSOC)) {
						$hizmet_id=$hizmetcek['hizmet_id'];
						?>
						<tr>
							<td class="text-center"><img style="width: 50%;" src="../<?=$hizmetcek['hizmet_icon']; ?>"></td>
							<td style="width:16%;"><?=$hizmetcek['hizmet_ad']; ?></td>
							<?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
							<td style="width:16%;"><?=$kategoricek['kategori_ad']; ?></td>
							<td><a href="hizmet-duzenle.php?hizmet_id=<?=$hizmetcek['hizmet_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
							<td><a href="../islem.php?hizmetsil=ok&hizmet_id=<?=$hizmetcek['hizmet_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
