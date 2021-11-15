<?php
include 'header.php';
include 'sidebar.php';

$galerisor=$db->prepare("SELECT * FROM galeri_tbl");
$galerisor->execute(array(0));
?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <form action="../islem.php" method="POST" enctype="multipart/form-data">
        <input style="height: 50px;" type="file" multiple name="resim[]" class="form-control dropzone">
        <div class="col-md-12 text-right p-3">
          <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
          <button class="btn btn-info" type="submit" name="galeriekle">Ekle</button>
        </div>
      </form>
      <div class="container">
        <h4 class="text-primary text-center">Galeri Resimleri</h4><hr>
        <div class="row">
          <?php while ($galericek=$galerisor->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="col-3 py-5 mb-5">
              <img class="w-100 h-100" src="../<?=$galericek['galeri_resim']; ?>">
              <a href="../islem.php?galerisil=ok&galeri_id=<?=$galericek['galeri_id'] ?>" class="btn btn-outline-primary p-3 w-100"><i class="fa fa-trash"></i> Sil</a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php' ?>
