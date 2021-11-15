<?php include 'header.php'; include 'sidebar.php';
$fotogalerisor=$db->prepare("SELECT * FROM urun_fotogaleri_tbl where urun_id=:urun_id");
$fotogalerisor->execute(array('urun_id' => $_GET['urun_id']))?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <form action="../islem.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="urun_id" value="<?=$_GET['urun_id']; ?>">
        <input style="height: 50px;" type="file" multiple name="resim[]" class="form-control dropzone">
        <div class="col-md-12 text-right p-3">
          <a class="btn btn-warning" href="urunler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
          <button class="btn btn-info" type="submit" name="fotogaleriekle">Ekle</button>
        </div>
      </form>
      <table class="table table-striped table-md">
        <tr>
          <th>Fotogaleri Resimleri</th>
          <th></th>
          </tr>
          <?php while ($fotogalericek=$fotogalerisor->fetch(PDO::FETCH_ASSOC)) {
            $fotogaleri_id=$fotogalericek['fotogaleri_id'];
            ?>
            <tr>
              <td class="text-center"><img style="width: 25%;" src="../<?=$fotogalericek['resim']; ?>"></td>
              <td><a href="../islem.php?fotogalerisil=ok&fotogaleri_id=<?=$fotogalericek['fotogaleri_id'] ?>" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
            </tr>
          <?php } ?>
        </table>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php' ?>
