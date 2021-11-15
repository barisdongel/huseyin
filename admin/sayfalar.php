<?php include 'header.php'; include 'sidebar.php';

$sayfasor=$db->prepare("SELECT * FROM sayfalar_tbl");
$sayfasor->execute();?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Sayfalar</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Sayfa Banner</th>
          <th>Sayfa Ad</th>
          <th></th>
          <th style="width: 15%;">
            <a href="sayfa-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php foreach ($sayfasor as $rows) {?>
            <tr>
              <td><img width="150" src="../<?=$rows['sayfa_banner']; ?>"></td>
              <td><?=$rows['sayfa_adi']; ?></td>
              <td style="text-align: center;"><a href="sayfa-duzenle.php?sayfa_id=<?=$rows['sayfa_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?sayfasil=ok&sayfa_id=<?=$rows['sayfa_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
