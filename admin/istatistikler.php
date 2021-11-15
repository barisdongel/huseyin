<?php
	//Sayıları Göstermek için sorgular
	$kullanicisayisi =$db->prepare("SELECT COUNT(*) FROM kullanici_tbl");
	$kullanicisayisi->execute();
	$kullanicisay = $kullanicisayisi->fetchColumn();

	$urunsayisi =$db->prepare("SELECT COUNT(*) FROM urunler_tbl");
	$urunsayisi->execute();
	$urunsay = $urunsayisi->fetchColumn();

	$yedekparcasayisi =$db->prepare("SELECT COUNT(*) FROM yedekparca_tbl");
	$yedekparcasayisi->execute();
	$yedekparcasay = $yedekparcasayisi->fetchColumn();

	$markasayisi =$db->prepare("SELECT COUNT(*) FROM kategori_tbl");
	$markasayisi->execute();
	$markasay = $markasayisi->fetchColumn();

	$calisansayisi =$db->prepare("SELECT COUNT(*) FROM calisanlar_tbl");
	$calisansayisi->execute();
	$calisansay = $calisansayisi->fetchColumn();
?>
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon-square card-icon-bg-green">
      <i class="fas fa-users"></i>
    </div>
    <div class="card-wrap">
      <div class="padding-20">
        <div class="text-right">
          <h3 class="font-light mb-0">
            <i class="ti-arrow-up text-success"></i><?=$kullanicisay ?>
          </h3>
          <span class="text-muted">Kullanıcı</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon-square card-icon-bg-purple">
      <i class="fas fa-box"></i>
    </div>
    <div class="card-wrap">
      <div class="padding-20">
        <div class="text-right">
          <h3 class="font-light mb-0">
            <i class="ti-arrow-up text-success"></i><?=$urunsay ?>
          </h3>
          <span class="text-muted">Hizmet</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon-square card-icon-bg-orange">
      <i class="fas fa-cog"></i>
    </div>
    <div class="card-wrap">
      <div class="padding-20">
        <div class="text-right">
          <h3 class="font-light mb-0">
            <i class="ti-arrow-up text-success"></i><?=$calisansay ?>
          </h3>
          <span class="text-muted">Çalışan</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon-square card-icon-bg-cyan">
      <i class="far fa-copyright"></i>
    </div>
    <div class="card-wrap">
      <div class="padding-20">
        <div class="text-right">
          <h3 class="font-light mb-0">
            <i class="ti-arrow-up text-success"></i><?=$markasay ?>
          </h3>
          <span class="text-muted">Kategori</span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
