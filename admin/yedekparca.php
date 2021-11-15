<?php include 'header.php' ?>
<?php include 'sidebar.php';

$yedekparcasor=$db->prepare("SELECT * FROM yedekparca_tbl");
$yedekparcasor->execute();
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Yedek Parçalar</h4>
			</div>
			<form action="../islem.php" method="POST">
				<table class="table table-striped table-md">
					<tr>
						<th class="text-center">Yedek Parça Resim</th>
						<th>Yedek Parça Ad</th>
						<th></th>
						<th style="width: 15%;"><a href="yedekparca-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
					</tr>

					<?php
					$sayfada = 20;

					$sorgu =$db->prepare("SELECT * FROM yedekparca_tbl");
					$sorgu->execute();

					$toplam_icerik = $sorgu->rowCount();

					$toplam_sayfa = ceil($toplam_icerik / $sayfada);

					$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					if ($sayfa < 1) $sayfa = 1;

					if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;


					$yedekparcasor =$db->prepare("SELECT * FROM yedekparca_tbl ORDER BY yedekparca_id DESC LIMIT $limit,$sayfada");
					$yedekparcasor->execute();

					while ($yedekparcacek=$yedekparcasor->fetch(PDO::FETCH_ASSOC)) {
						$yedekparca_id=$yedekparcacek['yedekparca_id'];
						?>
						<tr>
							<td class="text-center"><img style="width: 23%;" src="../<?php echo $yedekparcacek['yedekparca_foto']; ?>"></td>
							<td style="width:16%;"><?php echo $yedekparcacek['yedekparca_ad']; ?></td>
							<td><a href="yedekparca-duzenle.php?yedekparca_id=<?php echo $yedekparcacek['yedekparca_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
							<td><a href="../islem.php?yedekparcasil=ok&yedekparca_id=<?php echo $yedekparcacek['yedekparca_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="yedekparca.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
			</div>

			<div class="card">
				<div  class="card-body">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="yedekparca.php?sayfa=<?php echo ($sayfa - 1) ?>">Geri</a></li>
							<?php $s=0; while ($s < $toplam_sayfa) {
								$s++; ?>
								<?php if ($s==$sayfa) {?>
									<li class="page-item"><a class="page-link" href="yedekparca.php?sayfa=<?php echo $s ?>"><?php echo $s; ?></a></li>
								<?php } else { ?>
									<li class="page-item"><a class="page-link" href="yedekparca.php?sayfa=<?php echo $s ?>"><?php echo $s; ?></a></li>
								<?php } } ?>
								<li class="page-item"><a class="page-link" href="yedekparca.php?sayfa=<?php echo ($sayfa + 1) ?>">İleri</a></li>
							</ul>
						</nav>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>
<?php include 'footer.php' ?>
