<?php include 'header.php'; include 'sidebar.php'; ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Sayfa Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Sayfa Banner</label>
          <input style="height: 50px;" type="file" name="sayfa_banner" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-images text-primary"></i> Sayfa Resim</label>
          <input style="height: 50px;" type="file" name="sayfa_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading text-primary"></i> Sayfa Adı</label>
          <input type="text" name="sayfa_adi" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Sayfa İçerik</label>
          <textarea name="sayfa_icerik" type="submit" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-share text-primary"></i> Sayfa linki</label>
          <input type="text" name="sayfa_link" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="sayfalar.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="sayfaekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
