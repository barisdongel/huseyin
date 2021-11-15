<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Yedek Parça Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <div class="form-group">
            <label><i class="fa fa-image"></i> Yedek Parça Fotoğrafı</label>
            <input style="height: 50px;" type="file" name="yedekparca_foto" class="form-control">
          </div>
          <label><i class="fa fa-heading"></i> Yedek Parça Ad</label>
          <input type="text" name="yedekparca_ad" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="yedekparca.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="yedekparcaekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
