<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
      <!-- Main Content -->
      <div class="main-content">
		<div class="col-12 col-md-12 col-lg-12">
        	<div class="card">
        	  <div class="card-header">
        	    <h4>İletişim Ayarları</h4>
        	  </div>
            <form action="../islem.php" method="POST">
        	  <div class="card-body">
                <div class="form-group">
                  <label><i class="fa fa-home"></i> Adres</label>
                  <textarea name="ayar_adres" class="form-control"><?=$ayarcek['ayar_adres'] ?></textarea>
                </div>
                <div class="form-group">
                  <label><i class="fa fa-city"></i> İl</label>
                  <input type="text" name="ayar_il" class="form-control" value="<?=$ayarcek['ayar_il'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fa fa-building"></i> İlçe</label>
                  <input type="text" name="ayar_ilce" class="form-control" value="<?=$ayarcek['ayar_ilce'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fa fa-phone"></i> Telefon</label>
                  <input type="tel" name="ayar_tel" class="form-control" value="<?=$ayarcek['ayar_tel'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fa fa-envelope"></i> Mail</label>
                  <input type="email" name="ayar_mail" class="form-control" value="<?=$ayarcek['ayar_mail'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fab fa-facebook"></i> Facebook</label>
                  <input type="text" name="ayar_facebook" class="form-control" value="<?=$ayarcek['ayar_facebook'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fab fa-twitter"></i> Twitter</label>
                  <input type="text" name="ayar_twitter" class="form-control" value="<?=$ayarcek['ayar_twitter'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fab fa-instagram"></i> Instagram</label>
                  <input type="text" name="ayar_instagram" class="form-control" value="<?=$ayarcek['ayar_instagram'] ?>">
                </div>
                <div class="form-group">
                  <label><i class="fab fa-linkedin"></i> Linkedin</label>
                  <input type="text" name="ayar_linkedin" class="form-control" value="<?=$ayarcek['ayar_linkedin'] ?>">
                </div>
        	  </div>
        	</div>
            <div class="col-md-12 text-right">
                <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
                <button class="btn btn-info" type="submit" name="iletisimguncelle">Güncelle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php' ?>
