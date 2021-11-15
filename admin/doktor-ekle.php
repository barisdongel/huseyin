<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Doktor Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Çalışan Resim</label>
          <input style="height: 50px;" type="file" name="calisan_foto" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Çalışan İkinci Resim</label>
          <input style="height: 50px;" type="file" name="calisan_ikincifoto" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading text-primary"></i> Çalışan Ad Soyad</label>
          <input type="text" name="calisanlar_adsoyad" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Çalışan Görevi</label>
          <input type="text" name="calisanlar_gorevi" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-phone text-primary"></i> Çalışan Telefon</label>
          <input type="tel" name="calisan_telefon" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-envelope text-primary"></i> Çalışan Mail</label>
          <input type="email" name="calisan_mail" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fab fa-facebook text-primary"></i> Çalışan Facebook</label>
          <input type="text" name="calisan_facebook" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fab fa-instagram text-primary"></i> Çalışan Instagram</label>
          <input type="text" name="calisan_instagram" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fab fa-twitter text-primary"></i> Çalışan Twitter</label>
          <input type="text" name="calisan_twitter" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fas fa-barcode text-primary"></i> Çalışan Kodu</label>
          <input type="number" name="calisan_kodu" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="doktorekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
