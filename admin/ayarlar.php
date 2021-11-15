<?php include 'header.php'; include 'sidebar.php'; ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Site Genel Ayarları</h4>
   </div>
   <form action="../islem.php" method="POST" enctype="multipart/form-data">
     <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Site Başlığı</label>
          <input type="text" name="ayar_title" value="<?=$ayarcek['ayar_title'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-image"></i> Logo</label><br>
          <img style="width: 30%;" src="../<?=$ayarcek['ayar_logo'] ?>">
          <input style="height: 30%;" type="file" name="ayar_logo" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-code"></i> Site Yazarı</label>
          <input type="text" name="ayar_author" value="<?=$ayarcek['ayar_author'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-share-alt"></i> Site URL</label>
          <input type="url" name="ayar_siteurl" value="<?=$ayarcek['ayar_siteurl'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-align-left"></i> Site Açıklaması</label>
          <input type="text" name="ayar_desc" value="<?=$ayarcek['ayar_desc'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-key"></i> Anahtar Kelimeler</label>
          <input type="text" name="ayar_key" value="<?=$ayarcek['ayar_key'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-heading"></i> Ana Sayfa Başlığı</label>
          <input type="text" name="ayar_baslik" value="<?=$ayarcek['ayar_baslik'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-clock"></i> Çalışma Saatleri Yazısı</label>
          <input type="text" name="ayar_calismasaatleri" value="<?=$ayarcek['ayar_calismasaatleri'] ?>" class="form-control">
      </div>
      <div class="form-group">
          <label><i class="fa fa-chevron-circle-down"></i> Footer Yazısı</label>
          <textarea rows="8" name="ayar_footer" class="form-control" id="ckeditor1"><?=$ayarcek['ayar_footer'] ?></textarea>
      </div>
      <hr>
      <h5><i class="fa fa-ghost"></i> API AYARLARI (iframe kodunu buraya yapıştırın)</h5>
      <div class="form-group">
          <label><i class="fa fa-heading"></i> Google Map Api</label>
          <textarea rows="5" type="text" name="ayar_googlemap" class="form-control"><?=$ayarcek['ayar_googlemap'] ?></textarea>
      </div>
  </div>
</div>
<div class="col-md-12 text-right">
    <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
    <button class="btn btn-info" type="submit" name="ayarguncelle">Güncelle</button>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
