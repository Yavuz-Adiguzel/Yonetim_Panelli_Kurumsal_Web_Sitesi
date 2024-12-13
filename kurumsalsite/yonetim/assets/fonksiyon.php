<?php ob_start(); // Oturumu başlatmak için
 try {
  $baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset:utf8","root","");
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

}catch(PDOException $e){
  die($e->getMessage());

}
 
class yonetim{

  private $veriler=array();
  function sorgum ($vt, $sorgu, $tercih=0){
    $al=$vt->prepare($sorgu);
    $al->execute();

    if($tercih==1):
      return $al->fetch();
      
    elseif($tercih==2):
      return $al;


    endif;
  }


  function siteayar($baglanti) {
		$sonuc=$this->sorgum($baglanti,"SELECT * from ayarlar",1);

		if ($_POST):
			//burada veri tabani islemleri
			$title=htmlspecialchars($_POST["title"]);
			$metatitle=htmlspecialchars($_POST["metatitle"]);
			$metadesc=htmlspecialchars($_POST["metadesc"]);
			$metakey=htmlspecialchars($_POST["metakey"]);
			$metaauthor=htmlspecialchars($_POST["metaauthor"]);
			$metaowner=htmlspecialchars($_POST["metaowner"]);
			$metacopy=htmlspecialchars($_POST["metacopy"]);
			$logoyazisi=htmlspecialchars($_POST["logoyazisi"]);
			$twit=htmlspecialchars($_POST["twit"]);
			$face=htmlspecialchars($_POST["face"]);
			$inst=htmlspecialchars($_POST["inst"]);
			$telefonno=htmlspecialchars($_POST["telefonno"]);
			$adres=htmlspecialchars($_POST["adres"]);
			$mailadres=htmlspecialchars($_POST["mailadres"]);
			$slogan=htmlspecialchars($_POST["slogan"]);
			$referansbaslik=htmlspecialchars($_POST["referansbaslik"]);
			$filobaslik=htmlspecialchars($_POST["filobaslik"]);
			$yorumbaslik=htmlspecialchars($_POST["yorumbaslik"]);
			$iletisimbaslik=htmlspecialchars($_POST["iletisimbaslik"]);
			
			// bu alanda bunlarin bos veya doluluk kontrolu yapilabilir

			$guncelleme=$baglanti->prepare("UPDATE ayarlar set title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,twit=?,face=?,inst=?,telefonno=?,adres=?,mailadres=?,slogan=?,referansbaslik=?,filobaslik=?,yorumbaslik=?,iletisimbaslik=?");



			$guncelleme->bindParam(1,$title,PDO::PARAM_STR);
			$guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
			$guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
			$guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
			$guncelleme->bindParam(5,$metaauthor,PDO::PARAM_STR);
			$guncelleme->bindParam(6,$metaowner,PDO::PARAM_STR);
			$guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
			$guncelleme->bindParam(8,$logoyazisi,PDO::PARAM_STR);
			$guncelleme->bindParam(9,$twit,PDO::PARAM_STR);
			$guncelleme->bindParam(10,$face,PDO::PARAM_STR);
			$guncelleme->bindParam(11,$inst,PDO::PARAM_STR);
			$guncelleme->bindParam(12,$telefonno,PDO::PARAM_STR);
			$guncelleme->bindParam(13,$adres,PDO::PARAM_STR);
			$guncelleme->bindParam(14,$mailadres,PDO::PARAM_STR);
			$guncelleme->bindParam(15,$slogan,PDO::PARAM_STR);
			$guncelleme->bindParam(16,$referansbaslik,PDO::PARAM_STR);
			$guncelleme->bindParam(17,$filobaslik,PDO::PARAM_STR);
			$guncelleme->bindParam(18,$yorumbaslik,PDO::PARAM_STR);
			$guncelleme->bindParam(19,$iletisimbaslik,PDO::PARAM_STR);
			

			$guncelleme->execute();
			echo'<div class="alert alert-success mt-4" role="alert">
			<strong>Site Ayarları</strong>, başarılı bir şekilde güncellendi. </div>';
			header("refresh:2,url=control.php");

		else:
			?>

			<form action="control.php?sayfa=siteayar" method="POST">
				<div class="row ">
					<div class="col-lg-10 mx-auto mt-2 mb-4"><h5 class="text-info pull-left">Site ayarlari</h5></div> 
					<!--*******************TITLE****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Site Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="title" class="form-control" value="<?php echo $sonuc['title']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TITLE****************-->
					<!--*******************META TITLE****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Meta Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc['metatitle']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TITLE****************-->
					<!--*******************META TITLE****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Meta Açıklaması</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc['metadesc']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************META TITLE****************-->
					<!--*******************META KEY****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Anahtar Kelimeler</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metakey" class="form-control" value="<?php echo $sonuc['metakey']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************META KEY****************-->
					<!--*******************Author****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Yapımcı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metaauthor" class="form-control" value="<?php echo $sonuc['metaauthor']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************Author****************-->
					<!--*******************ovner****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Site Sahibi</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metaowner" class="form-control" value="<?php echo $sonuc['metaowner']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************ovner****************-->
					<!--*******************Copywright****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Copywright</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc['metacopy']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************Copywright****************-->
					<!--*******************LOGO ****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Logo</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="logoyazisi" class="form-control" value="<?php echo $sonuc['logoyazisi']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************LOGO****************-->
					<!--*******************TWITTER****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Twitter</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="twit" class="form-control" value="<?php echo $sonuc['twit']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TWITTER****************-->
					<!--*******************FACEBOOK****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Facebook</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="face" class="form-control" value="<?php echo $sonuc['face']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************FACEBOOK****************-->
					<!--*******************INSTAGRAM****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span class="siteayarfont">Instagram</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="inst" class="form-control" value="<?php echo $sonuc['inst']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************INSTAGRAM****************-->
					<!--*******************TELEFON****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Telefon Numarası</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="telefonno" class="form-control" value="<?php echo $sonuc['telefonno']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TELEFON****************-->
					<!--*******************ADRES****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Adres</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="adres" class="form-control" value="<?php echo $sonuc['adres']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TITLE****************-->
					<!--*******************EMAIL ADRESI****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Email Adresi</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc['mailadres']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************TITLE****************-->
					<!--*******************SLOGAN****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Site Sloganı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="slogan" class="form-control" value="<?php echo $sonuc['slogan']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************SLOGAN****************-->
					<!--*******************REFERANSLARIMIZ****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Referanslarımız Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="referansbaslik" class="form-control" value="<?php echo $sonuc['referansbaslik']; ?>" />
							</div>
						</div>
					</div>

					<!--*******************REFERANSLARIMIZ****************-->
					<!--*******************FILO****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Filomuz Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="filobaslik" class="form-control" value="<?php echo $sonuc['filobaslik']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************FILO****************-->
					<!--*******************YORUMLAR BASLIK****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">Yorumlar Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="yorumbaslik" class="form-control" value="<?php echo $sonuc['yorumbaslik']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************YORUMLAR****************-->
					<!--*******************ILETISIM****************-->
					<div class="col-lg-8 mx-auto mt-2">
						<div class="row">
							<div class="col-lg-4 pt-3">
								<span id="siteayarfont">İletişim Başlığı</span>
							</div>
							<div class="col-lg-8 p-1">
								<input type="text" name="iletisimbaslik" class="form-control" value="<?php echo $sonuc['iletisimbaslik']; ?>" />
							</div>
						</div>
					</div>
					<!--*******************ILETISIM****************-->

					<div class="col-lg-8 mx-auto mt-2 border-bottom">
						<input type="submit" name="buton" class="btn btn-info m-1 pull-right" value="Güncelle"  />
					</div> 

				</div>

			</form>

			<?php


    endif;

    
  }

