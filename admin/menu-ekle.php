<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Menü Ekle</h4>
      </div>
      <form action="../islem.php" method="POST">
        <div class="card-body">
          <div class="form-group">
            <label><i class="fa fa-thumbtack"></i> Menü Üst</label>
            <select class="form-control" name="menu_ust">
              <option value="0">Üst Menü</option>
              <?php
              $menusor=$db->prepare("SELECT * FROM menu_tbl ORDER BY menu_ad ASC");
              $menusor->execute();
              while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?=$menucek['menu_id'] ?>"><?=$menucek['menu_ad'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label><i class="fa fa-thumbtack"></i> Menü Sayfa</label>
            <select class="form-control" name="menu_sayfa">
              <option value="0">Sayfa Yok</option>
              <?php
              $sayfasor=$db->prepare("SELECT * FROM sayfalar_tbl ORDER BY sayfa_adi ASC");
              $sayfasor->execute();
              while ($sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?=$sayfacek['sayfa_id'] ?>"><?=$sayfacek['sayfa_adi'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label><i class="fa fa-heading"></i> Menü Ad</label>
            <input type="text" name="menu_ad" class="form-control">
          </div>

          <!--URL girişi hakkında bilgi alanı-->
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  URL GİRİŞİ HAKKINDA BİLGİ
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <i class="fa fa-info"></i><span class="text-muted"> 'hizmetlerimiz' olarak girilirse menü hizmetleri listeler,</span><br>
                  <i class="fa fa-info"></i><span class="text-muted"> 'ürünlerimiz' olarak girilirse menü ürünleri listeler,</span><br>
                  <i class="fa fa-info"></i><span class="text-muted"> Boş bırakılırsa alt menülere sahip bir üst menü olarak algılanır.</span>
                </div>
              </div>
            </div>
          </div>
          <!--URL girişi hakkında bilgi alanı son-->

          <div class="form-group">
            <label><i class="fa fa-share"></i> Menü URL</label><br>
            <input type="text" name="menu_url" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fas fa-list-ol"></i> Menü Sıra</label>
            <input type="number" name="menu_sira" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <a class="btn btn-warning" href="menu.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
        <button class="btn btn-info" type="submit" name="menukaydet">Ekle</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
