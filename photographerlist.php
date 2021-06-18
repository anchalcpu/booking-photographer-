<?php
Include"class.php";
Include"conn.php";


$state=$_GET["state"];
$photographer=new Photographer();
$query="select * from photographer where state='$state' and isVerified=1 and price!=''";
$res=mysqli_query($photographer->connection,$query);


?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148326600-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148326600-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Busicol</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>
.card-img{
Width:70%;
}
.checked {
  color: orange;
}
#sticky-header{
    background:black;
}
.pro_option{
Width:auto;
Top:130px;
  position: fixed;
  z-index: 9;
  overflow-x: hidden;
Background:white;
Display:none;
}

p{
    font-size:15px;

}
.pic{
width:300px;
}

</style>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
   <?php include("header.php");?>
        <!-- header-end -->
             <!-- bradcam_area  -->
             
                <!--/ bradcam_area  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
        <?php
        $from=$_SESSION["from"];
         while($p=mysqli_fetch_array($res)){
            $check="select * from bookings where photographer_id={$p["id"]} AND pfrom='$from'";
            $resc=mysqli_query($conn,$check);
            $c=mysqli_fetch_array($resc);

if(!is_array($c)){
            $query1="select * from camera where p_id={$p["id"]}";
            $res1=mysqli_query($photographer->connection,$query1);
            
?>

            <div class="row " style="margin-top:5%;">

                <div class="col-lg-4">
                            <div class="blog_item_img pic">
                            <?php if($p["dp_pic"]!=""){
                                ?>
                                <img class="card-img rounded-0" src="profiles/img/photographer/<?php echo $p["dp_pic"]; ?>" alt="">
                                <?php } else {?>
                                    <img class="card-img rounded-0" src="profiles/img/photographer/profile.png" alt="">

                             <?php    }?>
                                <a href="#" class="blog_item_date">
                                    <h4 style="color:white;"><?php echo $p["type"]; ?></h4>
                                </a>
                            </div>
</div>                <div class="col-lg-5 ">

                            <div class="blog_details list">
                                <a class="d-inline-block" href="photographerprofile.php?id=<?php echo $p["id"];?>">
                                    <b><?php echo $p["fullname"];?> </b>
                                </a>
                                
<div style="float:right;"><?php
 for($i=0;$i<5;$i++){
    if($i<$p["rating"])
echo"<span class='fa fa-star checked'></span>";
else
echo"<span class='fa fa-star '></span>";
    }?>
    </div>
                  <br>              <h7><?php echo $p["location"]; ?> </h7><br>
                                <p><i class='fa fa-camera-retro'></i>
                                <?php while($t=mysqli_fetch_array($res1)){
                                  echo "{$t['name']},";
                             }?> </p>
<h5>  <?php echo "Rs". $p["price"] ." Onwards";?> </h5>

                            </div></div>
             
                    </div>                            <?php }
                }?> 

                </div>
                
    </section><script>

</script>
    <!--================Blog Area =================-->

    <!-- footer start -->
    <?php include"footer.php";?>
        <!--/ footer end  -->


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    
</body>
</html>