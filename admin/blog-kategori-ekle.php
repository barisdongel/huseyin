<?php include 'header.php'; include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Blog Kategori Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-image text-primary"></i> Kategori Resim</label>
          <input style="height: 50px;" type="file" name="kategori_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Kategori Adı</label>
          <input type="text" name="kategori_adi" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Kategori Açıklama</label>
          <textarea name="kategori_aciklama" type="submit" id="ckeditor1"></textarea>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="blog-kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="blogkategoriekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
