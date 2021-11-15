<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Site Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image"></i> Slider Resim</label>
          <input style="height: 50px;" type="file" name="slider_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Slider Ad</label>
          <input type="text" name="slider_ad" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Slider Başlık</label>
          <input type="text" name="slider_baslik" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Slider İçerik</label>
          <input type="text" name="slider_icerik" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Slider Buton</label>
          <input type="text" name="slider_buton" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-share"></i> Slider URL</label>
          <input type="text" name="slider_link" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list"></i> Slider Sıra</label>
          <input type="text" name="slider_sira" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="slider.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="sliderekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
