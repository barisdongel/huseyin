<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
      <!-- Main Content -->
      <div class="main-content">
		<div class="col-12 col-md-12 col-lg-12">
        	<div class="card">
        	  <div class="card-header">
        	    <h4>Tanıtım Filmi Ayarları</h4>
        	  </div>
            <form action="../islem.php" method="POST">
            <?=$ayarcek['ayar_tanitimfilmi']  ?>
        	  <div class="card-body">
                <div class="form-group">
                  <label><i class="fa fa-home"></i> Tanıtım Filmi İframe Linki</label>
                  <textarea name="ayar_tanitimfilmi" class="form-control"><?=$ayarcek['ayar_tanitimfilmi'] ?></textarea>
                </div>
        	  </div>
        	</div>
            <div class="col-md-12 text-right">
                <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
                <button class="btn btn-info" type="submit" name="tanitimfilmi">Güncelle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php' ?>