  function sifrele($veri) {
		return base64_encode(gzdeflate(gzcompress(serialize($veri))));

	}
	function coz($veri) {
		return unserialize(gzuncompress(gzinflate(base64_decode($veri))));

	}

  function kuladial($vt){

    $cookid=$_COOKIE["kulbilgi"];
		$cozduk=self::coz($cookid);
		$sorgusonuc=self::sorgum($vt, "SELECT * from yonetim where id=$cozduk",1);
		return $sorgusonuc["kulad"];

  }

  function giriskontrol($kulad,$sifre,$vt){
    $sifrelihal=md5(sha1(md5($sifre)));	


		$sor=$vt->prepare("SELECT * from yonetim where kulad='$kulad' and sifre='$sifrelihal' ");
		$sor->execute();

		

		if($sor->rowCount()==0):

      echo '<div class="container-fluid bg-white ">
            <div class="alert alert-white border border-dark  mt-5 col-md-5 mx-auto p-3 text-danger font-14 font-weight-bold"><img src="assets/images/loader.gif" width="90"alt="" />BİLGİLER HATALI</div> 
            </div>';
			header("refresh:2, url=index.php");

		else:
			$gelendeger=$sor->fetch();
			
			$sor=$vt->prepare("UPDATE yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
			$sor->execute();

			echo '
			<div class="container-fluid bg-white ">
            <div class="alert alert-white  mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold"><img src="assets/images/loader.gif" width="90"alt="" />KULLANICI ADI VE ŞİFRE DOĞRU...<br>Sayfa Yükleniyor Lütfen Bekleyiniz.</div> 
            </div>
            ';
			header("refresh:2, url=control.php");

			// cookie olusturmak
			 $id=self::sifrele($gelendeger["id"]);

			setcookie("kulbilgi", $id, time() + 60*60*24);


		endif;
  }

  function cikis($vt) {
		$cookid=$_COOKIE["kulbilgi"];
		/*
		Giris yapan kullanicinin bilgilerini teyid etmek icin db ye baglanabilirsin 
		o bilgiler ile saglama yaparak daha fazla kontrol yapabiliriz 

		*/
		$cozduk=self::coz($cookid);

	    self::sorgum($vt,"UPDATE yonetim set aktif=0 where id=$cozduk",0);
	    setcookie("kulbilgi",$cookid,time() -5);
	    echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">BASARILI BIR SEKILDE CIKIS YAPTINIZ</div>';
	    header ("refresh:2, url=index.php");
	}

  //cookie kontrolü

  function kontrolet($sayfa) {

		if(isset($_COOKIE["kulbilgi"])) :

			if($sayfa=="ind") : header("Location:control.php"); endif;
		else:
			if($sayfa=="cot") : header("Location:index.php"); endif;
	    endif;

	}

  // İNTRO ----------------------------


  function introayar($vt){


		echo '<div class=row text-center>
		<div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info">İNTRO RESİMLERİ</h3><a href="control.php?sayfa=introresimekle" class="btn btn-success m-2 float-right">YENİ RESİM EKLE</a></div>';
	
		$introbilgiler=$this->sorgum($vt,"Select * from intro",2);
	
		while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
			echo '<div class="col-lg-4">
			<div class="row border border-light p-1 m-1">
			<div class="col-lg-12">
			<img src="../'.$sonbilgi["resimyol"].'">
			</div>
	
			<div class="col-lg-6 text-right">
			<a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
			</div>
	
			<div class="col-lg-6 text-left">
			<a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="fa fa-close m-2 text-danger" style="font-size:25px;"></a>
			</div>
	
			</div>
			</div>';
	
		endwhile;
		echo '</div>';
		
	  }

  function introresimekleme($vt){

		echo '<div class="row text-center">
		<div class="col-lg-12">
		';
	  
		if ($_POST) :
	  
		  if ( $_FILES["dosya"]["name"]=="") :
	  
			echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi. Boş Olamaz</div>';
			header("refresh:2,url=control.php?sayfa=introresimekle");  
	  
			else://boş değilse
	  
			if ( $_FILES["dosya"]["size"]> (1024*1024*5)) :
	  
			  echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla</div>';
			  header("refresh:2,url=control.php?sayfa=introresimekle");
	  
			  else://boyutta bir problem yok ise
	  
			  $izinverilen=array("image/png","image/jpeg");
	  
			  if (!in_array ($_FILES["dosya"]["type"],$izinverilen)) :
	  
				echo '<div class="alert alert-danger mt-1">İzin verilen uzantı değil.</div>';
				header("refresh:2,url=control.php?sayfa=introresimekle");
	  
				else://artık herşey tamam
	  
				$dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
	  
				move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
	  
				echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA YÜKLENDİ.</div>';
				header("refresh:2,url=control.php?sayfa=introayar");
				//dosya yüklendikten sonra veritabanınada bu kaydı eklemem lazım
	  
				$dosyaminyolu2=str_replace('../','',$dosyaminyolu);
	  
				$kayıtekle=self::sorgum($vt,"insert into intro (resimyol) VALUES('$dosyaminyolu2')",0);      
	  
	  
			  endif;
	  
			endif;
	  
		  endif;
	  
		else:
		  ?>
	  
		  <div class="col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
			  <div class="card-body">
				<h5 class="title border-bottom">RESİM YÜKLEME FORMU</h5>
				<form action="" method="post" enctype="multipart/form-data">
				  <p class="card-text"><input type="file" name="dosya" /></p>
				  <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
				</form>
	  
				<p class="card-text text-left text-danger border-top">
				* izin verilen formatlar : jgp-png <br/>
				* izin verilen max.boyut : 5 MB
			  </p>
	  
			</div>
		  </div>
		 </div>
	  
		  <?php
	  
		endif;
	  
		echo '</div></div></div>';
	  
	  }
	  //intro resim silme
  function introsil($vt) {
	  
		$introid=$_GET["id"];
	  
		$verial=self::sorgum($vt,"select * from intro where id=$introid",1);
	  
		echo '<div class="row text-center">
		<div class="col-lg-12">
		';
	  
		//veritabanı ver silme
		self::sorgum($vt,"delete from intro where id=$introid",0);
		//dosyayı silme işlemi
		unlink("../".$verial["resimyol"]);
	    echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA SİLİNDİ.</div>';
	    echo '</div></div>';
	  
		header("refresh:2,url=control.php?sayfa=introayar");
	  }

  function introresimguncelleme($vt) {

	$gelintroid=$_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">
     ';

    if ($_POST) :

    $formdangelenid=$_POST["introid"];

    if ( $_FILES["dosya"]["name"]=="") :

      echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi. Boş Olamaz</div>';
      header("refresh:2,url=control.php?sayfa=introayar");  

      else://boş değilse

      if ( $_FILES["dosya"]["size"]> (1024*1024*5)) :

        echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla</div>';
        header("refresh:2,url=control.php?sayfa=introayar");

        else://boyutta bir problem yok ise

        $izinverilen=array("image/png","image/jpeg");

        if (!in_array ($_FILES["dosya"]["type"],$izinverilen)) :

          echo '<div class="alert alert-danger mt-1">İzin verilen uzantı değil.</div>';
          header("refresh:2,url=control.php?sayfa=introayar");

          else://artık herşey tamam


          //db den mevcut veriyi çektik ve dosyayı sildik.
          $resimyolunabak=self::sorgum($vt,"select * from intro where id=$gelintroid",1);
          $dbgelenyol='../'.$resimyolunabak["resimyol"];
          unlink($dbgelenyol);
          //db den mevcut veriyi çektik ve dosyayı sildik.


          $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
          move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);


          $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
          self::sorgum($vt,"update intro set resimyol='$dosyaminyolu2' where id=$gelintroid",0);


          echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>';
          header("refresh:2,url=control.php?sayfa=introayar");

                


        endif;

      endif;

    endif;

    else:
    ?>

    <div class="col-lg-4 mx-auto mt-2">
      <div class="card card-bordered">
        <div class="card-body">
          <h5 class="title border-bottom">RESİM GÜNCELLEME FORMU</h5>
          <form action="" method="post" enctype="multipart/form-data">
            <p class="card-text"><input type="file" name="dosya" /></p>
            <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelintroid; ?>" /></p>
            <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" /> 
          </form>

          <p class="card-text text-left text-danger border-top">
          * izin verilen formatlar : jgp-png <br/>
          * izin verilen max.boyut : 5 MB
        </p>

      </div>
    </div>
    </div>

    <?php

    endif;

    echo '</div></div></div>';
	}

