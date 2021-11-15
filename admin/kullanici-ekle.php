<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Kullanıcı Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <div class="form-group">
            <label><i class="fa fa-image"></i> Kullanıcı Fotoğrafı</label>
            <input style="height: 50px;" type="file" name="kullanici_foto" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> KullaniciAdı</label>
          <input type="email" name="kullanici_ad" class="form-control" required="">
        </div>
        <div class="form-group">
          <label><i class="fa fa-share"></i> Kullanici Şifre</label>
          <input type="text" name="kullanici_sifre" class="form-control" required="">
        </div>
        <div class="form-group">
          <label><i class="fas fa-list-ol"></i> Kullanici Ad Soyad</label>
          <input type="text" name="kullanici_adsoyad" class="form-control" required="">
        </div>
        <div class="form-group">
          <label><i class="fas fa-list-ol"></i> Kullanici Hakkında</label>
          <textarea rows="8" name="kullanici_hakkinda" class="form-control" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fas fa-list-ol"></i> Kullanici Doğum Yeri</label>
          <input type="text" name="kullanici_dogumyeri" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fas fa-list-ol"></i> Kullanici Doğum Tarihi</label>
          <input type="date" name="kullanici_zaman" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-phone"></i> Telefon Numarası</label>
          <input type="tel" name="kullanici_tel" class="form-control" placeholder="tel">
        </div>
        <div class="form-group">
          <select class="form-control" name="kullanici_yetki">
            <option value="1">Yönetici</option>
            <option value="2">Üye</option>
          </select>
        </div>
        <h6>Sosyal Medya Hesapları</h6>
        <div class="form-group">
          <label><i class="fab fa-facebook"></i> Facebook</label>
          <input type="text" name="kullanici_facebook" class="form-control" placeholder="url">
        </div>
        <div class="form-group">
          <label><i class="fab fa-twitter"></i> Twitter</label>
          <input type="text" name="kullanici_twitter" class="form-control" placeholder="url">
        </div>
        <div class="form-group">
          <label><i class="fab fa-github"></i> Github</label>
          <input type="text" name="kullanici_github" class="form-control" placeholder="url">
        </div>
        <div class="form-group">
          <label><i class="fab fa-instagram"></i> Instagram</label>
          <input type="text" name="kullanici_instagram" class="form-control" placeholder="url">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="kullanicilar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="kullaniciekle">Ekle</button>              
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
