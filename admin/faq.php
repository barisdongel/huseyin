<?php include 'header.php' ?>
<?php include 'sidebar.php';

$faqsor=$db->prepare("SELECT * FROM faq_tbl");
$faqsor->execute(array())?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Sık Sorulan Sorular</h4>
      </div>
      <form action="../islem.php" method="POST">
        <table class="table table-striped table-md">
          <tr>
            <th>Başlık</th>
            <th>İçerik</th>
            <th></th>
            <th>
              <a href="faq-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
            </tr>
            <?php while ($faqcek=$faqsor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td style="width:15%;"><?php echo $faqcek['faq_baslik']; ?></td>
                <td><?php echo $faqcek['faq_icerik']; ?></td>
                <td style="text-align: center;"><a href="faq-duzenle.php?faq_id=<?php echo $faqcek['faq_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
                <td><a href="../islem.php?faqsil=ok&faq_id=<?php echo $faqcek['faq_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
