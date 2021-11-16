<?php include 'header.php';
$blogsor=$db->prepare("SELECT * FROM blog_tbl where blog_id=:blog_id");
$blogsor->execute(array('blog_id' => $_GET['blog_id']));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

$kategorisor=$db->prepare("SELECT * FROM blog_tbl inner join blog_kategori on blog_kategori.blog_kat_id=blog_tbl.blog_kategori where blog_id=:blog_id");
$kategorisor->execute(array('blog_id' => $_GET['blog_id']));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!--Blog-->
<section id="blog" class="m-150">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="blog-item">
            <div class="row">
              <h2 class="text-center"><?=$blogcek['blog_baslik']?></h2>
              <hr>
              <span class="text-light bg-dark koseli p-2 w-25 text-light">Kategori: <?=$kategoricek['kategori_adi']?></span>
              <img class="mt-4" src="<?=$blogcek['blog_resim']?>" alt="<?=$blogcek['blog_baslik']?>">
              <p class="prompt"><?=$blogcek['blog_icerik']?></p>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
</section>
<!--Blog End-->
<?php include 'footer.php' ?>
