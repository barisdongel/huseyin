<?php include 'header.php'; include 'sidebar.php';
$habersor=$db->prepare("SELECT * FROM haberler_tbl");
$habersor->execute(array(0))?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Haberler</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Haber Resim</th>
          <th>Haber Ad</th>
          <th>Haber Tarihi</th>
          <th></th>
          <th style="width: 15%;">
            <a href="haber-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) {
            $haber_id=$habercek['haber_id'];
            ?>
            <tr>
              <td><img width="150" src="../<?=$habercek['haber_resim']; ?>"></td>
              <td><?=$habercek['haber_baslik']; ?></td>
              <td><?=$habercek['haber_tarih']; ?></td>
              <td style="text-align: center;"><a href="haber-duzenle.php?haber_id=<?=$habercek['haber_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?habersil=ok&haber_id=<?=$habercek['haber_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-md-12 text-right">
        <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
