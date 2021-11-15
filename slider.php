<?php
$slidersor =$db->prepare("SELECT * FROM slider_tbl");
$slidersor->execute(array(0))?>
<!--Slider-->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($slidersor as $rows): ?>
      <div class="carousel-item active">
        <img src="<?=$rows['slider_resim']?>" class="d-block w-100" alt="slider2">
        <div class="carousel-caption d-none d-md-block">
          <div class="slider-content">
            <h1><?=$rows['slider_baslik']?></h1>
            <p><?=$rows['slider_icerik']?></p>
          </div>
          <div class="scroll-button">
            <a href="#portfolio"><img src="assets/icon/mouse.png"></a>
            <a href="#portfolio" class="down"><img src="assets/icon/top.png"></a>
          </div>
          <div class="slider-social">
            <a href="#"><img src="assets/icon/behance.png"></a>
            <a href="#"><img src="assets/icon/facebook.png"></a>
            <a href="#"><img src="assets/icon/instagram.png"></a>
            <a href="#"><img src="assets/icon/youtube.png"></a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</div>
<!--Slider END-->
