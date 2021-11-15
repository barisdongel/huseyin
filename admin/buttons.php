<?php include 'header.php'; include 'sidebar.php';

$butonsor=$db->prepare("SELECT * FROM butonlar_tbl");
$butonsor->execute(array(0))?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Butonlar</h4>
      </div>
      <form action="../islem.php" method="POST">
        <table class="table table-striped table-md">
          <tr>
            <th>Buton Adi</th>
            <th>Buton Linki</th>
            <th></th>
            <th>
              <a href="button-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
            </tr>
            <?php while ($butoncek=$butonsor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td><?=$butoncek['buton_adi']; ?></td>
                <td><?=$butoncek['buton_link']; ?></td>
                <td style="text-align: center;"><a href="button-duzenle.php?buton_id=<?=$butoncek['buton_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
                <td><a href="../islem.php?butonsil=ok&buton_id=<?=$butoncek['buton_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