  // FİLO-------------------------

  function filoayar($vt){

	echo '<div class="row text-center">
	<div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">FİLO RESİMLERİ</h3>
	<a href="control.php?sayfa=filoayarekle" class="float-right btn btn-success m-2 ">YENİ RESİM EKLE</a></div>';
	
	$introbilgiler=self::sorgum($vt,"select * from filomuz",2);
  
	while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :
  
	  echo '<div class="col-lg-4">
  
	  <div class="row border border-light p-1 m-1">
	  <div class="col-lg-12">
	  <img src="../'.$sonbilgi["resimyol"].'">
	  </div>
  
	  <div class="col-lg-6 text-right">
	  <a href="control.php?sayfa=filoayarguncelleme&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
	  </div>
  
	  <div class="col-lg-6 text-left">
	  <a href="control.php?sayfa=filoayarsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
	  </div>
  
	  </div>
    </div>';
  
	endwhile;
  
	echo '</div>';
  
  }//Mevcut introlar getiriliyor.
  //intro resim ekleme
  function filoayarekle($vt){
  
	echo '<div class="row text-center">
	<div class="col-lg-12">
	';
  
	if ($_POST) :
  
	  if ( $_FILES["dosya"]["name"]=="") :
  
		echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi. Boş Olamaz</div>';
		header("refresh:2,url=control.php?sayfa=filoayarekle");  
  
		else://boş değilse
  
		if ( $_FILES["dosya"]["size"]> (1024*1024*5)) :
  
		  echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla</div>';
		  header("refresh:2,url=control.php?sayfa=filoayarekle");
  
		  else://boyutta bir problem yok ise
  
		  $izinverilen=array("image/png","image/jpeg");
  
		  if (!in_array ($_FILES["dosya"]["type"],$izinverilen)) :
  
			echo '<div class="alert alert-danger mt-1">İzin verilen uzantı değil.</div>';
			header("refresh:2,url=control.php?sayfa=filoayarekle");
  
			else://artık herşey tamam
  
			$dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
  
			move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
  
			echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA YÜKLENDİ.</div>';
			header("refresh:2,url=control.php?sayfa=filoayar");
			//dosya yüklendikten sonra veritabanınada bu kaydı eklemem lazım
  
			$dosyaminyolu2=str_replace('../','',$dosyaminyolu);
  
			self::sorgum($vt,"insert into filomuz (resimyol) VALUES('$dosyaminyolu2')",0);      
  
  
		  endif;
  
		endif;
  
	  endif;
  
	else:
	  ?>
  
	  <div class="col-lg-4 mx-auto mt-2">
		<div class="card card-bordered">
		  <div class="card-body">
			<h5 class="title border-bottom">RESİM YÜKLEME FORMU</h5>
			<form action="" method="post" enctype="multipart/form-data">
			  <p class="card-text"><input type="file" name="dosya" /></p>
			  <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
			</form>
  
			<p class="card-text text-left text-danger border-top">
			* izin verilen formatlar : jgp-png <br/>
			* izin verilen max.boyut : 5 MB
		  </p>
  
		</div>
	  </div>
	</div>
  
	  <?php
  
	endif;
  
	echo '</div></div></div>';
  
  }
  //intro resim silme
  function filoayarsil($vt) {
  
	$introid=$_GET["id"];
  
	$verial=self::sorgum($vt,"select * from filomuz where id=$introid",1);
  
	echo '<div class="row text-center">
	<div class="col-lg-12">
	';
  
	//veritabanı ver silme
	self::sorgum($vt,"delete from filomuz where id=$introid",0);
	//dosyayı silme işlemi
	unlink("../".$verial["resimyol"]);
    echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA SİLİNDİ.</div>';
	echo '</div></div>';
  
	header("refresh:2,url=control.php?sayfa=filoayar");
  }
  
