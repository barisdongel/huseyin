<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Sık Sorulan Soru Ekle</h4>
     </div>
     <form action="../islem.php" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Soru Başlık</label>
          <input type="text" name="faq_baslik" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Soru İçerik</label>
          <textarea name="faq_icerik" type="submit" id="ckeditor1"></textarea>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="faq.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="faqekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
