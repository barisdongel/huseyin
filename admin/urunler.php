<?php include 'header.php' ?>
<?php include 'sidebar.php';

$url = $_SERVER['QUERY_STRING'];
if ($url == '' || $url== NULL || $url == 'durum=ok' || $url == 'durum=no') {
	$kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori");
	$kategorisor->execute();

	$urunsor=$db->prepare("SELECT * FROM urunler_tbl ORDER BY urun_id ASC limit 20");
	$urunsor->execute();
	$say=$urunsor->rowCount();
}else{
	$kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori where urun_kategori=:urun_kategori");
	$kategorisor->execute(array('urun_kategori' => $_GET['urun_kategori']));

	$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=:urun_kategori");
	$urunsor->execute(array('urun_kategori' => $_GET['urun_kategori']));
}
if (isset($_POST['arama'])) {
	$aranan=$_POST['aranan'];
	$urunsor=$db->prepare("SELECT * FROM urunler_tbl WHERE urun_ad LIKE '%$aranan%' ORDER BY urun_id ASC limit 20");
	$urunsor->execute();
	$say=$urunsor->rowCount();
}
$kategoriso1=$db->prepare("SELECT * FROM kategori_tbl");
$kategoriso1->execute();
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<h4 class="text-center p-3">ÜRÜNLER</h4>
			<h6 class="text-center p-3">Ürün Kategorileri:</h6>
			<div class="card-header bg-primary justify-content-center">
				<td><a href="urunler.php" class="ktgry btn p-3 text-center text-white">TÜM MODELLER</a></td>
				<?php while ($kategorice1=$kategoriso1->fetch(PDO::FETCH_ASSOC)) { ?>
					<style media="screen">
						.ktgry{transition: .4s; border-radius: 0px !important;}
						.ktgry:hover{
  						color: #e91e63  !important;
						}
					</style>
					<td><a style="color:#fff;" href="urunler.php?urun_kategori=<?=$kategorice1['kategori_id'] ?>" class="ktgry btn p-3 text-center"><?=$kategorice1['kategori_ad'];?></a></td>
				<?php } ?>
			</div>
			<form action="" method="POST">
				<div class="input-group col-md-6 m-2">
					<i style="border: 0.1px solid #e91e63; background-color: #e91e63; color: #fff;" class="fa fa-search p-2"></i><input style="border: 1px solid #e91e63;" type="text" name="aranan" class="form-control" placeholder="Aramak istediğiniz ürünün adı...">
					<button style="border-radius: 0px;" type="submit" name="arama" class="btn btn-primary">Ara!</button>
				</div>
			</form>
			<form action="../islem.php" method="POST">
				<table class="table table-striped table-md">
					<tr>
						<th class="text-center">Ürün Resim</th>
						<th>Ürün Ad</th>
						<th>Ürün Kategori</th>
						<th></th>
						<th></th>
						<th style="width: 15%;"><a href="urun-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
					</tr>

					<?php while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
						$urun_id=$uruncek['urun_id'];
						?>
						<tr>
							<td class="text-center"><img style="width: 50%;" src="../<?=$uruncek['urun_foto']; ?>"></td>
							<td style="width:16%;"><?=$uruncek['urun_ad']; ?></td>
							<?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
							<td style="width:16%;"><?=$kategoricek['kategori_ad']; ?></td>
							<td><a href="urun-fotogaleri.php?urun_id=<?=$uruncek['urun_id'] ?>" class="btn btn-outline-warning"><i class="fa fa-images"></i> Fotogaleri</a></td>
							<td><a href="urun-duzenle.php?urun_id=<?=$uruncek['urun_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
							<td><a href="../islem.php?urunsil=ok&urun_id=<?=$uruncek['urun_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
