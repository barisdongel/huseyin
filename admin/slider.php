<?php include 'header.php' ?>
<?php include 'sidebar.php';

$slidersor=$db->prepare("SELECT * FROM slider_tbl");
$slidersor->execute(array())?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Menü Ayarları</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th class="text-center">Slider Resim</th>
          <th>Slider Ad</th>
          <th>Slider Sıra</th>
          <th></th>
          <th style="width: 15%;">
            <a href="slider-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
            $slider_id=$slidercek['slider_id'];
            ?>
            <tr>
              <td class="text-center"><img style="width: 50%;" src="../<?php echo $slidercek['slider_resim']; ?>"></td>
              <td><?php echo $slidercek['slider_ad']; ?></td>
              <td><?php echo $slidercek['slider_sira']; ?></td>
              <td><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