  function filoayarguncelleme($vt){
  
	$gelintroid=$_GET["id"];
  
	echo '<div class="row text-center">
	<div class="col-lg-12">
	';
  
	if ($_POST) :
  
	  $formdangelenid=$_POST["introid"];
  
	  if ( $_FILES["dosya"]["name"]=="") :
  
		echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi. Boş Olamaz</div>';
		header("refresh:2,url=control.php?sayfa=filoayar");  
  
		else://boş değilse
  
		if ( $_FILES["dosya"]["size"]> (1024*1024*5)) :
  
		  echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla</div>';
		  header("refresh:2,url=control.php?sayfa=filoayar");
  
		  else://boyutta bir problem yok ise
  
		  $izinverilen=array("image/png","image/jpeg");
  
		  if (!in_array ($_FILES["dosya"]["type"],$izinverilen)) :
  
			echo '<div class="alert alert-danger mt-1">İzin verilen uzantı değil.</div>';
			header("refresh:2,url=control.php?sayfa=filoayar");
  
			else://artık herşey tamam
  
  
			//db den mevcut veriyi çektik ve dosyayı sildik.
			$resimyolunabak=self::sorgum($vt,"select * from filomuz where id=$gelintroid",1);
			$dbgelenyol='../'.$resimyolunabak["resimyol"];
			unlink($dbgelenyol);
			//db den mevcut veriyi çektik ve dosyayı sildik.
  
  
			$dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
			move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
  
  
			$dosyaminyolu2=str_replace('../','',$dosyaminyolu);
			self::sorgum($vt,"update filomuz set resimyol='$dosyaminyolu2' where id=$gelintroid)",0);
  
  
			echo '<div class="alert alert-success mt-1">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>';
			header("refresh:2,url=control.php?sayfa=filoayar");
  
				  
  
  
		  endif;
  
		endif;
  
	  endif;
  
	else:
	  ?>
  
	  <div class="col-lg-4 mx-auto mt-2">
		<div class="card card-bordered">
		  <div class="card-body">
			<h5 class="title border-bottom">RESİM GÜNCELLEME FORMU</h5>
			<form action="" method="post" enctype="multipart/form-data">
			  <p class="card-text"><input type="file" name="dosya" /></p>
			  <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelintroid; ?>" /></p>
			  <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" /> 
			</form>
  
			<p class="card-text text-left text-danger border-top">
			* izin verilen formatlar : jgp-png <br/>
			* izin verilen max.boyut : 5 MB
		  </p>
  
		</div>
	  </div>
	</div>
  
	  <?php
  
	endif;
  
	echo '</div></div></div>';
  
  }

  // HAKKIMIZDA------------------------------

