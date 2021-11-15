<?php
$kullanicisor =$db->prepare("SELECT * FROM kullanici_tbl WHERE kullanici_ad=:ad");
$kullanicisor->execute(array(
  'ad' => $_SESSION['kullanici_ad']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <ul class="sidebar-menu">
      <li class="dropdown active" style="display: block;">
        <div class="sidebar-profile">
          <div class="siderbar-profile-pic">
            <img src="<?php echo $kullanicicek['kullanici_foto'] ?>" class="profile-img-circle box-center" alt="User Image">
          </div>
          <div class="siderbar-profile-details">
            <div class="siderbar-profile-name">HOŞGELDİN</div>
            <div class="siderbar-profile-name text-warning"><?php echo $_SESSION['kullanici_ad'] ?> </div>
            <div class="sidebar-profile-position">
              <?php if ($kullanicicek['kullanici_yetki']==0) {
                echo "Yetki : Root";
              }elseif ($kullanicicek['kullanici_yetki']==1) {
                echo "Yetki: Yönetici";
              }else{echo "Yetki: Üye";}
              ?></div>
            </div>
          </div>
        </li>
        <li class="menu-header">Admin Menü</li>
        <li><a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Admin Paneli Anasayfa</span></a></li>
        <?php if($kullanicicek['kullanici_yetki']<=1) { ?>
          <li><a class="nav-link" href="menu.php"><i class="fas fa-list"></i><span>Menüler</span></a></li>
          <li><a class="nav-link" href="buttons.php"><i class="fas fa-mouse-pointer"></i></i><span>Butonlar</span></a></li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-desktop"></i><span>Sayfa Ayarları</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="sayfalar.php">Genel Sayfalar</a></li>
              <li><a class="nav-link" href="about.php">Hakkımızda Sayfası</a></li>
              <li><a class="nav-link" href="faq.php">Sık Sorulan Sorular</a></li>
              <li><a class="nav-link" href="tanitim-filmi.php">Tanıtım Filmi Sayfası</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="slider.php"><i class="fas fa-image"></i><span>Slider Ayarları</span></a></li>
          <li><a class="nav-link" href="galeri.php"><i class="fas fa-images"></i><span>Galeri</span></a></li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-blog"></i><span>Bloglar</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="bloglar.php">Bloglar</a></li>
              <li><a class="nav-link" href="blog-kategoriler.php">Blog Kategorileri</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="haberler.php"><i class="fas fa-newspaper"></i><span>Haber Ayarları</span></a></li>
          <li><a class="nav-link" href="duyurular.php"><i class="fas fa-bullhorn"></i><span>Duyuru Ayarları</span></a></li>
          <li><a class="nav-link" href="doktorlar.php"><i class="fas fa-users"></i><span>Çalışan Ayarları</span></a></li>
          <li><a class="nav-link" href="bayiler.php"><i class="fas fa-store-alt"></i><span>Bayiler</span></a></li>
          <li><a class="nav-link" href="markalar.php"><i class="fas fa-copyright"></i><span>Markalar</span></a></li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i><span>Hizmetler</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="hizmetler.php">Hizmetler</a></li>
              <li><a class="nav-link" href="hizmet-kategoriler.php">Hizmet Kategorileri</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i><span>Ürünler</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="urunler.php">Ürünler</a></li>
              <li><a class="nav-link" href="kategoriler.php">Ürün Kategorileri</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="randevular.php"><i class="fas fa-clock"></i><span>Randevular</span></a></li>
          <li><a class="nav-link" href="seo.php"><i class="fas fa-share"></i><span>Seo Ayarları</span></a></li>
          <li><a class="nav-link" href="stats.php"><i class="fas fa-chart-bar"></i><span>İstatistikler</span></a></li>
          <li><a class="nav-link" href="terimler.php"><i class="fas fa-globe"></i><span>Terimler</span></a></li>
          <?php if ($kullanicicek['kullanici_yetki']==0) { ?>
            <li><a class="nav-link" href="kullanicilar.php"><i class="fas fa-user"></i><span>Kullanıcı Ayarları</span></a></li>
          <?php } ?>
          <li><a class="nav-link" href="ayarlar.php"><i class="fas fa-cog"></i><span>Genel Ayarlar</span></a></li>
          <li><a class="nav-link" href="iletisim.php"><i class="fas fa-phone"></i><span>İletişim Ayarları</span></a></li>
        <?php } ?>
        <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Çıkış Yap</span></a></li>
      </ul>
    </aside>
  </div>
