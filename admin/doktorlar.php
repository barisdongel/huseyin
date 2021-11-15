<?php include 'header.php' ?>
<?php include 'sidebar.php';

$doktorsor=$db->prepare("SELECT * FROM calisanlar_tbl");
$doktorsor->execute(array())?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Markalar</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Doktor Resim</th>
          <th>Doktor Ad</th>
          <th>Doktor Görevi</th>
          <th>Doktor Telefon</th>
          <th>Doktor Maili</th>
          <th>Doktor Kimlik Kodu</th>
          <th></th>
          <th style="width: 15%;">
            <a href="doktor-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($doktorcek=$doktorsor->fetch(PDO::FETCH_ASSOC)) {
            $doktor_id=$doktorcek['calisanlar_id'];
            ?>
            <tr>
              <td class="text-center"><img style="width: 30%;" src="../<?=$doktorcek['calisan_foto']; ?>"></td>
              <td><?=$doktorcek['calisanlar_adsoyad']; ?></td>
              <td><?=$doktorcek['calisanlar_gorevi']; ?></td>
              <td><?=$doktorcek['calisan_telefon']; ?></td>
              <td><?=$doktorcek['calisan_mail']; ?></td>
              <td><?=$doktorcek['calisan_kodu']; ?></td>
              <td style="text-align: center;"><a href="doktor-duzenle.php?calisanlar_id=<?=$doktorcek['calisanlar_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?doktorsil=ok&calisanlar_id=<?=$doktorcek['calisanlar_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