  function hakkimizda($vt){

	echo '<div class="row text-center">
	<div class="col-lg-12 border-bottom"><h3 class=" mt-3 text-info">HAKKIMIZDA AYARLARI</h3>
	</div>';

	if (!$_POST) :

	
	
	$sonbilgi=self::sorgum($vt,"select * from hakkimizda",1);
  
	echo '<div class="col-lg-6 mx-auto">
  
	  <div class="row border border-light p-1 m-1">

	  <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
	  Resim
	  </div>

	  <div class="col-lg-9 border-bottom">
	  <img src="../'.$sonbilgi["resim"].'"><br>
	  <form action="" method="post" enctype="multipart/form-data">
	  <input type="file" name="dosya"/>
	  </div>

	  <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
	  Başlık
	  </div>

	  <div class="col-lg-9 border-bottom">
	  
	  <input type="text" name="baslik" class="form-control m-2" value="'.$sonbilgi["baslik"].'">
      </div>

	  <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
	  İçerik
	  </div>

	  <div class="col-lg-9 ">
	  <textarea name="icerik"  class="form-control" rows="8">'.$sonbilgi["icerik"].'</textarea>
	  </div>

	  <div class="col-lg-12 border-top">
	  <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-2" />
	  </form>
      </div>

	  </div>';

	else:
		
		$baslik=$_POST["baslik"];
		$icerik=$_POST["icerik"];

		if ( @$_FILES["dosya"]["name"]!="") :  
	  
			if ( $_FILES["dosya"]["size"]< (1024*1024*5)) :
	  
			  $izinverilen=array("image/png","image/jpeg");
	  
			  if (in_array ($_FILES["dosya"]["type"],$izinverilen)) :
	  
				$dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
	  
				move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
				
				$veritabaniicin=str_replace('../','',$dosyaminyolu);

	endif;
    endif;
    endif;

	if (@ $_FILES["dosya"]["name"]!="") :

	self::sorgum($vt,"update hakkimizda set baslik='$baslik',icerik='$icerik',resim='$veritabaniicin'",0);

	echo '
	<div class="col-lg-6 mx-auto">
	<div class="alert alert-success mt-1">GÜNCELLEME BAŞARILI.
	</div>';
	echo '</div></div>';
  
	header("refresh:2,url=control.php?sayfa=hakkimizayar");

	else:
		echo '<div class="alert alert-success mt-1">GÜNCELLEME BAŞARILI.</div>';
		echo '</div></div>';
	  
		header("refresh:2,url=control.php?sayfa=hakkimizayar");

		self::sorgum($vt,"update hakkimizda set baslik='$baslik',icerik='$icerik'",0);

		echo '
		<div class="col-lg-6 mx-auto">
		<div class="alert alert-success mt-1">GÜNCELLEME BAŞARILI.
		</div>';

    endif;
	echo '</div>';
    endif;
	
  
  }

  //HİZMETLERİMİZ---------------------------------------

function hizmetlerhepsi($vt){
	echo '<div class="row text-center">
	<div class="col-lg-12">
	<h4 class="float-left mt-3 text-info mb-2">HİZMETLER AYARLARI</h4>
	<a href="control.php?sayfa=hizmetekle" class="btn btn-success p-1 text-white mr-2 mt-3 float-right">Hizmet Ekle</a>
	 </div>';
   //$introbilgiler=$vt->prepare("select * from galeri");
   $introbilgiler=self::sorgum($vt,"select * from hizmetler",2);
   while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
	echo '<div class="col-lg-6">
	<div class="row card-bordered p-1 m-1 bg-light">
	<div class="col-lg-10 pt-1 pb-1">
	<h5>'.$sonbilgi["baslik"].'</h5>
	</div>
	<div class="col-lg-2 text-right">
	<a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi["id"].'" class="ti-reload  text-success" style="font-size:20px;"></a>
	<a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["id"].'" class="ti-trash  text-danger pl-1" style="font-size:20px;"></a>
	</div>
	<div class="col-lg-12 border-top text-secondary">
	'.$sonbilgi["icerik"].'
	</div>

	</div>
	</div>';
    endwhile;
   echo '</div>';
   }
function hizmetekleme($vt){
	echo '<div class="row text-center">
	<div class="col-lg-12 border-bottom">
	<h3 class=" mt-3 text-info">Hizmet Ekle<h3>
	</div>';
    //$introbilgiler=$vt->prepare("select * from galeri");
	if(!$_POST):
	
	echo '<div class="col-lg-6 mx-auto">
	<div class="row card-bordered p-1 m-1 bg-light">
	<div class="col-lg-2 pt-3">
	Başlık
	</div>
	<div class="col-lg-10 p-2">
	<form action="" method="post">
	<input type="text" name="baslik" class="form-control" />
	
	</div>

	<div class="col-lg-12 border-top p-2 ">
	İçerik
	</div>
	<div class="col-lg-12 border-top p-2">
	<textarea name="icerik" rows="5" class="form-control"></textarea>
	</div>
	<div class="col-lg-12 border-top p-2">
	<input type="submit" name="buton" value="Hizmet Ekle" class="btn btn-primary"/>
	</form>
	</div>

	</div>
	</div>';
	else:
		$baslik=htmlspecialchars($_POST["baslik"]);
		$icerik=htmlspecialchars($_POST["icerik"]);
		if($baslik=="" && $icerik==""):
			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">
			Veriler boş olamaz.</div></div>';
			header("refresh:2,url=control.php?sayfa=hizmetler");
		else:
			self::sorgum($vt,"insert into hizmetler (baslik,icerik) values('$baslik','$icerik')",0);
			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">
			Ekleme başarılı.</div></div>';
			header("refresh:2,url=control.php?sayfa=hizmetler");
		endif;
    endif;
    echo '</div>';
  }
function hizmetguncelleme($vt){
	echo '<div class="row text-center">
	<div class="col-lg-12 border-bottom">
	<h3 class=" mt-3 text-info">Hizmet Guncelleme<h3>
	</div>';
	/* gelen id alınacak
	id ile veritabanından bilgiler alınacak
	inputlara o veriler yazılacak
	hidden ile id post için tasınacak
	$introbilgiler=$vt->prepare("select * from hizmetler");
	*/
	$kayitid=$_GET["id"];
	$kayitbilgial=self::sorgum($vt,"select * from hizmetler where id=$kayitid",1);
	if(!$_POST):
	
	echo '<div class="col-lg-6 mx-auto">
	<div class="row card-bordered p-1 m-1 bg-light">
	<div class="col-lg-2 pt-3">
	Başlık
	</div>
	<div class="col-lg-10 p-2">
	<form action="" method="post">
	<input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'"/>
	
	</div>

	<div class="col-lg-12 border-top p-2 ">
	İçerik
	</div>
	<div class="col-lg-12 border-top p-2">
	<textarea name="icerik" rows="5" class="form-control">'.$kayitbilgial["icerik"].'</textarea>
	</div>
	<div class="col-lg-12 border-top p-2">
	<input type="hidden" name="kayitidsi" value="'.$kayitid.'" />
	<input type="submit" name="buton" value="Hizmet Güncelle" class="btn btn-primary"/>
	</form>
	</div>

	</div>
	</div>';
	else:
		$baslik=htmlspecialchars($_POST["baslik"]);
		$icerik=htmlspecialchars($_POST["icerik"]);
		$kayitidsi=htmlspecialchars($_POST["kayitidsi"]);
		if($baslik=="" && $icerik==""):
			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">
			Veriler boş olamaz.</div></div>';
			header("refresh:2,url=control.php?sayfa=hizmetler");
		else:
			self::sorgum($vt,"update hizmetler set baslik='$baslik',icerik='$icerik' where id=$kayitidsi",0);
			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">
			Güncelleme başarılı.</div></div>';
			header("refresh:2,url=control.php?sayfa=hizmetler");
		endif;
    endif;
   echo '</div>';


  }
function hizmetsil($vt){
    $kayitid=$_GET["id"];
    echo '<div class="row text-center">
    <div class="col-lg-12">';

    //vtden sileme
    self::sorgum($vt,"delete  from hizmetler where id=$kayitid",0);
    echo '<div class="alert alert-success mt-5">
    Silme başarılı.</div>';
    echo '</div></div>';
    header("refresh:2,url=control.php?sayfa=hizmetler");
}

