<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="section-header-breadcrumb-content">
            <h1>Kullanıcı Ayarları</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4 background-image-body">
        <div class="col-md-12 col-lg-12 box-center">
          <div class="row author-box">
            <img alt="image" src="<?php echo $kullanicicek['kullanici_foto'] ?>" class="rounded-circle author-box-picture box-center mt-4">
          </div>
          <div class="row author-box">
            <div class="page-inner box-center align-center">
              <h2><a href="#"><?php echo $kullanicicek['kullanici_adsoyad'] ?></a></h2>
              <div class="page-description">
                <h5><?php
                if ($kullanicicek['kullanici_yetki']==0 ) {
                  echo "ROOT";
                }elseif ($kullanicicek['kullanici_yetki']==1 ) {
                  echo "YÖNETİCİ";
                }elseif ($kullanicicek['kullanici_yetki']==2 ) {
                  echo "ÜYE";
                }else{
                  echo "KULLANICI";
                }
                ?></h5>
              </div>
            </div>
          </div> 
          <div class="row author-box mb-4">
            <div class="box-center align-center">
              <div class="mb-2 mt-3">
                <h6>Sosyal Medya Hesapları</h6>
              </div>
              <a href="<?php echo $kullanicicek['kullanici_facebook']?>" class="btn btn-social-icon mr-1 btn-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="<?php echo $kullanicicek['kullanici_twitter'] ?>" class="btn btn-social-icon mr-1 btn-twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="<?php echo $kullanicicek['kullanici_github'] ?>" class="btn btn-social-icon mr-1 btn-github">
                <i class="fab fa-github"></i>
              </a>
              <a href="<?php echo $kullanicicek['kullanici_instagram'] ?>" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <div class="w-100 d-sm-none"></div>
            </div>
          </div>              
        </div>
      </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Kullanıcı Detayları</h4>
            </div>
            <div class="card-body">
              <div class="py-4">
                <p class="clearfix">
                  <span class="float-left">
                    Doğum Yeri
                  </span>
                  <span class="float-right text-muted">
                    <?php echo $kullanicicek['kullanici_dogumyeri'] ?>
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Facebook
                  </span>
                  <span class="float-right text-muted">
                    <a class="btn btn-social-icon btn-facebook" href="<?php echo $kullanicicek['kullanici_facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Twitter
                  </span>
                  <span class="float-right text-muted">
                    <a class="btn btn-social-icon btn-twitter " href="<?php echo $kullanicicek['kullanici_twitter'] ?>"><i class="fab fa-twitter"></i></a>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
          <div class="card">
            <div class="padding-20">
              <ul class="nav nav-pills mb-1" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                  aria-selected="true">Kullanıcı Hakkında</a>
                </li>
              </ul>
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                  <div class="row">
                    <div class="col-md-3 col-6 b-r">
                      <strong>Adı</strong>
                      <br>
                      <p class="text-muted"><?php echo $kullanicicek['kullanici_adsoyad'] ?></p>
                    </div>
                    <div class="col-md-3 col-6 b-r">
                      <strong>Telefon</strong>
                      <br>
                      <p class="text-muted"><?php echo $kullanicicek['kullanici_tel'] ?></p>
                    </div>
                    <div class="col-md-3 col-6 b-r">
                      <strong>Email</strong>
                      <br>
                      <p class="text-muted"><?php echo $kullanicicek['kullanici_ad'] ?></p>
                    </div>
                    <div class="col-md-3 col-6">
                      <strong>Doğum Yeri</strong>
                      <br>
                      <p class="text-muted"><?php echo $kullanicicek['kullanici_dogumyeri']; ?></p>
                    </div>
                  </div>
                  <p class="m-t-30"><?php echo $kullanicicek['kullanici_hakkinda'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
<?php include 'footer.php' ?>