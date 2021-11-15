<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Hizmet Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <div class="form-group">
            <label><i class="fa fa-image"></i> Hizmet Fotoğrafı</label>
            <input style="height: 50px;" type="file" name="hizmet_foto" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fas fa-icons"></i> Hizmet İcon</label>
            <input style="height: 50px;" type="file" name="hizmet_icon" class="form-control">
          </div>
          <label><i class="fa fa-heading"></i> Hizmet Ad</label>
          <input type="text" name="hizmet_ad" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-file"></i> Hizmet Açıklaması</label>
          <input type="text" name="hizmet_aciklama" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list"></i> Hizmet Özellikleri</label>
          <textarea name="hizmet_ozellik" type="submit" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Hizmet Kategorisi</label>
          <select class="form-control" name="hizmet_kategori">
            <?php
            $kategorisor=$db->prepare("SELECT * FROM hizmetkategori_tbl ORDER BY kategori_ad ASC");
            $kategorisor->execute();
            while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?=$kategoricek['kategori_id'] ?>"><?=$kategoricek['kategori_ad'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="hizmetler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="hizmetekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
