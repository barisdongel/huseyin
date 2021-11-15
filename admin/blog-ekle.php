<?php include 'header.php'; include 'sidebar.php'; ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Blog Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Blog Resim</label>
          <input style="height: 50px;" type="file" name="blog_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading text-primary"></i> Blog Başlık</label>
          <input type="text" name="blog_baslik" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Blog Kategorisi</label>
          <select class="form-control" name="blog_kategori">
            <?php
            $kategorisor=$db->prepare("SELECT * FROM blog_kategori ORDER BY kategori_adi ASC");
            $kategorisor->execute();
            while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?=$kategoricek['blog_kat_id'] ?>"><?=$kategoricek['kategori_adi'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label><i class="fas fa-closed-captioning text-primary"></i></i> Blog İçerik</label>
          <textarea name="blog_icerik" type="submit" id="ckeditor1"></textarea>
        </div>
        <div class="form-group">
          <label><i class="fa fa-calendar text-primary"></i> Blog Tarihi</label>
          <input type="date" id="datepicker" name="blog_tarih" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="blogekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
