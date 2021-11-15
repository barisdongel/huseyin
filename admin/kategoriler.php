<?php include 'header.php' ?>
<?php include 'sidebar.php';

$kategorisor=$db->prepare("SELECT * FROM kategori_tbl");
$kategorisor->execute();?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Kategoriler</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Kategori id</th>
          <th>Kategori Adı</th>
          <th></th>
          <th>
            <a href="kategori-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?php echo $kategoricek['kategori_id']; ?></td>
              <td><?php echo $kategoricek['kategori_ad']; ?></td>
              <td style="text-align: center;"><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?kategorisil=ok&kategori_id=<?php echo $kategoricek['kategori_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
