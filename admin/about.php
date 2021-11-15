<?php include 'header.php' ?>
<?php include 'sidebar.php';
$hakkimizdasor =$db->prepare("SELECT * FROM hakkimizda_tbl");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Hakkımızda Sayfası Ayarları</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
       <div class="card-body">
         <div class="form-group">
           <label><i class="fa fa-images"></i> Hakkımızda Banner</label><br>
           <img style="width: 30%;" src="../<?=$hakkimizdacek['hakkimizda_banner'] ?>">
           <input style="height:20%;" type="file" name="hakkimizda_banner" class="form-control">
         </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Hakkımızda Sayfa Başlığı</label>
          <input type="text" name="hakkimizda_baslik" class="form-control" value="<?=$hakkimizdacek['hakkimizda_baslik'] ?>">
        </div>
        <div class="form-group">
          <label><i class="fa fa-pencil-alt"></i> Hakkımızda Slogan</label>
          <input type="text" name="hakkimizda_slogan" class="form-control" value="<?=$hakkimizdacek['hakkimizda_slogan'] ?>">
        </div>
        <div class="form-group">
          <label><i class="fa fa-pencil-alt"></i> Hakkımızda Yazısı</label>
          <textarea rows="8" name="hakkimizda_yazi" class="form-control" id="ckeditor1"><?=$hakkimizdacek['hakkimizda_yazi'] ?></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-image"></i> Hakkımızda Foto</label><br>
          <img style="width: 30%;" src="../<?=$hakkimizdacek['hakkimizda_foto'] ?>">
          <input style="height:20%;" type="file" name="hakkimizda_foto" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-pencil-alt"></i> Vizyon Yazı</label>
          <textarea rows="8" name="vizyon_yazi" class="form-control"><?=$hakkimizdacek['vizyon_yazi'] ?></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-image"></i> Vizyon Foto</label><br>
          <img style="width: 30%;" src="../<?=$hakkimizdacek['vizyon_foto'] ?>">
          <input type="text" name="vizyon_foto" class="form-control" value="<?=$hakkimizdacek['vizyon_foto'] ?>">
        </div>
        <div class="form-group">
          <label><i class="fa fa-pencil-alt"></i> Misyon Yazı</label>
          <textarea rows="8" name="misyon_yazi" class="form-control"><?=$hakkimizdacek['misyon_yazi'] ?></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-image"></i> Misyon Foto</label><br>
          <img style="width: 30%;" src="../<?=$hakkimizdacek['misyon_foto'] ?>">
          <input type="text" name="misyon_foto" class="form-control" value="<?=$hakkimizdacek['misyon_foto'] ?>">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="hakkimizdaguncelle">Güncelle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
