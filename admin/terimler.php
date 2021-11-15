<?php include 'header.php' ?>
<?php include 'sidebar.php';

$terimsor=$db->prepare("SELECT * FROM terimler_tbl");
$terimsor->execute(array())?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Sık Sorulan Sorular</h4>
        <a href="terim-ekle.php" class="btn btn-success ml-auto"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
      </div>
      <form action="../islem.php" method="POST">
        <table class="table table-striped table-md">
          <tr>
            <th>Terim Ad</th>
            <th>Terim Kod</th>
            <th></th>
            <th></th>
            </tr>
            <?php while ($terimcek=$terimsor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td><?=$terimcek['terim_ad']; ?></td>
                <td><?=$terimcek['terim']; ?></td>
                <td><a href="terim-duzenle.php?terim_id=<?=$terimcek['terim_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
                <td><a href="../islem.php?terimsil=ok&terim_id=<?=$terimcek['terim_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
