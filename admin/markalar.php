<?php include 'header.php' ?>
<?php include 'sidebar.php';

$markasor=$db->prepare("SELECT * FROM markalar_tbl");
$markasor->execute(array())?>
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
          <th>Marka Resim</th>
          <th>Marka Ad</th>
          <th></th>
          <th style="width: 15%;">
            <a href="marka-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($markacek=$markasor->fetch(PDO::FETCH_ASSOC)) {
            $marka_id=$markacek['markalar_id'];
            ?>
            <tr>
              <td class="text-center"><img style="width: 30%;" src="../<?php echo $markacek['marka_foto']; ?>"></td>
              <td><?php echo $markacek['marka_ad']; ?></td>
              <td></td>
              <td><a href="../islem.php?markasil=ok&markalar_id=<?php echo $markacek['markalar_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