 //REFERANSLAR---------------------------------------

function referanslarhepsi($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12 ">
    <h4 class="float-left mt-3 text-info mb-2">Referans Ayarları</h4>
    <a href="control.php?sayfa=refekle" class="float-right btn btn-success mt-3 p-2 m-2">Referans Ekle</a>
    </div>';
   //$introbilgiler=$vt->prepare("select * from referanslar");
   $introbilgiler=self::sorgum($vt,"select * from referanslar",2);
   while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
    echo '<div class="col-lg-2">
    <div class="row card-bordered  p-1 m-1">
    <div class="col-lg-12">
    <img src="../'.$sonbilgi["resimyol"].'">
    </div>
    <a href="control.php?sayfa=refsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
    </div>
    </div>';
   endwhile;
   echo '</div>';
}

function refekleme($vt){
	echo '<div class="row text-center">
    <div class="col-lg-12">';
    if($_POST):
        
        //dosya bos mu dolumu
        //boyut uygunmu
        //uzanttı 
        //son
        if($_FILES["dosya"]["name"]==""):
            echo '<div class="alert alert-danger mt-5">
            Dosya yüklenmedi, bu alan boş olamaz.</div>';
            header("refresh:2,url=control.php?sayfa=ref");
        else://bos degilse
            if($_FILES["dosya"]["size"]>(1024*1024*5)):
                echo '<div class="alert alert-danger mt-5">
                Dosya boyutu çok fazla!</div>';
                header("refresh:2,url=control.php?sayfa=ref");
            else://boyut uygunsa
                $izinverilen=array("image/png", "image/jpeg");
                if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                    echo '<div class="alert alert-danger mt-5">
                   İzin verilen uzantı değil!</div>';
                   header("refresh:2,url=control.php?sayfa=ref");
                else://kosullar tamam
                    $dosyaminyolu='../img/referans/'.$_FILES["dosya"]["name"];
                
                    move_uploaded_file($_FILES["dosya"]["tmp_name"],'../img/referans/'
                    .$_FILES["dosya"]["name"]);
                    echo '<div class="alert alert-success mt-5">
                    Yükleme başarılı.</div>';
                    header("refresh:2,url=control.php?sayfa=referans");
                    //veritabanına ekleme-----------
                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    $kayıtekle=self::sorgum($vt,"insert into referanslar (resimyol) VALUES('$dosyaminyolu2')",0);
                endif;
            endif; 
    endif;
  
    else:
         ?>
         <div class="col-lg-4 mx-auto mt-2">
         <div class="card card-bordered">
         <div class="card-body">
         <h5 class="title border-bottom">Galeri resim yükleme formu</h5>
         <form action="" method="post" enctype="multipart/form-data">
         <p class="card-text">
         <input type="file" name="dosya" /></p>
         <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
         </form>
         <p class="card-text text-left text-danger border-top">
         * İzin verilen formatlar : jpeg, png<br/>
         * izn verilen max. boyut : 5Mb
         </p>
         </div>
         </div>
         </div>
        <?php 
    endif;
    echo '</div></div>';

}

function refsil($vt){
    $introid=$_GET["id"];
    $verial=self::sorgum($vt,"select * from referanslar where id=$introid",1);
    echo '<div class="row text-center">
    <div class="col-lg-12">';
     //dosyayıdasil
    unlink("../".$verial["resimyol"]);
    //vtden sileme
  
    self::sorgum($vt,"delete  from referanslar where id=$introid",0);
    echo '<div class="alert alert-success mt-5">
    Silme başarılı.</div>';
    echo '</div></div>';
    header("refresh:2,url=control.php?sayfa=referans");
 

}
//YORUMLAR-----

function yorumlarhepsi($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=yorumlarekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
    Müşteri Yorumları</h4> </div>';
    //$introbilgiler=$vt->prepare("select * from galeri");
   $introbilgiler=self::sorgum($vt,"select * from yorumlar",2);
   while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
    echo '<div class="col-lg-4">
    <div class="row card-bordered p-1 m-1 bg-light" style="border-radius:10px;">
    <div class="col-lg-9 pt-1 text-left">
    <h5>İsim:'.$sonbilgi["isim"].'</h5>
    </div>
    <div class="col-lg-3 text-right p-2">
    <a href="control.php?sayfa=yorumlarguncelle&id='.$sonbilgi["id"].'" class="ti-reload  text-success" style="font-size:20px;"></a>
    <a href="control.php?sayfa=yorumlarsil&id='.$sonbilgi["id"].'" class="ti-trash  text-danger pl-1" style="font-size:20px;"></a>
    </div>
    <div class="col-lg-12 border-top text-secondary">
    '.$sonbilgi["icerik"].'
    </div>

    </div>
    </div>';
   endwhile;
   echo '</div>';
}
function yorumlarekleme($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">Yorum Ekle<h3>
    </div>';
    //$introbilgiler=$vt->prepare("select * from galeri");
    if(!$_POST):
    
    echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light">
    <div class="col-lg-2 pt-3">
    İsim
    </div>
    <div class="col-lg-10 p-2">
    <form action="" method="post">
    <input type="text" name="isim" class="form-control" />
    
    </div>

    <div class="col-lg-12 border-top p-2 ">
    Mesaj
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="mesaj" rows="5" class="form-control"></textarea>
    </div>
    <div class="col-lg-12 border-top p-2">
    <input type="submit" name="buton" value="Yorum Ekle" class="btn btn-primary"/>
    </form>
    </div>

    </div>
    </div>';
    else:
        $isim=htmlspecialchars($_POST["isim"]);
        $mesaj=htmlspecialchars($_POST["mesaj"]);
        if($isim=="" && $mesaj==""):
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">
            Veriler boş olamaz.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        else:
            self::sorgum($vt,"insert into yorumlar (icerik,isim) values('$mesaj','$isim')",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Ekleme başarılı.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        endif;
    endif;
    echo '</div>';
}

function yorumlarguncelleme($vt){
    echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">Yorum Guncelleme<h3>
    </div>';
    /* gelen id alınacak
    id ile veritabanından bilgiler alınacak
    inputlara o veriler yazılacak
    hidden ile id postiçin tasınacak
    $introbilgiler=$vt->prepare("select * from yorumlar");
    */
    $kayitid=$_GET["id"];
    $kayitbilgial=self::sorgum($vt,"select * from yorumlar where id=$kayitid",1);
    if(!$_POST):
    
    echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light">
    <div class="col-lg-2 pt-3">
    İsim
    </div>
    <div class="col-lg-10 p-2">
    <form action="" method="post">
    <input type="text" name="isim" class="form-control" value="'.$kayitbilgial["isim"].'"/>
    
    </div>

    <div class="col-lg-12 border-top p-2 ">
    Mesaj
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="mesaj" rows="5" class="form-control">'.$kayitbilgial["icerik"].'</textarea>
    </div>
    <div class="col-lg-12 border-top p-2">
    <input type="hidden" name="kayitidsi" value="'.$kayitid.'" />
    <input type="submit" name="buton" value="Yorum Güncelle" class="btn btn-primary"/>
    </form>
    </div>

    </div>
    </div>';
    else:
        $isim=htmlspecialchars($_POST["isim"]);
        $mesaj=htmlspecialchars($_POST["mesaj"]);
        $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);
        if($isim=="" && $mesaj==""):
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">
            Veriler boş olamaz.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        else:
            self::sorgum($vt,"update yorumlar set icerik='$mesaj',isim='$isim' where id=$kayitidsi",0);
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">
            Güncelleme başarılı.</div></div>';
            header("refresh:2,url=control.php?sayfa=yorumlar");
        endif;
    endif;
    echo '</div>';
}

function yorumlarsil($vt){
	$kayitid=$_GET["id"];
	echo '<div class="row text-center">
	<div class="col-lg-12">';
	
	//vtden sileme
	self::sorgum($vt,"delete  from yorumlar where id=$kayitid",0);
	echo '<div class="alert alert-success mt-5">
	Silme başarılı.</div>';
	echo '</div></div>';
	header("refresh:2,url=control.php?sayfa=yorumlar");
	}

//MESAJLAR----

private function mailgetir($vt,$veriler){
    $sor=$vt->prepare("select * from $veriler[0] where  durum=$veriler[1]");
    $sor->execute();
    return $sor;
}
function gelenmesajlar($vt){
    echo '<div class="row">
    <div class="col-lg-12 mt-2">
    <div class="card">
    <div class="card-body">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" role="tab"
    aria-control="gelen" aria-selected="true">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 0))->rowCount().'</kbd>Gelen Mesajlar</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"  id="okunmus-tab" data-toggle="tab" href="#okunmus" role="tab"
    aria-control="okunmus" aria-selected="false">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 1))->rowCount().'</kbd>Okunmus Mesajlar</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"  id="arsiv-tab" data-toggle="tab" href="#arsiv" role="tab"
    aria-control="arsiv" aria-selected="false">
    <kbd>'.self::mailgetir($vt,array("gelenmail", 2))->rowCount().'</kbd>Arsivlenmiş Mesajlar</a>
    </li>
    </ul>
    <div class="tab-content mt-3" id="benimTab">
    <div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelbdy="gelen-tab">';
    $sonuc=self::mailgetir($vt,array("gelenmail", 0));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Gelen mesaj yok</div>';
    endif;
    echo'</div>
    <div class="tab-pane fade" id="okunmus" role="tabpanel" aria-labelbdy="okunmus-tab">
    ';
    $sonuc=self::mailgetir($vt,array("gelenmail", 1));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Okunmus mesaj yoktur.</div>';
    endif;
    echo'
    </div>
    <div class="tab-pane fade" id="arsiv" role="tabpanel" aria-labelbdy="arsiv-tab">
    ';
    $sonuc=self::mailgetir($vt,array("gelenmail", 2));
    if($sonuc->rowCount()!=0):
        while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
            echo '<div class="row">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
            <div class="col-lg-1 p-1">
            <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
            <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div></div>
            </div>';
        
            endwhile;
        else:
            echo '<div class="alert alert-info">Arşivlenmiş mesaj yoktur.</div>';
    endif;
    echo'
    </div>
    </div></div></div></div></div>';
}
function mesajdetay($vt,$id){
    $mesajbilgi=self::sorgum($vt,"select * from gelenmail where id=$id",1);
 
            echo '<div class="row mt-2">
            <div class="col-lg-12 bg-light mt-2 font-weight-bold">
            <div class="row border-bottom">
            <div class="col-lg-1 p-1">Ad & Ünvan</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>
            <div class="col-lg-1 p-1">Mail Adresi</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>
            <div class="col-lg-1 p-1">Konu</div>
            <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>
            <div class="col-lg-1 p-1">Tarih</div>
            <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
            <div class="col-lg-1 p-1">

            <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'">
            <i class="fa fa-share border-right pr-2 text-dark"></i></a>
            <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'">
            <i class="fa fa-close  pr-2 text-dark"></i></a>
            </div></div>
            <div class="row text-left p-2">
            <div class="col-lg-12">
            '.$mesajbilgi["mesaj"].'
            </div>
            </div></div></div></div>';
            self::sorgum($vt,"update gelenmail set durum=1 where id=$id",0);
            //durum guncellemesi bitti

}
function mesajarsivle($vt,$id){
             echo '<div class="row mt-2">
            <div class="col-lg-12 mt-2 font-weight-bold">
            <div class="alert alert-info mt-2 mb-2">Mesaj arşivlendi.</div>
            </div></div>';
            header("refresh:2,url=control.php?sayfa=gelenmesaj");
            self::sorgum($vt,"update gelenmail set durum=2 where id=$id",0);

}
function mesajsil($vt,$id){
    echo '<div class="row mt-2">
   <div class="col-lg-12 mt-2 font-weight-bold">
   <div class="alert alert-info mt-2 mb-2">Mesaj silindi.</div>
   </div></div>';
   header("refresh:2,url=control.php?sayfa=gelenmesaj");
   self::sorgum($vt,"delete from gelenmail where id=$id",0);

}

