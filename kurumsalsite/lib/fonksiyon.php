<?php
 try {
  $baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset:utf8","root","");
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

}catch(PDOException $e){
  die($e->getMessage());

}
 
class kurumsal{

  public $normaltittle,$metatittle,$metadesc,$metakey,$metaout,$metaown,$metacopy,$logoyazi,$tvit,$face,$inst,$telno,$mailadres,$normaladres,$slogan,$referansbaslik,$filobaslik,$yorumbaslik,$iletisimbaslik,$hizmetlerbaslik;

  //AYARLAR

  function __construct(){
    try {
      $baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset:utf8","root","");
      $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    }catch(PDOException $e){
      die($e->getMessage());
    
    }
 
    $ayarcek=$baglanti->prepare("Select * from ayarlar");
    $ayarcek->execute();
    $sorguson=$ayarcek->fetch();

    $this->normaltitle=$sorguson["title"];
    $this->metatitle=$sorguson["metatitle"];
    $this->metadesc=$sorguson["metadesc"];
    $this->metakey=$sorguson["metakey"];
    $this->metaout=$sorguson["metaauthor"];
    $this->metaown=$sorguson["metaowner"];
    $this->metacopy=$sorguson["metacopy"];
    $this->logoyazi=$sorguson["logoyazisi"];
    $this->tvit=$sorguson["twit"];
    $this->face=$sorguson["face"];
    $this->inst=$sorguson["inst"];
    $this->telno=$sorguson["telefonno"];
    $this->normaladres=$sorguson["adres"];
    $this->mailadres=$sorguson["mailadres"];
    $this->slogan=$sorguson["slogan"];
    $this->referansbaslik=$sorguson["referansbaslik"];
    $this->filobaslik=$sorguson["filobaslik"];
    $this->yorumbaslik=$sorguson["yorumbaslik"];
    $this->iletisimbaslik=$sorguson["iletisimbaslik"];
    $this->hizmetlerbaslik=$sorguson["hizmetlerbaslik"];
  }


  // İNTRO
  function introbak($baglanti){
   
     
    $introal=$baglanti->prepare("Select * from intro");
    $introal->execute();

    while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
      
      echo '<div class="item" style="background-image:url('.$sonucum["resimyol"].');"></div>';
   
    endwhile;

  
    }


  // HAKKIMIZDA
  function hakkimizda($baglanti){
   
     
    $introal=$baglanti->prepare("Select * from hakkimizda");
    $introal->execute();
    $sonucum=$introal->fetch();

      echo '<div class="row">

        <div class="col-lg-6 hakkimizda-img">
          <img src="'.$sonucum["resim"].'" alt="'.$sonucum["resim"].'-Hakkında">
        </div>
      
      <div class="col-lg-6 content">
        <h2>'.$sonucum["baslik"].'  </h2>
        <h3>'.$sonucum["icerik"].'</h3>
      </div>

      </div>';
  }

  //HİZMETLER

   function hizmetler($baglanti){
    $introal=$baglanti->prepare('Select * from hizmetler');
    $introal->execute();
    

    echo '<div class="section-header">
        <h2>Hizmetlerimiz</h2>
         <p>'; echo $this->hizmetlerbaslik; echo'</p>
      </div>
         <div class="row">';
        while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

          echo '<div class="col-lg-6">
          <div class="box wow fadeInTop" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-certificate"></i></div>
            <h4 class="title"><a href="#">'.$sonucum["baslik"].'</a></h4>
            <p class="description">'.$sonucum["icerik"].' </p>

          </div>
         </div>';

        endwhile;
          
        echo' </div>';
   }
   //REFERANSLAR
  function referans ($baglanti){
    $introal=$baglanti->prepare("Select * from referanslar");
    $introal->execute();
    
      echo ' <div class="section-header">
        <h2>Referanslar</h2>
        <p>'; echo $this->referansbaslik; echo' </p>
      </div>
      <div class="owl-carousel clients-carousel">';

      while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
        echo '<img src='.$sonucum['resimyol'].' alt="Referans- '.$sonucum['id'].'" />';
      endwhile;
      echo '</div>';
        
      }

      //FİLO

      function filomuz ($baglanti){
        $introal=$baglanti->prepare("Select * from filomuz");
        $introal->execute();

        echo '<div class="container">

      <div class="section-header">
      <h2>Araç Filomuz</h2>
      <p>'; echo $this->filobaslik; echo'</p>
      </div> 

      <div class="container-fluid">
      <div class="row no-gutters">';

      while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-lg-3 col-md-4">
          <div class="filo-item wow fadeInUp">
            <a href="'.$sonucum["resimyol"].' "class="filo-popup">
              <img src="'.$sonucum["resimyol"].'" alt="">
              <div class="filo-overlay">
                
              </div>
            </a>
          </div>
        </div>';
        
      endwhile;
        echo '</div> </div>';

  }

  //YORUMLAR

  function yorumlar ($baglanti){
    $introal=$baglanti->prepare("Select * from yorumlar");
    $introal->execute();

    echo ' <div class="section-header">
          <h2>Müşteri Yorumları</h2>
          <p>'; echo $this->yorumbaslik; echo'</p>
        </div>
        
        <div class="owl-carousel testimonials-carousel">';

  while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
    echo '
          <div class="testimonial-item">
          <p><img src="img/sol.png" class="quote-sign-left"/>'.$sonucum["icerik"].'
            <img src="img/sag.png" class="quote-sign-right"/>
          </p>
          <img src="img/yorum.jpg" class="testimonial-image" alt="Müşteri Yorum-'.$sonucum['id'].'"/>
          <h3>'.$sonucum['isim'].'</h3>
          </div>';
    
  endwhile;
    


    

   
  }

}
  

?>