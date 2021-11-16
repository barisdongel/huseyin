<?php include 'header.php';
$blogsor=$db->prepare("SELECT * FROM blog_tbl");
$blogsor->execute(array(0));
?>
<!--Blog-->
<section id="contact" class="m-200">
  <div class="container">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h2 class="title-dark">İLETİŞİM</h2>
          <hr>
          <div class="col-md-12">
            <form class="row g-3">
              <div class="col-md-6">
                <label for="inputName" class="form-label">İsim</label>
                <input type="text" class="form-control koseli" id="inputName">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control koseli" id="inputEmail4">
              </div>
              <div class="form-floating">
                <textarea class="form-control koseli" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Mesajınız</label>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-outline-dark koseli">GÖNDER</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>
</section>
<!--Blog End-->
<?php include 'footer.php' ?>
