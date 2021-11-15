<?php include 'header.php'; include 'sidebar.php';

$kategorisor=$db->prepare("SELECT * FROM blog_kategori");
$kategorisor->execute();?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Blog Kategorileri</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Kategori Fotosu</th>
          <th>Kategori Adı</th>
          <th>Kategori Açıklaması</th>
          <th></th>
          <th>
            <a href="blog-kategori-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><img width="150" src="../<?=$kategoricek['kategori_resim']; ?>"></td>
              <td><?=$kategoricek['kategori_adi']; ?></td>
              <td><?=kisalt($kategoricek['kategori_aciklama'],100); ?></td>
              <td style="text-align: center;"><a href="blog-kategori-duzenle.php?blog_kat_id=<?=$kategoricek['blog_kat_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?blogkategorisil=ok&blog_kat_id=<?=$kategoricek['blog_kat_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
