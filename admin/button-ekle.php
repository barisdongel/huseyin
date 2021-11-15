<?php include 'header.php'; include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Buton Ekle</h4>
     </div>
     <form action="../islem.php" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Buton Adi</label>
          <input type="text" name="buton_adi" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-share"></i> Buton Linki</label>
          <input type="text" name="buton_link" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-pencil-alt"></i> Buton Class</label>
          <input type="text" name="buton_class" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list-alt"></i> Buton Target</label>
          <select name="buton_target" class="form-control" id="buton_target">
            <option value="_blank">Yeni Sekme (_blank)</option>
            <option value="_self">Normal (_self)</option>
          </select>
        </div>
        <div class="form-group">
          <label><i class="fa fa-toggle-on"></i> Buton Yayında</label>
          <select name="buton_yayin-" class="form-control" id="buton_yayin">
            <option value="0">Evet</option>
            <option value="1">Hayır</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="buttons.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="butonekle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
