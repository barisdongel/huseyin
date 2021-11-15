<?php include 'header.php' ?>
<?php include 'sidebar.php';

$menusor=$db->prepare("SELECT * FROM menu_tbl where menu_ust=:menu_ust ORDER BY menu_sira ASC");
$menusor->execute(array(
  'menu_ust' => 0));
  ?>
  <!-- Main Content -->
  <div class="main-content">
    <div class="col-12 col-md-12 col-lg-12">
     <div class="card">
       <div class="card-header">
         <h4>Menü Ayarları</h4>
       </div>
       <form action="../islem.php" method="POST">
        <table class="table table-striped table-md">
          <tr>
            <th>Menü Adı</th>
            <th>Üst Menü</th>
            <th>Menü URL</th>
            <th>Menü Sıra</th>
            <th></th>
            <th>
              <a href="menu-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
            </tr>
            <?php while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
              $menu_id=$menucek['menu_id'];
              ?>
              <tr>
                <td><?=$menucek['menu_ad']; ?></td>
                <td><?=$menucek['menu_ust']; ?></td>
                <td><?=$menucek['menu_url']; ?></td>
                <td><?=$menucek['menu_sira']; ?></td>
                <td style="text-align: center;"><a href="menu-duzenle.php?menu_id=<?=$menucek['menu_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
                <td style="text-align: center;"><a href="../islem.php?menusil=ok&menu_id=<?=$menucek['menu_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
              </tr>
              <?php
              $altmenusor=$db->prepare("SELECT * FROM menu_tbl where menu_ust=:menu_id ORDER BY menu_sira");
              $altmenusor->execute(array(
                'menu_id' => $menu_id
              ));
              while ($altmenucek=$altmenusor->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td>---- <?=$altmenucek['menu_ad']; ?></td>
                  <td><?=$menucek['menu_ad'] ?></td>
                  <td><?=$altmenucek['menu_url']; ?></td>
                  <td><?=$altmenucek['menu_sira']; ?></td>
                  <td style="text-align: center;"><a href="menu-duzenle.php?menu_id=<?=$altmenucek['menu_id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
                  <td style="text-align: center;"><a href="../islem.php?menusil=ok&menu_id=<?=$altmenucek['menu_id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
                </tr>
              <?php } } ?>
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
