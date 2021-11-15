<?php include 'header.php'; include 'sidebar.php';

$kategorisor=$db->prepare("SELECT * FROM blog_tbl inner join blog_kategori on blog_kategori.blog_kat_id=blog_tbl.blog_kategori");
$kategorisor->execute();

$blogsor=$db->prepare("SELECT * FROM blog_tbl");
$blogsor->execute(array(0))?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Bloglar</h4>
     </div>
     <form action="../islem.php" method="POST">
      <table class="table table-striped table-md">
        <tr>
          <th>Blog Resim</th>
          <th>Blog Ad</th>
          <th>Blog Kategori</th>
          <th>Blog Tarihi</th>
          <th></th>
          <th style="width: 15%;">
            <a href="blog-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) {
            $blog_id=$blogcek['blog_id'];
            ?>
            <tr>
              <td><img width="150" src="../<?=$blogcek['blog_resim']; ?>"></td>
              <td><?=$blogcek['blog_baslik']; ?></td>
              <?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
              <td><?=$kategoricek['kategori_adi']; ?></td>
              <td><?=$blogcek['blog_tarih']; ?></td>
              <td style="text-align: center;"><a href="blog-duzenle.php?blog_id=<?=$blogcek['blog_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?blogsil=ok&blog_id=<?=$blogcek['blog_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
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
