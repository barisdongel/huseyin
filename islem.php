<?php
ob_start();
session_start();
include 'baglan.php';

/*
GÜNCELLEME İŞLEMLERİ
*/

//Genel Ayarlar Güncelleme şlemi
if (isset($_POST['ayarguncelle'])) {

  $ayarsor =$db->prepare("SELECT * FROM ayar_tbl");
  $ayarsor->execute(array(0));
  $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

  if ($_FILES['ayar_logo']['size'] != 0) {
    $uploads_dir = 'assets/img/';
    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
    @$name = $_FILES['ayar_logo']["name"];
    $refimgyol = $uploads_dir.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$name");
  }else {
    $refimgyol = $ayarcek['ayar_logo'];
  }

  $ayarkaydet=$db->prepare("UPDATE ayar_tbl SET
    ayar_siteurl=:siteurl,
    ayar_title=:title,
    ayar_desc=:description,
    ayar_author=:author,
    ayar_key=:key,
    ayar_baslik=:baslik,
    ayar_footer=:footer,
    ayar_logo=:logo,
    ayar_googlemap=:map,
    ayar_calismasaatleri=:saat
    WHERE ayar_id=0
    ");
    $update=$ayarkaydet->execute(array(
      'siteurl' => $_POST['ayar_siteurl'],
      'title' => $_POST['ayar_title'],
      'description' => $_POST['ayar_desc'],
      'author' => $_POST['ayar_author'],
      'key' => $_POST['ayar_key'],
      'baslik' => $_POST['ayar_baslik'],
      'footer' => $_POST['ayar_footer'],
      'map' => $_POST['ayar_googlemap'],
      'saat' => $_POST['ayar_calismasaatleri'],
      'logo' => $refimgyol
    ));

    if ($update) {
      Header("Location:admin/ayarlar.php?durum=ok");
    }
    else{
      Header("Location:admin/ayarlar.php?durum=no");
    }
  }
  //İletişim Ayarları Güncelleme İşlemi
  if (isset($_POST['iletisimguncelle'])) {

    $iletisimkaydet=$db->prepare("UPDATE ayar_tbl SET
      ayar_adres=:adres,
      ayar_il=:il,
      ayar_ilce=:ilce,
      ayar_tel=:tel,
      ayar_mail=:mail,
      ayar_facebook=:facebook,
      ayar_twitter=:twitter,
      ayar_instagram=:instagram,
      ayar_linkedin=:linkedin
      WHERE ayar_id=0
      ");
      $update=$iletisimkaydet->execute(array(
        'adres' => $_POST['ayar_adres'],
        'il' => $_POST['ayar_il'],
        'ilce' => $_POST['ayar_ilce'],
        'tel' => $_POST['ayar_tel'],
        'mail' => $_POST['ayar_mail'],
        'facebook' => $_POST['ayar_facebook'],
        'twitter' => $_POST['ayar_twitter'],
        'instagram' => $_POST['ayar_instagram'],
        'linkedin' => $_POST['ayar_linkedin']
      ));

      if ($update) {
        Header("Location:admin/iletisim.php?durum=ok");
      }
      else{
        Header("Location:admin/iletisim.php?durum=no");
      }
    }

    //Hakkmızda Sayfası Güncelleme İlemi
    if (isset($_POST['hakkimizdaguncelle'])) {

      $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda_tbl");
      $hakkimizdasor->execute(array(0));
      $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

      if ($_FILES['hakkimizda_foto']['size'] != 0) {
        $uploads_dir = 'assets/img/';
        @$tmp_name = $_FILES['hakkimizda_foto']["tmp_name"];
        @$name = $_FILES['hakkimizda_foto']["name"];
        $refimgyol = $uploads_dir.$name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$name");
      }else {
        $refimgyol = $hakkimizdacek['hakkimizda_foto'];
      }
      if ($_FILES['hakkimizda_banner']['size'] != 0) {
        $uploads_dir = 'assets/img/';
        @$tmp_name = $_FILES['hakkimizda_banner']["tmp_name"];
        @$name = $_FILES['hakkimizda_banner']["name"];
        $banner = $uploads_dir.$name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$name");
      }else {
        $banner = $hakkimizdacek['hakkimizda_banner'];
      }

      $hakkimizdakaydet=$db->prepare("UPDATE hakkimizda_tbl SET
        hakkimizda_baslik=:hbaslik,
        hakkimizda_yazi=:hyazi,
        hakkimizda_slogan=:hslogan,
        vizyon_yazi=:vyazi,
        vizyon_foto=:vfoto,
        misyon_yazi=:myazi,
        misyon_foto=:mfoto,
        hakkimizda_banner=:hbanner,
        hakkimizda_foto=:hfoto
        WHERE hakkimizda_id=0
        ");
        $update=$hakkimizdakaydet->execute(array(
          'hbaslik' => $_POST['hakkimizda_baslik'],
          'hyazi' 	=> $_POST['hakkimizda_yazi'],
          'hslogan' => $_POST['hakkimizda_slogan'],
          'vyazi' 	=> $_POST['vizyon_yazi'],
          'vfoto' 	=> $_POST['vizyon_foto'],
          'myazi' 	=> $_POST['misyon_yazi'],
          'mfoto' 	=> $_POST['misyon_foto'],
          'hbanner' => $banner,
          'hfoto' 	=> $refimgyol
        ));

        if ($update) {
          Header("Location:admin/about.php?durum=ok");
        }
        else{
          Header("Location:admin/about.php?durum=no");
        }
      }

      /*EKLEME, DÜZENLEME, SİLME İŞLEMLERİ*/


      /*MENÜ İŞLEMLER*/

      //Menü Ekleme
      if (isset($_POST['menukaydet'])) {

        $menuayarkaydet=$db->prepare("INSERT INTO menu_tbl SET
          menu_ust=:ust,
          menu_sayfa=:sayfa,
          menu_ad=:ad,
          menu_url=:url,
          menu_sira=:sira");

          //Eğer menü sırası girilmemişse sıraya otomatik en yüksek sıra değerini veriyor
          if ($_POST['menu_sira']=='' || $_POST['menu_sira']==NULL) {
            $bul = $db->prepare("SELECT * FROM menu_tbl ORDER BY menu_sira DESC");
            $bul->execute(array(0));
            $cek=$bul->fetch(PDO::FETCH_ASSOC);
            $sira = $cek['menu_sira']+1;
          }else{
            $sira = $_POST['menu_sira'];
          }

          $insert=$menuayarkaydet->execute(array(
            'ust' => $_POST['menu_ust'],
            'sayfa' => $_POST['menu_sayfa'],
            'ad' => $_POST['menu_ad'],
            'url' => $_POST['menu_url'],
            'sira' => $sira
          ));

          if ($insert) {
            Header("Location:admin/menu.php?durum=ok");
          }
          else{
            Header("Location:admin/menu.php?durum=no");
          }
        }

        //menü düzenle
        if (isset($_POST['menuduzenle'])) {

          $menuduzenle=$db->prepare("UPDATE menu_tbl SET
            menu_ust=:ust,
            menu_sayfa=:sayfa,
            menu_ad=:ad,
            menu_url=:url,
            menu_sira=:sira
            WHERE menu_id={$_POST['menu_id']}
            ");
            $update=$menuduzenle->execute(array(
              'ust' => $_POST['menu_ust'],
              'sayfa' => $_POST['menu_sayfa'],
              'ad' => $_POST['menu_ad'],
              'url' => $_POST['menu_url'],
              'sira' => $_POST['menu_sira']
            ));

            $menu_id=$_POST['menu_id'];

            if ($update) {
              Header("Location:admin/menu.php?menu_id=$menu_id&durum=ok");
            }
            else{
              Header("Location:admin/menu.php?durum=no");
            }
          }

          //menü silme
          if ($_GET['menusil']=='ok') {

            $sil=$db->prepare("DELETE FROM menu_tbl where menu_id=:menu_id");
            $kontrol=$sil->execute(array(
              "menu_id" => $_GET['menu_id']
            ));

            if ($kontrol) {
              Header("Location:admin/menu.php?durum=ok");
            }
            else{
              Header("Location:admin/menu.php?durum=no");
            }
          }

          //alt menü silme
          if ($_GET['menusil']=='ok') {

            $sil=$db->prepare("DELETE FROM menu_tbl where menu_id=:menu_id");
            $kontrol=$sil->execute(array(
              "menu_id" => $_GET['menu_id']
            ));

            if ($kontrol) {
              Header("Location:admin/menu.php?durum=ok");
            }
            else{
              Header("Location:admin/menu.php?durum=no");
            }
          }

          /*SLIDER İŞLEMLERİ*/
          //Slider Ekleme
          if (isset($_POST['sliderekle'])) {

            $uploads_dir = 'assets/img/slider/';
            @$tmp_name = $_FILES['slider_resim']["tmp_name"];
            @$name = $_FILES['slider_resim']["name"];
            $refimgyol = $uploads_dir.$name;
            @move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $sliderkaydet=$db->prepare("INSERT INTO slider_tbl SET
              slider_ad=:ad,
              slider_baslik=:baslik,
              slider_icerik=:icerik,
              slider_buton=:buton,
              slider_link=:link,
              slider_sira=:sira,
              slider_resim=:resim
              ");

              //Eğer srası girilmemişse sıraya otomatik en yüksek sıra değerini veriyor
              if ($_POST['slider_sira']=='' || $_POST['slider_sira']==NULL) {
                $bul = $db->prepare("SELECT * FROM slider_tbl ORDER BY slider_sira DESC");
                $bul->execute(array(0));
                $cek=$bul->fetch(PDO::FETCH_ASSOC);
                $sira = $cek['slider_sira']+1;
              }else{
                $sira = $_POST['slider_sira'];
              }

              $insert=$sliderkaydet->execute(array(
                'ad' => $_POST['slider_ad'],
                'baslik' => $_POST['slider_baslik'],
                'icerik' => $_POST['slider_icerik'],
                'buton' => $_POST['slider_buton'],
                'link' => $_POST['slider_link'],
                'sira' => $sira,
                'resim' => $refimgyol
              ));

              if ($insert) {
                Header("Location:admin/slider.php?durum=ok");
              }
              else{
                Header("Location:admin/slider.php?durum=no");
              }
            }

            //slider guncelleme
            if (isset($_POST['sliderduzenle'])) {

              $slidersor=$db->prepare("SELECT * FROM slider_tbl where slider_id=:slider_id");
              $slidersor->execute(array("slider_id" => $_POST['slider_id']));
              $slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

              if ($_FILES['slider_resim']['size'] != 0) {
                $uploads_dir = 'assets/img/slider/';
                @$tmp_name = $_FILES['slider_resim']["tmp_name"];
                @$name = $_FILES['slider_resim']["name"];
                $refimgyol = $uploads_dir.$name;
                @move_uploaded_file($tmp_name, "$uploads_dir/$name");
              }else {
                $refimgyol = $slidercek['slider_resim'];
              }

              $sliderduzenle=$db->prepare("UPDATE slider_tbl SET
                slider_ad=:ad,
                slider_baslik=:baslik,
                slider_icerik=:icerik,
                slider_buton=:buton,
                slider_link=:link,
                slider_sira=:sira,
                slider_resim=:resim
                WHERE slider_id={$_POST['slider_id']}
                ");
                $update=$sliderduzenle->execute(array(
                  'ad' => $_POST['slider_ad'],
                  'baslik' => $_POST['slider_baslik'],
                  'icerik' => $_POST['slider_icerik'],
                  'buton' => $_POST['slider_buton'],
                  'link' => $_POST['slider_link'],
                  'sira' => $_POST['slider_sira'],
                  'resim' => $refimgyol
                ));

                $slider_id=$_POST['slider_id'];

                if ($update) {
                  Header("Location:admin/slider.php?slider_id=$slider_id&durum=ok");
                }
                else{
                  Header("Location:admin/slider.php?durum=no");
                }
              }

              //slider silme
              if ($_GET['slidersil']=='ok') {

                $select = $db->prepare("SELECT * FROM slider_tbl where slider_id=:slider_id");
                $select->execute(array('slider_id' => $_GET['slider_id']));
                $bul = $select->fetch(PDO::FETCH_ASSOC);

                unlink($bul['slider_resim']);

                $sil=$db->prepare("DELETE FROM slider_tbl where slider_id=:slider_id");
                $kontrol=$sil->execute(array(
                  "slider_id" => $_GET['slider_id']
                ));

                if ($kontrol) {
                  Header("Location:admin/slider.php?durum=ok");
                }
                else{
                  Header("Location:admin/slider.php?durum=no");
                }
              }

              /*MARKA İŞLEMLERİ*/

              //Marka Ekleme

              if (isset($_POST['markaekle'])) {

                $uploads_dir = 'assets/img/partners/';

                @$tmp_name = $_FILES['marka_foto']["tmp_name"];
                @$name = $_FILES['marka_foto']["name"];

                $refimgyol = $uploads_dir.$name;
                @move_uploaded_file($tmp_name, "$uploads_dir/$name");

                $sliderkaydet=$db->prepare("INSERT INTO markalar_tbl SET
                  marka_ad=:ad,
                  marka_foto=:resim
                  ");
                  $insert=$sliderkaydet->execute(array(
                    'ad' => $_POST['marka_ad'],
                    'resim' => $refimgyol
                  ));

                  if ($insert) {
                    Header("Location:admin/markalar.php?durum=ok");
                  }
                  else{
                    Header("Location:admin/markalar.php?durum=no");
                  }
                }

                //Marka silme
                if($_GET['markasil']=="ok") {

                  $select = $db->prepare("SELECT * FROM markalar_tbl where markalar_id=:markalar_id");
                  $select->execute(array('markalar_id' => $_GET['markalar_id']));
                  $bul = $select->fetch(PDO::FETCH_ASSOC);

                  unlink($bul['marka_foto']);

                  $sil=$db->prepare("DELETE FROM markalar_tbl WHERE markalar_id=:markalar_id");
                  $kontrol=$sil->execute(array('markalar_id' => $_GET['markalar_id']));

                  if ($kontrol) {
                    header("Location:admin/markalar.php?durum=ok");

                  } else{
                    header("Location:admin/markalar.php?durum=no");
                  }
                }

                /*ÜRÜN İŞLEMLERİ*/

                //Ürün Ekleme
                if (isset($_POST['urunekle'])) {
                  if (isset($_FILES['urun_foto'])) {
                    if ($_POST['urun_kategori']=31) {
                      $uploads_dir = 'assets/img/portfolio/';
                    }else{
                      $uploads_dir = 'assets/img/product/';
                    }
                    @$tmp_name = $_FILES['urun_foto']["tmp_name"];
                    @$name = $_FILES['urun_foto']["name"];
                    $sayi1=rand(10000,99999);
                    $refimgyol = $uploads_dir.$sayi1.$name;
                    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
                  }else {
                    $refimgyol = '';
                  }
                  if (isset($_FILES['urun_icon'])) {
                    $icon_dir = 'assets/icon/';
                    @$tmp_icon = $_FILES['urun_icon']["tmp_name"];
                    @$icon = $_FILES['urun_icon']["name"];
                    $sayi1=rand(10000,99999);
                    $iconyol = $icon_dir.$sayi1.$icon;
                    @move_uploaded_file($tmp_icon, "$icon_dir/$sayi1$icon");
                  }else {
                    $iconyol = '';
                  }
                  $urunkaydet=$db->prepare("INSERT INTO urunler_tbl SET
                    urun_ad=:ad,
                    urun_aciklama=:aciklama,
                    urun_ozellik=:ozellik,
                    urun_kategori=:kategori,
                    urun_foto=:foto,
                    urun_icon=:icon
                    ");
                    $insert=$urunkaydet->execute(array(
                      'ad' => $_POST['urun_ad'],
                      'aciklama' => $_POST['urun_aciklama'],
                      'ozellik' => $_POST['urun_ozellik'],
                      'kategori' => $_POST['urun_kategori'],
                      'foto' => $refimgyol,
                      'icon' => $iconyol
                    ));

                    if ($insert) {
                      Header("Location:admin/urunler.php?durum=ok");
                    }
                    else{
                      Header("Location:admin/urunler.php?durum=no");
                    }
                  }

                  //ürün düzenleme
                  if (isset($_POST['urunduzenle'])) {

                    $urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
                    $urunsor->execute(array("urun_id" => $_POST['urun_id']));
                    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

                    if ($_FILES['urun_foto']['size'] != 0) {
                      if ($_POST['urun_kategori']=31) {
                        $uploads_dir = 'assets/img/portfolio/';
                      }else{
                        $uploads_dir = 'assets/img/product/';
                      }
                      @$tmp_name = $_FILES['urun_foto']["tmp_name"];
                      @$name = $_FILES['urun_foto']["name"];
                      $refimgyol = $uploads_dir.$name;
                      @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    }else {
                      $refimgyol = $uruncek['urun_foto'];
                    }
                    if ($_FILES['urun_icon']['size'] != 0) {
                      $icon_dir = 'assets/img/projects/';
                      @$tmp_icon = $_FILES['urun_icon']["tmp_name"];
                      @$icon = $_FILES['urun_icon']["name"];
                      $iconyol = $icon_dir.$icon;
                      @move_uploaded_file($tmp_icon, "$icon_dir/$icon");
                    }else {
                      $iconyol = $uruncek['urun_icon'];
                    }

                    $urunduzenle=$db->prepare("UPDATE urunler_tbl SET
                      urun_ad=:ad,
                      urun_aciklama=:aciklama,
                      urun_ozellik=:ozellik,
                      urun_kategori=:kategori,
                      urun_foto=:foto,
                      urun_icon=:icon
                      WHERE urun_id={$_POST['urun_id']}
                      ");
                      $update=$urunduzenle->execute(array(
                        'ad' => $_POST['urun_ad'],
                        'aciklama' => $_POST['urun_aciklama'],
                        'ozellik' => $_POST['urun_ozellik'],
                        'kategori' => $_POST['urun_kategori'],
                        'foto' => $refimgyol,
                        'icon' => $iconyol
                      ));

                      $urun_id=$_POST['urun_id'];

                      if ($update) {
                        Header("Location:admin/urunler.php?durum=ok");
                      }
                      else{
                        Header("Location:admin/urunler.php?durum=no");
                      }
                    }

                    //ürün silme
                    if($_GET['urunsil']=="ok") {

                      $select = $db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
                      $select->execute(array('urun_id' => $_GET['urun_id']));
                      $bul = $select->fetch(PDO::FETCH_ASSOC);

                      unlink($bul['urun_foto']);

                      $sil=$db->prepare("DELETE FROM urunler_tbl WHERE urun_id=:urun_id");
                      $kontrol=$sil->execute(array('urun_id' => $_GET['urun_id']));

                      if ($kontrol) {
                        header("Location:admin/urunler.php?durum=ok");

                      } else{
                        header("Location:admin/urunler.php?durum=no");
                      }
                    }

                    /*Ürün Kategori İşlemleri*/

                    //ketegori Ekleme
                    if (isset($_POST['kategoriekle'])) {

                      $kategorikaydet=$db->prepare("INSERT INTO kategori_tbl SET kategori_ad=:ad");
                      $insert=$kategorikaydet->execute(array('ad' => $_POST['kategori_ad']));
                      if ($insert) {
                        Header("Location:admin/kategoriler.php?durum=ok");
                      }
                      else{
                        Header("Location:admin/kategoriler.php?durum=no");
                      }
                    }

                    //ketegori guncelleme
                    if (isset($_POST['kategoriduzenle'])) {

                      $kategoriduzenle=$db->prepare("UPDATE kategori_tbl SET
                        kategori_ad=:ad
                        WHERE kategori_id={$_POST['kategori_id']}
                        ");
                        $update=$kategoriduzenle->execute(array(
                          'ad' => $_POST['kategori_ad']
                        ));

                        $kategori_id=$_POST['kategori_id'];

                        if ($update) {
                          Header("Location:admin/kategoriler.php?kategori_id=$kategori_id&durum=ok");
                        }
                        else{
                          Header("Location:admin/kategoriler.php?durum=no");
                        }
                      }

                      //ketegori silme
                      if ($_GET['kategorisil']=='ok') {

                        $sil=$db->prepare("DELETE FROM kategori_tbl where kategori_id=:kategori_id");
                        $kontrol=$sil->execute(array(
                          "kategori_id" => $_GET['kategori_id']
                        ));

                        if ($kontrol) {
                          Header("Location:admin/kategoriler.php?durum=ok");
                        }
                        else{
                          Header("Location:admin/kategoriler.php?durum=no");
                        }
                      }

                      /*Ürün Fotogaleri İşlemleri*/
                      //Fotogaleri ekleme
                      if (isset($_POST['fotogaleriekle'])) {

                        for ($i=0; $i<count($_FILES['resim']["name"]); $i++) {
                          $uploads_dir = 'assets/img/gallery/';

                          @$tmp_name = $_FILES['resim']["tmp_name"][$i];
                          @$name = $_FILES['resim']["name"][$i];

                          $sayi1=rand(20000,30000);
                          $refimgyol = $uploads_dir.$sayi1.$name;
                          @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

                          $urunkaydet=$db->prepare("INSERT INTO urun_fotogaleri_tbl SET
                            urun_id=:urun_id,
                            resim=:foto
                            ");
                            $insert=$urunkaydet->execute(array(
                              'urun_id' => $_POST['urun_id'],
                              'foto' => $refimgyol
                            ));

                            if ($insert) {
                              Header("Location:admin/urunler.php?durum=ok");
                            }
                            else{
                              Header("Location:admin/urunler.php?durum=no");
                            }
                          }
                        }

                        //Fotogaleri silme
                        if($_GET['fotogalerisil']=="ok") {

                          $select = $db->prepare("SELECT * FROM urun_fotogaleri_tbl where fotogaleri_id=:fotogaleri_id");
                          $select->execute(array('fotogaleri_id' => $_GET['fotogaleri_id']));
                          $bul = $select->fetch(PDO::FETCH_ASSOC);

                          unlink($bul['resim']);

                          $sil=$db->prepare("DELETE FROM urun_fotogaleri_tbl WHERE fotogaleri_id=:fotogaleri_id");
                          $kontrol=$sil->execute(array('fotogaleri_id' => $_GET['fotogaleri_id']));

                          if ($kontrol) {
                            header("Location:admin/urunler.php?durum=ok");

                          } else{
                            header("Location:admin/urunler.php?durum=no");
                          }
                        }
                        /*Hizmet İŞLEMLERİ*/

                        //Hizmet Ekleme
                        if (isset($_POST['hizmetekle'])) {
                          if (isset($_FILES['hizmet_foto'])) {
                            $uploads_dir = 'assets/img/services/';
                            @$tmp_name = $_FILES['hizmet_foto']["tmp_name"];
                            @$name = $_FILES['hizmet_foto']["name"];
                            $sayi1=rand(10000,99999);
                            $refimgyol = $uploads_dir.$sayi1.$name;
                            @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
                          }else {
                            $refimgyol = '';
                          }
                          if (isset($_FILES['hizmet_icon'])) {
                            $icon_dir = 'assets/img/services/';
                            @$tmp_icon = $_FILES['hizmet_icon']["tmp_name"];
                            @$icon = $_FILES['hizmet_icon']["name"];
                            $sayi1=rand(10000,99999);
                            $iconyol = $icon_dir.$sayi1.$icon;
                            @move_uploaded_file($tmp_icon, "$icon_dir/$sayi1$icon");
                          }else {
                            $iconyol = '';
                          }
                          $hizmetkaydet=$db->prepare("INSERT INTO hizmetler_tbl SET
                            hizmet_ad=:ad,
                            hizmet_aciklama=:aciklama,
                            hizmet_ozellik=:ozellik,
                            hizmet_kategori=:kategori,
                            hizmet_foto=:foto,
                            hizmet_icon=:icon
                            ");
                            $insert=$hizmetkaydet->execute(array(
                              'ad' => $_POST['hizmet_ad'],
                              'aciklama' => $_POST['hizmet_aciklama'],
                              'ozellik' => $_POST['hizmet_ozellik'],
                              'kategori' => $_POST['hizmet_kategori'],
                              'foto' => $refimgyol,
                              'icon' => $iconyol
                            ));

                            if ($insert) {
                              Header("Location:admin/hizmetler.php?durum=ok");
                            }
                            else{
                              Header("Location:admin/hizmetler.php?durum=no");
                            }
                          }

                          //Hizmet düzenleme
                          if (isset($_POST['hizmetduzenle'])) {

                            $hizmetsor=$db->prepare("SELECT * FROM hizmetler_tbl where hizmet_id=:hizmet_id");
                            $hizmetsor->execute(array("hizmet_id" => $_POST['hizmet_id']));
                            $hizmetcek=$hizmetsor->fetch(PDO::FETCH_ASSOC);

                            if ($_FILES['hizmet_foto']['size'] != 0) {
                              $uploads_dir = 'assets/img/services/';
                              @$tmp_name = $_FILES['hizmet_foto']["tmp_name"];
                              @$name = $_FILES['hizmet_foto']["name"];
                              $refimgyol = $uploads_dir.$name;
                              @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                            }else {
                              $refimgyol = $hizmetcek['hizmet_foto'];
                            }
                            if ($_FILES['hizmet_icon']['size'] != 0) {
                              $icon_dir = 'assets/img/services/';
                              @$tmp_icon = $_FILES['hizmet_icon']["tmp_name"];
                              @$icon = $_FILES['hizmet_icon']["name"];
                              $iconyol = $icon_dir.$icon;
                              @move_uploaded_file($tmp_icon, "$icon_dir/$icon");
                            }else {
                              $iconyol = $hizmetcek['hizmet_icon'];
                            }

                            $hizmetduzenle=$db->prepare("UPDATE hizmetler_tbl SET
                              hizmet_ad=:ad,
                              hizmet_aciklama=:aciklama,
                              hizmet_ozellik=:ozellik,
                              hizmet_kategori=:kategori,
                              hizmet_foto=:foto,
                              hizmet_icon=:icon
                              WHERE hizmet_id={$_POST['hizmet_id']}
                              ");
                              $update=$hizmetduzenle->execute(array(
                                'ad' => $_POST['hizmet_ad'],
                                'aciklama' => $_POST['hizmet_aciklama'],
                                'ozellik' => $_POST['hizmet_ozellik'],
                                'kategori' => $_POST['hizmet_kategori'],
                                'foto' => $refimgyol,
                                'icon' => $iconyol
                              ));

                              $hizmet_id=$_POST['hizmet_id'];

                              if ($update) {
                                Header("Location:admin/hizmetler.php?durum=ok");
                              }
                              else{
                                Header("Location:admin/hizmetler.php?durum=no");
                              }
                            }

                            //Hizmet silme
                            if($_GET['hizmetsil']=="ok") {

                              $select = $db->prepare("SELECT * FROM hizmetler_tbl where hizmet_id=:hizmet_id");
                              $select->execute(array('hizmet_id' => $_GET['hizmet_id']));
                              $bul = $select->fetch(PDO::FETCH_ASSOC);

                              unlink($bul['hizmet_foto']);

                              $sil=$db->prepare("DELETE FROM hizmetler_tbl WHERE hizmet_id=:hizmet_id");
                              $kontrol=$sil->execute(array('hizmet_id' => $_GET['hizmet_id']));

                              if ($kontrol) {
                                header("Location:admin/hizmetler.php?durum=ok");

                              } else{
                                header("Location:admin/hizmetler.php?durum=no");
                              }
                            }
                            /*Hizmet Kategori İşlemleri*/

                            //ketegori Ekleme
                            if (isset($_POST['hizmetkategoriekle'])) {

                              $kategorikaydet=$db->prepare("INSERT INTO hizmetkategori_tbl SET kategori_ad=:ad");
                              $insert=$kategorikaydet->execute(array('ad' => $_POST['kategori_ad']));
                              if ($insert) {
                                Header("Location:admin/hizmet-kategoriler.php?durum=ok");
                              }
                              else{
                                Header("Location:admin/hizmet-kategoriler.php?durum=no");
                              }
                            }

                            //ketegori guncelleme
                            if (isset($_POST['hizmetkategoriduzenle'])) {

                              $kategoriduzenle=$db->prepare("UPDATE hizmetkategori_tbl SET
                                kategori_ad=:ad
                                WHERE kategori_id={$_POST['kategori_id']}
                                ");
                                $update=$kategoriduzenle->execute(array(
                                  'ad' => $_POST['kategori_ad']
                                ));

                                $kategori_id=$_POST['kategori_id'];

                                if ($update) {
                                  Header("Location:admin/hizmet-kategoriler.php?kategori_id=$kategori_id&durum=ok");
                                }
                                else{
                                  Header("Location:admin/hizmet-kategoriler.php?durum=no");
                                }
                              }

                              //ketegori silme
                              if ($_GET['hizmetkategorisil']=='ok') {

                                $sil=$db->prepare("DELETE FROM hizmetkategori_tbl where kategori_id=:kategori_id");
                                $kontrol=$sil->execute(array(
                                  "kategori_id" => $_GET['kategori_id']
                                ));

                                if ($kontrol) {
                                  Header("Location:admin/hizmet-kategoriler.php?durum=ok");
                                }
                                else{
                                  Header("Location:admin/hizmet-kategoriler.php?durum=no");
                                }
                              }


                              /*Galeri İşlemleri*/
                              //Galeri ekleme
                              if (isset($_POST['galeriekle'])) {

                                for ($i=0; $i<count($_FILES['resim']["name"]); $i++) {
                                  $uploads_dir = 'assets/img/gallery/';

                                  @$tmp_name = $_FILES['resim']["tmp_name"][$i];
                                  @$name = $_FILES['resim']["name"][$i];

                                  $sayi1=rand(20000,30000);
                                  $refimgyol = $uploads_dir.$sayi1.$name;
                                  @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

                                  $galerikaydet=$db->prepare("INSERT INTO galeri_tbl SET
                                    galeri_resim=:resim
                                    ");
                                    $insert=$galerikaydet->execute(array(
                                      'resim' => $refimgyol
                                    ));

                                    if ($insert) {
                                      Header("Location:admin/galeri.php?durum=ok");
                                    }
                                    else{
                                      Header("Location:admin/galeri.php?durum=no");
                                    }
                                  }
                                }

                                //Fotogaleri silme
                                if($_GET['galerisil']=="ok") {

                                  $select = $db->prepare("SELECT * FROM galeri_tbl where galeri_id=:galeri_id");
                                  $select->execute(array('galeri_id' => $_GET['galeri_id']));
                                  $bul = $select->fetch(PDO::FETCH_ASSOC);

                                  unlink($bul['resim']);

                                  $sil=$db->prepare("DELETE FROM galeri_tbl WHERE galeri_id=:galeri_id");
                                  $kontrol=$sil->execute(array('galeri_id' => $_GET['galeri_id']));

                                  if ($kontrol) {
                                    header("Location:admin/galeri.php?durum=ok");

                                  } else{
                                    header("Location:admin/galeri.php?durum=no");
                                  }
                                }


                                /*Kullanici Girii*/
                                if (isset($_POST['login'])) {

                                  $kullanici_ad=$_POST['kullanici_ad'];
                                  $kullanici_sifre=$_POST['kullanici_sifre'];

                                  if ($kullanici_ad && $kullanici_sifre) {

                                    $kullanicisor=$db->prepare("SELECT * FROM kullanici_tbl where kullanici_ad=:ad and kullanici_sifre=:sifre");
                                    $kullanicisor-> execute(array(
                                      'ad' => $kullanici_ad,
                                      'sifre' => $kullanici_sifre
                                    ));

                                    echo $say=$kullanicisor->rowCount();

                                    if ($say>0) {
                                      $_SESSION['kullanici_ad'] = $kullanici_ad;
                                      header('Location:admin/index.php');
                                    } else {
                                      header('Location:admin/login.php?durum=2');

                                    }
                                  }
                                }

                                //Kullanici Ekleme
                                if (isset($_POST['kullaniciekle'])) {

                                  $uploads_dir = 'admin/assets/img/users/';

                                  @$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
                                  @$name = $_FILES['kullanici_foto']["name"];

                                  $refimgyol = 'assets/img/users/'.$name;
                                  @move_uploaded_file($tmp_name, "$uploads_dir/$name");

                                  $urunkaydet=$db->prepare("INSERT INTO kullanici_tbl SET
                                    kullanici_ad=:ad,
                                    kullanici_sifre=:sifre,
                                    kullanici_zaman=:zaman,
                                    kullanici_hakkinda=:hakkinda,
                                    kullanici_dogumyeri=:dogumyeri,
                                    kullanici_adsoyad=:adsoyad,
                                    kullanici_yetki=:yetki,
                                    kullanici_facebook=:facebook,
                                    kullanici_twitter=:twitter,
                                    kullanici_github=:github,
                                    kullanici_instagram=:instagram,
                                    kullanici_tel=:tel,
                                    kullanici_foto=:foto
                                    ");
                                    $insert=$urunkaydet->execute(array(
                                      'ad' => $_POST['kullanici_ad'],
                                      'sifre' => $_POST['kullanici_sifre'],
                                      'zaman' => $_POST['kullanici_zaman'],
                                      'hakkinda' => $_POST['kullanici_hakkinda'],
                                      'dogumyeri' => $_POST['kullanici_dogumyeri'],
                                      'adsoyad' => $_POST['kullanici_adsoyad'],
                                      'yetki' => $_POST['kullanici_yetki'],
                                      'facebook' => $_POST['kullanici_facebook'],
                                      'twitter' => $_POST['kullanici_twitter'],
                                      'github' => $_POST['kullanici_github'],
                                      'instagram' => $_POST['kullanici_instagram'],
                                      'tel' => $_POST['kullanici_tel'],
                                      'foto' => $refimgyol
                                    ));

                                    if ($insert) {
                                      Header("Location:admin/kullanicilar.php?durum=ok");
                                    }
                                    else{
                                      Header("Location:admin/kullanicilar.php?durum=no");
                                    }
                                  }

                                  //Kullanici düzenleme
                                  if (isset($_POST['kullaniciduzenle'])) {

                                    $kullanicisor=$db->prepare("SELECT * FROM kullanici_tbl where kullanici_id=:kullanici_id");
                                    $kullanicisor->execute(array("kullanici_id" => $_POST['kullanici_id']));
                                    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

                                    if ($_FILES['kullanici_foto']['size'] != 0) {
                                      $uploads_dir = 'admin/assets/img/users/';
                                      @$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
                                      @$name = $_FILES['kullanici_foto']["name"];
                                      $refimgyol = 'assets/img/users/'.$name;
                                      @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                    }else {
                                      $refimgyol = $kullanicicek['kullanici_foto'];
                                    }

                                    $kullaniciduzenle=$db->prepare("UPDATE kullanici_tbl SET
                                      kullanici_ad=:ad,
                                      kullanici_sifre=:sifre,
                                      kullanici_zaman=:zaman,
                                      kullanici_hakkinda=:hakkinda,
                                      kullanici_dogumyeri=:dogumyeri,
                                      kullanici_adsoyad=:adsoyad,
                                      kullanici_yetki=:yetki,
                                      kullanici_facebook=:facebook,
                                      kullanici_twitter=:twitter,
                                      kullanici_github=:github,
                                      kullanici_instagram=:instagram,
                                      kullanici_tel=:tel,
                                      kullanici_foto=:resim
                                      WHERE kullanici_id={$_POST['kullanici_id']}
                                      ");
                                      $update=$kullaniciduzenle->execute(array(
                                        'ad' => $_POST['kullanici_ad'],
                                        'sifre' => $_POST['kullanici_sifre'],
                                        'zaman' => $_POST['kullanici_zaman'],
                                        'hakkinda' => $_POST['kullanici_hakkinda'],
                                        'dogumyeri' => $_POST['kullanici_dogumyeri'],
                                        'adsoyad' => $_POST['kullanici_adsoyad'],
                                        'yetki' => $_POST['kullanici_yetki'],
                                        'facebook' => $_POST['kullanici_facebook'],
                                        'twitter' => $_POST['kullanici_twitter'],
                                        'github' => $_POST['kullanici_github'],
                                        'instagram' => $_POST['kullanici_instagram'],
                                        'tel' => $_POST['kullanici_tel'],
                                        'resim' => $refimgyol
                                      ));

                                      $kullanici_id=$_POST['kullanici_id'];

                                      if ($update) {
                                        Header("Location:admin/kullanicilar.php?kullanici_id=$kullanici_id&durum=ok");
                                      }
                                      else{
                                        Header("Location:admin/kullanicilar.php?durum=no");
                                      }
                                    }

                                    //Kullanici silme
                                    if($_GET['kullanicisil']=="ok") {

                                      $select = $db->prepare("SELECT * FROM kullanici_tbl where kullanici_id=:kullanici_id");
                                      $select->execute(array('kullanici_id' => $_GET['kullanici_id']));
                                      $bul = $select->fetch(PDO::FETCH_ASSOC);

                                      unlink($bul['kullanici_foto']);


                                      $sil=$db->prepare("DELETE FROM kullanici_tbl WHERE kullanici_id=:kullanici_id");
                                      $kontrol=$sil->execute(array(
                                        'kullanici_id' => $_GET['kullanici_id']
                                      ));

                                      if ($kontrol) {
                                        header("Location:admin/kullanicilar.php?durum=ok");
                                      } else{
                                        header("Location:admin/urunler.php?durum=no");
                                      }
                                    }

                                    /*Çalışanlar*/
                                    //alışan Ekleme
                                    if (isset($_POST['doktorekle'])) {
                                      if (isset($_FILES['calisan_foto'])) {
                                        $uploads_dir = 'assets/img/team/';
                                        @$tmp_name = $_FILES['calisan_foto']["tmp_name"];
                                        @$name = $_FILES['calisan_foto']["name"];
                                        $sayi1=rand(10000,99999);
                                        $refimgyol = $uploads_dir.$sayi1.$name;
                                        @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
                                      }else {
                                        $refimgyol = '';
                                      }
                                      if (isset($_FILES['calisan_ikincifoto'])) {
                                        $icon_dir = 'assets/img/team/';
                                        @$tmp_icon = $_FILES['calisan_ikincifoto']["tmp_name"];
                                        @$icon = $_FILES['calisan_ikincifoto']["name"];
                                        $sayi1=rand(10000,99999);
                                        $iconyol = $icon_dir.$sayi1.$icon;
                                        @move_uploaded_file($tmp_icon, "$icon_dir/$sayi1$icon");
                                      }else {
                                        $iconyol = '';
                                      }
                                      $calisankaydet=$db->prepare("INSERT INTO calisanlar_tbl SET
                                        calisanlar_adsoyad=:ad,
                                        calisanlar_gorevi=:gorev,
                                        calisan_telefon=:telefon,
                                        calisan_mail=:mail,
                                        calisan_facebook=:facebook,
                                        calisan_instagram=:instagram,
                                        calisan_twitter=:twitter,
                                        calisan_kodu=:kodu,
                                        calisan_foto=:foto,
                                        calisan_ikincifoto=:ikincifoto
                                        ");
                                        $insert=$calisankaydet->execute(array(
                                          'ad' => $_POST['calisanlar_adsoyad'],
                                          'gorev' => $_POST['calisanlar_gorevi'],
                                          'telefon' => $_POST['calisan_telefon'],
                                          'facebook' => $_POST['calisan_facebook'],
                                          'instagram' => $_POST['calisan_instagram'],
                                          'twitter' => $_POST['calisan_twitter'],
                                          'mail' => $_POST['calisan_mail'],
                                          'kodu' => $_POST['calisan_kodu'],
                                          'foto' => $refimgyol,
                                          'ikincifoto' => $iconyol
                                        ));

                                        if ($insert) {
                                          Header("Location:admin/doktorlar.php?durum=ok");
                                        }
                                        else{
                                          Header("Location:admin/doktorlar.php?durum=no");
                                        }
                                      }

                                      //alışan düzenleme
                                      if (isset($_POST['doktorduzenle'])) {

                                        $calisansor=$db->prepare("SELECT * FROM calisanlar_tbl where calisanlar_id=:calisanlar_id");
                                        $calisansor->execute(array("calisanlar_id" => $_POST['calisanlar_id']));
                                        $calisancek=$calisansor->fetch(PDO::FETCH_ASSOC);

                                        if ($_FILES['calisan_foto']['size'] != 0) {
                                          $uploads_dir = 'assets/img/team/';
                                          @$tmp_name = $_FILES['calisan_foto']["tmp_name"];
                                          @$name = $_FILES['calisan_foto']["name"];
                                          $refimgyol = $uploads_dir.$name;
                                          @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                        }else {
                                          $refimgyol = $calisancek['calisan_foto'];
                                        }
                                        if ($_FILES['calisan_ikincifoto']['size'] != 0) {
                                          $icon_dir = 'assets/img/team/';
                                          @$tmp_icon = $_FILES['calisan_ikincifoto']["tmp_name"];
                                          @$icon = $_FILES['calisan_ikincifoto']["name"];
                                          $iconyol = $icon_dir.$icon;
                                          @move_uploaded_file($tmp_icon, "$icon_dir/$icon");
                                        }else {
                                          $iconyol = $calisancek['calisan_ikincifoto'];
                                        }

                                        $calisanduzenle=$db->prepare("UPDATE calisanlar_tbl SET
                                          calisanlar_adsoyad=:ad,
                                          calisanlar_gorevi=:gorev,
                                          calisan_telefon=:telefon,
                                          calisan_mail=:mail,
                                          calisan_facebook=:facebook,
                                          calisan_instagram=:instagram,
                                          calisan_twitter=:twitter,
                                          calisan_kodu=:kodu,
                                          calisan_foto=:resim,
                                          calisan_ikincifoto=:ikinciresim
                                          WHERE calisanlar_id={$_POST['calisanlar_id']}
                                          ");
                                          $update=$calisanduzenle->execute(array(
                                            'ad' => $_POST['calisanlar_adsoyad'],
                                            'gorev' => $_POST['calisanlar_gorevi'],
                                            'telefon' => $_POST['calisan_telefon'],
                                            'facebook' => $_POST['calisan_facebook'],
                                            'instagram' => $_POST['calisan_instagram'],
                                            'twitter' => $_POST['calisan_twitter'],
                                            'mail' => $_POST['calisan_mail'],
                                            'kodu' => $_POST['calisan_kodu'],
                                            'resim' => $refimgyol,
                                            'ikinciresim' => $iconyol
                                          ));

                                          $calisanlar_id=$_POST['calisanlar_id'];

                                          if ($update) {
                                            Header("Location:admin/doktorlar.php?calisanlar_id=$calisanlar_id&durum=ok");
                                          }
                                          else{
                                            Header("Location:admin/doktorlar.php?durum=no");
                                          }
                                        }

                                        //Çalışan silme
                                        if($_GET['doktorsil']=="ok") {

                                          $select = $db->prepare("SELECT * FROM calisanlar_tbl where calisanlar_id=:calisanlar_id");
                                          $select->execute(array('calisanlar_id' => $_GET['calisanlar_id']));
                                          $bul = $select->fetch(PDO::FETCH_ASSOC);

                                          unlink($bul['calisan_foto']);


                                          $sil=$db->prepare("DELETE FROM calisanlar_tbl WHERE calisanlar_id=:calisanlar_id");
                                          $kontrol=$sil->execute(array(
                                            'calisanlar_id' => $_GET['calisanlar_id']
                                          ));

                                          if ($kontrol) {
                                            header("Location:admin/doktorlar.php?durum=ok");
                                          } else{
                                            header("Location:admin/doktorlar.php?durum=no");
                                          }
                                        }

                                        /*Tanıtım Film Ekleme*/

                                        if (isset($_POST['tanitimfilmi'])) {

                                          $tanitimfilmikaydet=$db->prepare("UPDATE ayar_tbl SET ayar_tanitimfilmi=:tanitimfilmi WHERE ayar_id=0");
                                          $update=$tanitimfilmikaydet->execute(array('tanitimfilmi' => $_POST['ayar_tanitimfilmi']));
                                          if ($update) {
                                            Header("Location:admin/tanitim-filmi.php?durum=ok");
                                          }
                                          else{
                                            Header("Location:admin/tanitim-filmi.php?durum=no");
                                          }
                                        }
                                        /*Sayfalar*/
                                        //Sayfa Ekleme
                                        if (isset($_POST['sayfaekle'])) {

                                          if (isset($_FILES['sayfa_banner'])) {
                                            $banner_dir = 'assets/img/';
                                            @$tmp_icon = $_FILES['sayfa_banner']["tmp_name"];
                                            @$banner = $_FILES['sayfa_banner']["name"];
                                            $banneryol = $banner_dir.$banner;
                                            @move_uploaded_file($tmp_icon, "$banner_dir/$banner");
                                          }else {
                                            $banneryol = '';
                                          }
                                          if (isset($_FILES['sayfa_resim'])) {
                                            $resim_dir = 'assets/img/';
                                            @$tmp_resim = $_FILES['sayfa_resim']["tmp_name"];
                                            @$resim = $_FILES['sayfa_resim']["name"];
                                            $refimgyol = $resim_dir.$resim;
                                            @move_uploaded_file($tmp_resim, "$resim_dir/$resim");
                                          }else {
                                            $refimgyol = '';
                                          }

                                          $sayfakaydet=$db->prepare("INSERT INTO sayfalar_tbl SET
                                            sayfa_adi=:adi,
                                            sayfa_icerik=:icerik,
                                            sayfa_link=:link,
                                            sayfa_banner=:banner,
                                            sayfa_resim=:resim
                                            ");
                                            $insert=$sayfakaydet->execute(array(
                                              'adi' => $_POST['sayfa_adi'],
                                              'icerik' => $_POST['sayfa_icerik'],
                                              'link' => $_POST['sayfa_link'],
                                              'banner' => $banneryol,
                                              'resim' => $refimgyol
                                            ));

                                            if ($insert) {
                                              Header("Location:admin/sayfalar.php?durum=ok");
                                            }
                                            else{
                                              Header("Location:admin/sayfalar.php?durum=no");
                                            }
                                          }

                                          //Sayfa düzenleme
                                          if (isset($_POST['sayfaduzenle'])) {

                                            $sayfasor=$db->prepare("SELECT * FROM sayfalar_tbl where sayfa_id=:sayfa_id");
                                            $sayfasor->execute(array("sayfa_id" => $_POST['sayfa_id']));
                                            $sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);

                                            if ($_FILES['sayfa_banner']['size'] != 0) {
                                              $banner_dir = 'assets/img/';
                                              @$tmp_icon = $_FILES['sayfa_banner']["tmp_name"];
                                              @$banner = $_FILES['sayfa_banner']["name"];
                                              $banneryol = $banner_dir.$banner;
                                              @move_uploaded_file($tmp_icon, "$banner_dir/$banner");
                                            }else {
                                              $banneryol = $sayfacek['sayfa_banner'];
                                            }
                                            if ($_FILES['sayfa_resim']['size'] != 0) {
                                              $resim_dir = 'assets/img/';
                                              @$tmp_resim = $_FILES['sayfa_resim']["tmp_name"];
                                              @$resim = $_FILES['sayfa_resim']["name"];
                                              $refimgyol = $resim_dir.$resim;
                                              @move_uploaded_file($tmp_resim, "$resim_dir/$resim");
                                            }else {
                                              $refimgyol = $sayfacek['sayfa_resim'];
                                            }

                                            $sayfaduzenle=$db->prepare("UPDATE sayfalar_tbl SET
                                              sayfa_adi=:adi,
                                              sayfa_icerik=:icerik,
                                              sayfa_link=:link,
                                              sayfa_banner=:banner,
                                              sayfa_resim=:resim
                                              WHERE sayfa_id={$_POST['sayfa_id']}
                                              ");
                                              $update=$sayfaduzenle->execute(array(
                                                'adi' => $_POST['sayfa_adi'],
                                                'icerik' => $_POST['sayfa_icerik'],
                                                'link' => $_POST['sayfa_link'],
                                                'banner' => $banneryol,
                                                'resim' => $refimgyol
                                              ));

                                              $sayfa_id=$_POST['sayfa_id'];

                                              if ($update) {
                                                Header("Location:admin/sayfalar.php?sayfa_id=$sayfa_id&durum=ok");
                                              }
                                              else{
                                                Header("Location:admin/sayfalar.php?durum=no");
                                              }
                                            }

                                            //Sayfa silme
                                            if($_GET['sayfasil']=="ok") {

                                              $select = $db->prepare("SELECT * FROM sayfalar_tbl where sayfa_id=:sayfa_id");
                                              $select->execute(array('sayfa_id' => $_GET['sayfa_id']));
                                              $bul = $select->fetch(PDO::FETCH_ASSOC);

                                              unlink($bul['sayfa_banner']);
                                              unlink($bul['sayfa_resim']);


                                              $sil=$db->prepare("DELETE FROM sayfalar_tbl WHERE sayfa_id=:sayfa_id");
                                              $kontrol=$sil->execute(array(
                                                'sayfa_id' => $_GET['sayfa_id']
                                              ));

                                              if ($kontrol) {
                                                header("Location:admin/sayfalar.php?durum=ok");
                                              } else{
                                                header("Location:admin/sayfalar.php?durum=no");
                                              }
                                            }

                                            /*Haberler*/
                                            //Haber Ekleme
                                            if (isset($_POST['haberekle'])) {

                                              $uploads_dir = 'assets/img/news/';

                                              @$tmp_name = $_FILES['haber_resim']["tmp_name"];
                                              @$name = $_FILES['haber_resim']["name"];

                                              $refimgyol = $uploads_dir.$name;
                                              @move_uploaded_file($tmp_name, "$uploads_dir/$name");

                                              $haberkaydet=$db->prepare("INSERT INTO haberler_tbl SET
                                                haber_baslik=:baslik,
                                                haber_icerik=:icerik,
                                                haber_tarih=:tarih,
                                                haber_resim=:resim
                                                ");
                                                $insert=$haberkaydet->execute(array(
                                                  'baslik' => $_POST['haber_baslik'],
                                                  'icerik' => $_POST['haber_icerik'],
                                                  'tarih' => $_POST['haber_tarih'],
                                                  'resim' => $refimgyol
                                                ));

                                                if ($insert) {
                                                  Header("Location:admin/haberler.php?durum=ok");
                                                }
                                                else{
                                                  Header("Location:admin/haberler.php?durum=no");
                                                }
                                              }

                                              //Haber düzenleme
                                              if (isset($_POST['haberduzenle'])) {

                                                $habersor=$db->prepare("SELECT * FROM haberler_tbl where haber_id=:haber_id");
                                                $habersor->execute(array("haber_id" => $_POST['haber_id']));
                                                $habercek=$habersor->fetch(PDO::FETCH_ASSOC);

                                                if ($_FILES['haber_resim']['size'] != 0) {
                                                  $uploads_dir = 'assets/img/news/';
                                                  @$tmp_name = $_FILES['haber_resim']["tmp_name"];
                                                  @$name = $_FILES['haber_resim']["name"];
                                                  $refimgyol = $uploads_dir.$name;
                                                  @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                                }else {
                                                  $refimgyol = $habercek['haber_resim'];
                                                }

                                                $haberduzenle=$db->prepare("UPDATE haberler_tbl SET
                                                  haber_baslik=:baslik,
                                                  haber_icerik=:icerik,
                                                  haber_tarih=:tarih,
                                                  haber_resim=:resim
                                                  WHERE haber_id={$_POST['haber_id']}
                                                  ");
                                                  $update=$haberduzenle->execute(array(
                                                    'baslik' => $_POST['haber_baslik'],
                                                    'icerik' => $_POST['haber_icerik'],
                                                    'tarih' => $_POST['haber_tarih'],
                                                    'resim' => $refimgyol
                                                  ));

                                                  $haber_id=$_POST['haber_id'];

                                                  if ($update) {
                                                    Header("Location:admin/haberler.php?haber_id=$haber_id&durum=ok");
                                                  }
                                                  else{
                                                    Header("Location:admin/haberler.php?durum=no");
                                                  }
                                                }

                                                //Haber silme
                                                if($_GET['habersil']=="ok") {

                                                  $select = $db->prepare("SELECT * FROM haberler_tbl where haber_id=:haber_id");
                                                  $select->execute(array('haber_id' => $_GET['haber_id']));
                                                  $bul = $select->fetch(PDO::FETCH_ASSOC);

                                                  unlink($bul['haber_resim']);


                                                  $sil=$db->prepare("DELETE FROM haberler_tbl WHERE haber_id=:haber_id");
                                                  $kontrol=$sil->execute(array(
                                                    'haber_id' => $_GET['haber_id']
                                                  ));

                                                  if ($kontrol) {
                                                    header("Location:admin/haberler.php?durum=ok");
                                                  } else{
                                                    header("Location:admin/haberler.php?durum=no");
                                                  }
                                                }

                                                /*Bloglar*/
                                                //Blog Ekleme
                                                if (isset($_POST['blogekle'])) {

                                                  $uploads_dir = 'assets/img/blog/';

                                                  @$tmp_name = $_FILES['blog_resim']["tmp_name"];
                                                  @$name = $_FILES['blog_resim']["name"];

                                                  $refimgyol = $uploads_dir.$name;
                                                  @move_uploaded_file($tmp_name, "$uploads_dir/$name");

                                                  $blogkaydet=$db->prepare("INSERT INTO blog_tbl SET
                                                    blog_baslik=:baslik,
                                                    blog_kategori=:kategori,
                                                    blog_icerik=:icerik,
                                                    blog_tarih=:tarih,
                                                    blog_resim=:resim
                                                    ");
                                                    $insert=$blogkaydet->execute(array(
                                                      'baslik' => $_POST['blog_baslik'],
                                                      'kategori' => $_POST['blog_kategori'],
                                                      'icerik' => $_POST['blog_icerik'],
                                                      'tarih' => $_POST['blog_tarih'],
                                                      'resim' => $refimgyol
                                                    ));

                                                    if ($insert) {
                                                      Header("Location:admin/bloglar.php?durum=ok");
                                                    }
                                                    else{
                                                      Header("Location:admin/bloglar.php?durum=no");
                                                    }
                                                  }

                                                  //Blog düzenleme
                                                  if (isset($_POST['blogduzenle'])) {

                                                    $blogsor=$db->prepare("SELECT * FROM blog_tbl where blog_id=:blog_id");
                                                    $blogsor->execute(array("blog_id" => $_POST['blog_id']));
                                                    $blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

                                                    if ($_FILES['blog_resim']['size'] != 0) {
                                                      $uploads_dir = 'assets/img/blog/';
                                                      @$tmp_name = $_FILES['blog_resim']["tmp_name"];
                                                      @$name = $_FILES['blog_resim']["name"];
                                                      $refimgyol = $uploads_dir.$name;
                                                      @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                                    }else {
                                                      $refimgyol = $blogcek['blog_resim'];
                                                    }

                                                    $blogduzenle=$db->prepare("UPDATE blog_tbl SET
                                                      blog_baslik=:baslik,
                                                      blog_kategori=:kategori,
                                                      blog_icerik=:icerik,
                                                      blog_tarih=:tarih,
                                                      blog_resim=:resim
                                                      WHERE blog_id={$_POST['blog_id']}
                                                      ");
                                                      $update=$blogduzenle->execute(array(
                                                        'baslik' => $_POST['blog_baslik'],
                                                        'kategori' => $_POST['blog_kategori'],
                                                        'icerik' => $_POST['blog_icerik'],
                                                        'tarih' => $_POST['blog_tarih'],
                                                        'resim' => $refimgyol
                                                      ));

                                                      $blog_id=$_POST['blog_id'];

                                                      if ($update) {
                                                        Header("Location:admin/bloglar.php?blog_id=$blog_id&durum=ok");
                                                      }
                                                      else{
                                                        Header("Location:admin/bloglar.php?durum=no");
                                                      }
                                                    }

                                                    //Blog silme
                                                    if($_GET['blogsil']=="ok") {

                                                      $select = $db->prepare("SELECT * FROM blog_tbl where blog_id=:blog_id");
                                                      $select->execute(array('blog_id' => $_GET['blog_id']));
                                                      $bul = $select->fetch(PDO::FETCH_ASSOC);

                                                      unlink($bul['blog_resim']);


                                                      $sil=$db->prepare("DELETE FROM blog_tbl WHERE blog_id=:blog_id");
                                                      $kontrol=$sil->execute(array(
                                                        'blog_id' => $_GET['blog_id']
                                                      ));

                                                      if ($kontrol) {
                                                        header("Location:admin/bloglar.php?durum=ok");
                                                      } else{
                                                        header("Location:admin/bloglar.php?durum=no");
                                                      }
                                                    }

                                                    /*Blog kategorilerli*/
                                                    //Blog kategori Ekleme
                                                    if (isset($_POST['blogkategoriekle'])) {

                                                      $uploads_dir = 'assets/img/';
                                                      @$tmp_name = $_FILES['kategori_resim']["tmp_name"];
                                                      @$name = $_FILES['kategori_resim']["name"];
                                                      $refimgyol = $uploads_dir.$name;
                                                      @move_uploaded_file($tmp_name, "$uploads_dir/$name");

                                                      $blogkategoriekle=$db->prepare("INSERT INTO blog_kategori SET
                                                        kategori_adi=:adi,
                                                        kategori_aciklama=:aciklama,
                                                        kategori_resim=:resim
                                                        ");
                                                        $insert=$blogkategoriekle->execute(array(
                                                          'adi' => $_POST['kategori_adi'],
                                                          'aciklama' => $_POST['kategori_aciklama'],
                                                          'resim' => $refimgyol
                                                        ));

                                                        if ($insert) {
                                                          Header("Location:admin/blog-kategoriler.php?durum=ok");
                                                        }
                                                        else{
                                                          Header("Location:admin/blog-kategoriler.php?durum=no");
                                                        }
                                                      }

                                                      //Blog kategori düzenleme
                                                      if (isset($_POST['blogkategoriduzenle'])) {

                                                        $blogsor=$db->prepare("SELECT * FROM blog_kategori where blog_kat_id=:blog_kat_id");
                                                        $blogsor->execute(array("blog_kat_id" => $_POST['blog_kat_id']));
                                                        $blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

                                                        if ($_FILES['kategori_resim']['size'] != 0) {
                                                          $uploads_dir = 'assets/img/';
                                                          @$tmp_name = $_FILES['kategori_resim']["tmp_name"];
                                                          @$name = $_FILES['kategori_resim']["name"];
                                                          $refimgyol = $uploads_dir.$name;
                                                          @move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                                        }else {
                                                          $refimgyol = $blogcek['kategori_resim'];
                                                        }

                                                        $blogkategoriduzenle=$db->prepare("UPDATE blog_kategori SET
                                                          kategori_adi=:adi,
                                                          kategori_aciklama=:aciklama,
                                                          kategori_resim=:resim
                                                          WHERE blog_kat_id={$_POST['blog_kat_id']}
                                                          ");
                                                          $update=$blogkategoriduzenle->execute(array(
                                                            'adi' => $_POST['kategori_adi'],
                                                            'aciklama' => $_POST['kategori_aciklama'],
                                                            'resim' => $refimgyol
                                                          ));

                                                          $blog_kat_id=$_POST['blog_kat_id'];

                                                          if ($update) {
                                                            Header("Location:admin/blog-kategoriler.php?blog_kat_id=$blog_kat_id&durum=ok");
                                                          }
                                                          else{
                                                            Header("Location:admin/blog-kategoriler.php?durum=no");
                                                          }
                                                        }

                                                        //Blog kategori silme
                                                        if($_GET['blogkategorisil']=="ok") {

                                                          $select = $db->prepare("SELECT * FROM blog_kategori where blog_kat_id=:blog_kat_id");
                                                          $select->execute(array('blog_kat_id' => $_GET['blog_kat_id']));
                                                          $bul = $select->fetch(PDO::FETCH_ASSOC);

                                                          unlink($bul['kategori_resim']);


                                                          $sil=$db->prepare("DELETE FROM blog_kategori WHERE blog_kat_id=:blog_kat_id");
                                                          $kontrol=$sil->execute(array(
                                                            'blog_kat_id' => $_GET['blog_kat_id']
                                                          ));

                                                          if ($kontrol) {
                                                            header("Location:admin/blog-kategoriler.php?durum=ok");
                                                          } else{
                                                            header("Location:admin/blog-kategoriler.php?durum=no");
                                                          }
                                                        }


                                                        /*Butonlar*/

                                                        //Buton Ekleme
                                                        if (isset($_POST['butonekle'])) {

                                                          $butonekle=$db->prepare("INSERT INTO butonlar_tbl SET
                                                            buton_adi=:adi,
                                                            buton_link=:link,
                                                            buton_class=:class,
                                                            buton_target=:target,
                                                            buton_yayin=:yayin
                                                            ");
                                                            $insert=$butonekle->execute(array(
                                                              'adi' => $_POST['buton_adi'],
                                                              'link' => $_POST['buton_link'],
                                                              'class' => $_POST['buton_class'],
                                                              'target' => $_POST['buton_target'],
                                                              'yayin' => $_POST['buton_yayin']
                                                            ));
                                                            if ($insert) {
                                                              Header("Location:admin/buttons.php?durum=ok");
                                                            }
                                                            else{
                                                              Header("Location:admin/buttons.php?durum=no");
                                                            }
                                                          }

                                                          //Buton guncelleme
                                                          if (isset($_POST['butonduzenle'])) {

                                                            $butonduzenle=$db->prepare("UPDATE butonlar_tbl SET
                                                              buton_adi=:adi,
                                                              buton_link=:link,
                                                              buton_class=:class,
                                                              buton_target=:target,
                                                              buton_yayin=:yayin
                                                              WHERE buton_id={$_POST['buton_id']}
                                                              ");
                                                              $update=$butonduzenle->execute(array(
                                                                'adi' => $_POST['buton_adi'],
                                                                'link' => $_POST['buton_link'],
                                                                'class' => $_POST['buton_class'],
                                                                'target' => $_POST['buton_target'],
                                                                'yayin' => $_POST['buton_yayin']
                                                              ));

                                                              $buton_id=$_POST['buton_id'];

                                                              if ($update) {
                                                                Header("Location:admin/buttons.php?buton_id=$buton_id&durum=ok");
                                                              }
                                                              else{
                                                                Header("Location:admin/buttons.php?durum=no");
                                                              }
                                                            }

                                                            //Buton silme
                                                            if ($_GET['butonsil']=='ok') {

                                                              $sil=$db->prepare("DELETE FROM butonlar_tbl where buton_id=:buton_id");
                                                              $kontrol=$sil->execute(array(
                                                                "buton_id" => $_GET['buton_id']
                                                              ));

                                                              if ($kontrol) {
                                                                Header("Location:admin/buttons.php?durum=ok");
                                                              }
                                                              else{
                                                                Header("Location:admin/buttons.php?durum=no");
                                                              }
                                                            }

                                                            //Buton yayin durumu
                                                            if ($_POST) { //post var mı diye bakıyoruz
                                                              //değişkenleri integer olarak alyoruz
                                                              $buton_id = (int)$_POST['buton_id'];
                                                              $yayin = (int)$_POST['yayin'];

                                                              //Güncellme sorgumuzu yazıyoruz
                                                              $sorgu = $baglanti->query("UPDATE butonlar_tbl SET yayin=$yayin WHERE buton_id=$buton_id");

                                                              //gerekli ise geriye değer döndürüyoruz
                                                              echo $buton_id . " nolu kayıt değiştirildi";
                                                            }

                                                            /*Sık Sorulan Sorular*/

                                                            //ketegori Ekleme
                                                            if (isset($_POST['faqekle'])) {

                                                              $faqkaydet=$db->prepare("INSERT INTO faq_tbl SET
                                                                faq_baslik=:baslik,
                                                                faq_icerik=:icerik
                                                                ");
                                                                $insert=$faqkaydet->execute(array(
                                                                  'baslik' => $_POST['faq_baslik'],
                                                                  'icerik' => $_POST['faq_icerik']
                                                                ));
                                                                if ($insert) {
                                                                  Header("Location:admin/faq.php?durum=ok");
                                                                }
                                                                else{
                                                                  Header("Location:admin/faq.php?durum=no");
                                                                }
                                                              }

                                                              //ketegori guncelleme
                                                              if (isset($_POST['faqduzenle'])) {

                                                                $faqkaydet=$db->prepare("UPDATE faq_tbl SET
                                                                  faq_baslik=:baslik,
                                                                  faq_icerik=:icerik
                                                                  WHERE faq_id={$_POST['faq_id']}
                                                                  ");
                                                                  $update=$faqkaydet->execute(array(
                                                                    'baslik' => $_POST['faq_baslik'],
                                                                    'icerik' => $_POST['faq_icerik']
                                                                  ));

                                                                  $faq_id=$_POST['faq_id'];

                                                                  if ($update) {
                                                                    Header("Location:admin/faq.php?faq_id=$faq_id&durum=ok");
                                                                  }
                                                                  else{
                                                                    Header("Location:admin/faq.php?durum=no");
                                                                  }
                                                                }

                                                                //ketegori silme
                                                                if ($_GET['faqsil']=='ok') {

                                                                  $sil=$db->prepare("DELETE FROM faq_tbl where faq_id=:faq_id");
                                                                  $kontrol=$sil->execute(array(
                                                                    "faq_id" => $_GET['faq_id']
                                                                  ));

                                                                  if ($kontrol) {
                                                                    Header("Location:admin/faq.php?durum=ok");
                                                                  }
                                                                  else{
                                                                    Header("Location:admin/faq.php?durum=no");
                                                                  }
                                                                }


                                                                /*Terimler*/

                                                                //Terim Ekleme
                                                                if (isset($_POST['terimekle'])) {

                                                                  $terimkaydet=$db->prepare("INSERT INTO terimler_tbl SET
                                                                    terim_id=:id,
                                                                    terim_ad=:ad,
                                                                    terim=:terim
                                                                    ");
                                                                    $insert=$terimkaydet->execute(array(
                                                                      'id' => $_POST['terim_id'],
                                                                      'ad' => $_POST['terim_ad'],
                                                                      'terim' => $_POST['terim']
                                                                    ));
                                                                    if ($insert) {
                                                                      Header("Location:admin/terimler.php?durum=ok");
                                                                    }
                                                                    else{
                                                                      Header("Location:admin/terimler.php?durum=no");
                                                                    }
                                                                  }

                                                                  //Terim guncelleme
                                                                  if (isset($_POST['terimduzenle'])) {

                                                                    $terimkaydet=$db->prepare("UPDATE terimler_tbl SET
                                                                      terim_ad=:ad,
                                                                      terim=:terim
                                                                      WHERE terim_id={$_POST['terim_id']}
                                                                      ");
                                                                      $update=$terimkaydet->execute(array(
                                                                        'ad' => $_POST['terim_ad'],
                                                                        'terim' => $_POST['terim']
                                                                      ));

                                                                      $terim_id=$_POST['terim_id'];

                                                                      if ($update) {
                                                                        Header("Location:admin/terimler.php?terim_id=$terim_id&durum=ok");
                                                                      }
                                                                      else{
                                                                        Header("Location:admin/terimler.php?durum=no");
                                                                      }
                                                                    }

                                                                    //Terim silme
                                                                    if ($_GET['terimsil']=='ok') {

                                                                      $sil=$db->prepare("DELETE FROM terimler_tbl where terim_id=:terim_id");
                                                                      $kontrol=$sil->execute(array(
                                                                        "terim_id" => $_GET['terim_id']
                                                                      ));

                                                                      if ($kontrol) {
                                                                        Header("Location:admin/terimler.php?durum=ok");
                                                                      }
                                                                      else{
                                                                        Header("Location:admin/terimler.php?durum=no");
                                                                      }
                                                                    }
                                                                    ?>
