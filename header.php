<?php
include 'baglan.php';
include 'function.php';

//ayarlar
$ayarsor =$db->prepare("SELECT * FROM ayar_tbl WHERE ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
//ayarlar son

//Menüler
$menusor =$db->prepare("SELECT * FROM menu_tbl WHERE menu_ust=0 ORDER BY menu_sira");
$menusor->execute(array(0));
//Menüler son

//altmenü
$altmenusor =$db->prepare("SELECT * FROM menu_tbl WHERE menu_ust=:menu_id AND menu_sayfa = 0");
//altmenüson

//sayfamenu sor
$sayfamenusor =$db->prepare("SELECT * FROM menu_tbl WHERE menu_ust != 0 AND menu_sayfa != 0");
$sayfamenusor->execute(array(0));
//sayfamenuson

//menü urunler
$urunler=$db->prepare("SELECT * FROM urunler_tbl");
$urunler->execute(array(0));
//son

//menü kategoriler
$kategoriler=$db->prepare("SELECT * FROM kategori_tbl");
$kategoriler->execute(array(0));
//son

//menü hizmetler
$hizmetler=$db->prepare("SELECT * FROM hizmetler_tbl");
$hizmetler->execute(array(0));
//son

//Butonlar
$randevual=$db->prepare("SELECT * FROM butonlar_tbl WHERE buton_adi LIKE '%randevu%'");
$randevual->execute(array(0));
$randevualbuton=$randevual->fetch(PDO::FETCH_ASSOC);

$whatsappbuton=$db->prepare("SELECT * FROM butonlar_tbl WHERE buton_adi LIKE '%whatsapp%'");
$whatsappbuton->execute(array(0));
$whatsapp=$whatsappbuton->fetch(PDO::FETCH_ASSOC);
//Butonlar son
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title><?=$ayarcek['ayar_title']?></title>
	<meta name="description" content="<?=$ayarcek['ayar_desc']?>">
	<meta name="keywords" content="<?=$ayarcek['ayar_key']?>">
	<meta name="author" content="<?=$ayarcek['ayar_author']?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Theme Style -->
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

	<!-- Favicon and touch icons  -->
	<link rel="shortcut icon" href="assets/icon/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-158-precomposed.png">

	<!--Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">

</head>
<body>
	<!--Header-->
	<header>
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?=$ayarcek['ayar_siteurl']?>"><img src="<?=$ayarcek['ayar_logo']?>" width="200"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<?php foreach ($menusor as $menu): ?>
							<?php if ($menu['menu_url']!='' && $menu['menu_sayfa']==0): ?>
								<li class="nav-item active">
									<a class="nav-link" href="<?=$menu['menu_url']?>"><?=$menu['menu_ad']?></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</nav>
		<!--Navbar End-->
	</header>
	<!--Header END-->
