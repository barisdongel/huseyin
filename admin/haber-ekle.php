<?php include 'header.php'; include 'sidebar.php'; ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Haber Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Haber Resim</label>
          <input style="height: 50px;" type="file" name="haber_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading text-primary"></i> Haber Başlık</label>
          <input type="text" name="haber_baslik" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Haber İçerik</label>
          <textarea name="haber_icerik" type="submit" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-calendar text-primary"></i> Haber Tarihi</label>
          <input type="date" name="haber_tarih" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="haberekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
