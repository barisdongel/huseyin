<?php
include 'header.php';
include 'slider.php';

//portfolyo
$portfolyosor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=31 LIMIT 6");
$portfolyosor->execute(array(0));

//urunler
$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=32 LIMIT 6");
$urunsor->execute(array(0));

//Blog
$blogsor =$db->prepare("SELECT * FROM blog_tbl ORDER BY blog_tarih DESC LIMIT 3");
$blogsor->execute(array(0));

//markalar
$markasor =$db->prepare("SELECT * FROM markalar_tbl");
$markasor->execute(array(0));
?>
<!--Portfolio-->
<section id="portfolio">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h2 class="title-dark">PORTFOLYO</h2>
          <hr class="cizgi">
          <div class="portfolio-item">
            <div class="row">
              <?php foreach ($portfolyosor as $rows): ?>

                <div class="col-md-6">
                  <div class="card card-portfolio">
                    <img src="<?=$rows['urun_foto']?>" class="portfolio-img" alt="<?=$rows['urun_ad']?>">
                    <div class="card-img-overlay portfolio-overlay">
                      <div class="d-flex d-flex-title">
                        <h4><?=$rows['urun_ad']?></h4>
                      </div>
                      <div class="d-flex d-flex-link d-none">
                        <a href="portfolio?urun_id=<?=$rows['urun_id']?>" class="card-text">Daha Fazlasını Gör</a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
</section>
<!--Portfolio End-->

<!--Project-->
<section id="project">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h2 class="title-dark">PROJECT</h2>
          <hr class="cizgi">
          <div class="project-item">
            <div class="row">
              <div class="col-md-6">
                <h2>Inoception Digital Agency</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-6">
                  <img src="assets/img/projects/inoception-logo-mockup.png">
                </div>
                <div class="col-md-6">
                  <img src="assets/img/projects/sueno-logo-mockup.png">
                </div>
                <div class="col-md-6">
                  <h2>Sueno Tablo</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </section>
    <!--Project End-->

    <!--Products-->
    <section id="product">
      <div class="container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <h2 class="title-dark">ÜRÜNLER</h2>
              <hr class="cizgi">
              <div class="product-item">
                <div class="row">
                  <?php foreach ($urunsor as $rows): ?>
                    <div class="col-md-4">
                      <img src="<?=$rows['urun_foto']?>">
                      <h5><?=$rows['urun_ad']?></h5>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </section>
    <!--Products End-->

    <!--Blog-->
    <section id="blog">
      <div class="container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <h2 class="title-dark">BLOG</h2>
              <hr>
              <div class="blog-item">
                <div class="row">
                  <?php foreach ($blogsor as $rows): ?>
                    <div class="col-md-4">
                      <div class="card blog-portfolio">
                        <img src="<?=$rows['blog_resim']?>" class="card-img blog-img" alt="<?=$rows['blog_baslik']?>">
                        <div class="card-img-overlay blog-overlay d-flex" id="data-1">
                          <div class="d-flex-title">
                            <h1><?=$rows['blog_baslik']?></h1>
                          </div>
                          <span class="date"><?=$rows['blog_tarih']?></span>
                          <div class="flex-text d-flex">
                            <a href="blog?blog_id=<?=$rows['blog_id']?>" class="card-text d-none">Daha Fazlasını Gör</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </section>
    <!--Blog End-->


    <!--Footer-->
    <footer id="contact">
      <div class="footer-slogan">
        <h3>Kafa Kafaya Verip Sınırsız Fikirler Üretmek İstiyorsan</h3>
        <br>
        <a href="#">İLETİŞİME GEÇ</a>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row partners d-flex">
              <?php foreach ($markasor as $rows): ?>
                <div class="col-md-4">
                  <img src="<?=$rows['marka_foto']?>" alt="<?=$rows['marka_ad']?>">
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php include 'footer.php'; ?>