function mailayar($baglanti) {
	$sonuc=$this->sorgum($baglanti,"SELECT * FROM gelenmailayar",1 );
    if($_POST):
        $host=htmlspecialchars($_POST["host"]);
        $mailadres=htmlspecialchars($_POST["mailadres"]);
        $sifre=htmlspecialchars($_POST["sifre"]);
        $port=htmlspecialchars($_POST["port"]);
       
        $guncelleme=$baglanti->prepare("update gelenmailayar set 
        host=?,mailadres=?,sifre=?,port=?");
        $guncelleme->bindParam(1,$host,PDO::PARAM_STR);
        $guncelleme->bindParam(2,$mailadres,PDO::PARAM_STR);
        $guncelleme->bindParam(3,$sifre,PDO::PARAM_STR);
        $guncelleme->bindParam(4,$port,PDO::PARAM_STR);
        
        $guncelleme->execute();
        echo '<div class="alert alert-success mt-5">
        <strong>Mail ayarları</strong> başarıyla güncellendi.
        </div>';
        header("refresh:2,url=control.php?sayfa=mailayar");
    else:
    ?>

<form action="control.php?sayfa=mailayar" method="post">
    <div class="row text-center">
    <div class="col-lg-6 mx-auto">
    <div class="col-lg-12 mx-auto mt-2">
    <h3 class="text-info">Mail Ayarları
 
    </h3>
    </div>
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Host</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="host" class="form-control" value="<?php echo $sonuc['host']; ?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Mail Adresi</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc['mailadres'];?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Host Sifre</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="sifre" class="form-control" value="<?php echo $sonuc["sifre"];?>" />
    </div>
    </div>
    </div>
    <!--ara-->
    <div class="col-lg-12 mx-auto border">
    <div class="row">
    <div class="col-lg-3 border-right pt-3 text-left">
    <span id="siteayarfont">Port</span>
    </div>
    <div class="col-lg-9 p-1">
    <input type="text" name="port" class="form-control" value="<?php echo $sonuc["port"];?>" />
    </div>
    </div>
    </div>
        <!--ara-->
    <div class="col-lg-12 mx-auto mt-2">
    <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
    </div>
    </div>
    </div>
    </form>

		<?php


endif;


}

function ayarlar($baglanti) {
    $id=self::coz($_COOKIE["kulbilgi"]);
    $sonuc=self::sorgum($baglanti,"SELECT * FROM yonetim where id=$id",1 );
    if($_POST):
        @$kulad=htmlspecialchars($_POST["kulad"]);
        @$eskisif=htmlspecialchars($_POST["sifre"]);
        @$yenisif=htmlspecialchars($_POST["yenisifre"]);
        @$yenisif2=htmlspecialchars($_POST["yenisifre2"]);
        //eski şifreyi şifrele ve vt ile karsılastır.
        //yeni sifreler aynımı kontrol et
        //
        if($kulad=="" || $eskisif=="" || $yenisif=="" || $yenisif2==""):
            echo '<div class="alert alert-danger mt-5">Hiçbir alan boş geçilemez.</div>';
            header("refresh:2,url=control.php?sayfa=ayarlar");
        else:
        $sifrelihal=md5(sha1(md5($eskisif)));
        if($sonuc['sifre']!=$sifrelihal):
            echo '<div class="alert alert-danger mt-5">Eski şifre hatalı girildi.</div>';
            header("refresh:2,url=control.php?sayfa=ayarlar");
        else:
            if($yenisif!=$yenisif2):
                echo '<div class="alert alert-danger mt-5">Yeni şifreler eşleşmiyor.</div>';
                header("refresh:2,url=control.php?sayfa=ayarlar");
            else:
                $yenisifson=md5(sha1(md5($yenisif)));
                $guncelleme=$baglanti->prepare("update yonetim set 
                kulad=?,sifre=? where id=$id");
                $guncelleme->bindParam(1,$kulad,PDO::PARAM_STR);
                $guncelleme->bindParam(2,$yenisifson,PDO::PARAM_STR);
                $guncelleme->execute();
                echo '<div class="alert alert-success mt-5">
               Bilgiler başarıyla güncellendi.
                </div>';
                header("refresh:2,url=control.php?sayfa=ayarlar");
            endif;
        endif;
	endif;
endif;
    
}



}

  

  
?>