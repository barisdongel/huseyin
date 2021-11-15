<?php
include 'header.php';
include 'sidebar.php';

//İndex istatistikler için sorgular
$kullaniciara =$db->prepare("SELECT * FROM kullanici_tbl");
$kullaniciara->execute();

$kategoriler=$db->prepare("SELECT * FROM kategori_tbl");
$kategoriler->execute();

$calisansor =$db->prepare("SELECT * FROM calisanlar_tbl");
$calisansor->execute();
?>

<!-- Main Content -->
<div class="main-content">

<?php include 'istatistikler.php'; ?>

<div class="row">
	<div class="col-12 col-sm-12 col-lg-6">
		<div class="card profile-widget">
			<div class="profile-widget-header">
				<div class="row">
					<div class="col-12">
						<img alt="image" src="<?=$kullanicicek['kullanici_foto'] ?>"
							class="rounded-circle profile-widget-picture box-center">
					</div>
				</div>
			</div>
			<div class="profile-widget-description pb-0">
				<div class="profile-widget-name">
					<?=$kullanicicek['kullanici_adsoyad'] ?>
					<div class="text-muted d-inline font-weight-normal">
						<div class="slash"></div>
						<?php
						if ($kullanicicek['kullanici_yetki']==0 ) {
							echo "ROOT";
						}elseif ($kullanicicek['kullanici_yetki']==1 ) {
							echo "YÖNETİCİ";
						}elseif ($kullanicicek['kullanici_yetki']==2 ) {
							echo "ÜYE";
						}else{
							echo "KULLANICI";
						}
						?>
					</div>
				</div>
				<p><?=$kullanicicek['kullanici_hakkinda'] ?></p>
			</div>
			<div class="card-footer text-center pt-0">
				<div class="font-weight-bold mb-2 text-small">Sosyal Medya
				</div>
				<a href="<?=$kullanicicek['kullanici_facebook'] ?>" class="btn btn-social-icon mr-1 btn-facebook">
					<i class="fab fa-facebook-f"></i>
				</a> <a href="<?=$kullanicicek['kullanici_twitter'] ?>" class="btn btn-social-icon mr-1 btn-twitter">
					<i class="fab fa-twitter"></i>
				</a> <a href="<?=$kullanicicek['kullanici_github'] ?>" class="btn btn-social-icon mr-1 btn-github">
					<i class="fab fa-github"></i>
				</a> <a href="<?=$kullanicicek['kullanici_instagram'] ?>" class="btn btn-social-icon mr-1 btn-instagram">
					<i class="fab fa-instagram"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-lg-6 mt-5">
		<div class="card">
			<div class="card-header">
				<h4>Aktif Kullanıcılar <span class="text-warning">(<?=$kullanicisay?>)</span></h4>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped">
						<tr>
							<th>Kullanıcı Foto</th>
							<th>Kullanıcı Adı Soyadı</th>
							<th>Kullanıcı Telefon</th>
							<th>Kullanıcı email</th>
						</tr>
						<?php
						while ($kullanicitut=$kullaniciara->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td><img src="<?=$kullanicitut['kullanici_foto'] ?>" class="w-100"></td>
							<td class="w-50"><?=$kullanicitut['kullanici_adsoyad'] ?></td>
							<td class="w-50"><?=$kullanicitut['kullanici_tel'] ?></td>
							<td><?=$kullanicitut['kullanici_ad'] ?></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4>Kategoriler</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped">
						<tr>
							<th>Kategori Ad</th>
						</tr>
						<?php
						while ($kategori=$kategoriler->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td class="w-50"><?=$kategori['kategori_ad'] ?></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-lg-6 mt-5">
		<div class="card">
			<div class="card-header">
				<h4>ÇALIŞANLAR <span class="text-warning">(<?=$calisansay?>)</span> </h4>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped">
						<tr>
							<th>Çalışan Foto</th>
							<th>Çalışan Adı Soyadı</th>
							<th>Çalışan Görevi</th>
							<th>Çalışan Telefon</th>
							<th>Çalışan email</th>
						</tr>
						<?php foreach ($calisansor as $rows) {?>
						<tr>
							<td><img src="../<?=$rows['calisan_foto'] ?>" class="w-100"></td>
							<td class="w-50"><?=$rows['calisanlar_adsoyad'] ?></td>
							<td class="w-50"><?=$rows['calisanlar_gorevi'] ?></td>
							<td class="w-50"><?=$rows['calisan_telefon'] ?></td>
							<td><?=$rows['calisan_mail'] ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
