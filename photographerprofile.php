<?php
Include"class.php";
Include"conn.php";
$ide=$_GET["id"];


$photographer=new Photographer();
$query="select * from photographer where id='$ide'";
$res=mysqli_query($photographer->connection,$query);

$p=mysqli_fetch_array($res);
if(isset($_POST["book"])){
  $_SESSION["photo_id"]=$_GET["id"];
  $_SESSION["photo_name"]=$p["fullname"];
 header("location:booking_details.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148326600-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148326600-1');
</script>

    <title>HoneymoonIQ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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

    
    <link rel="stylesheet" href="css/owl.carousel.min.css">


    
  </head>
  <style>
    .checked{
    color:yellow;
    }
    .owl-carousel {
  position: relative; }
  .owl-carousel .owl-item {
    opacity: .4; }
    .owl-carousel .owl-item.active {
      opacity: 1; }
 
    .owl-carousel .owl-nav .owl-prev,
    .owl-carousel .owl-nav .owl-next {
      position: absolute;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      margin-top: -10px;
      -webkit-transition: 0.7s;
      -o-transition: 0.7s;
      transition: 0.7s;
      opacity: 0; }
      @media screen and (prefers-reduced-motion: reduce) {
        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next {
          -webkit-transition: none;
          -o-transition: none;
          transition: none; } }
     
  .owl-carousel .owl-dots {
    position: relative;
    text-align: center;
    margin-top: 30px; }
    .owl-carousel .owl-dots .owl-dot {
      display: inline-block;
      zoom: 1; }
      .owl-carousel .owl-dots .owl-dot span {
        width: 10px;
        height: 10px;
        background: #adb8cc;
        border-radius: 50%;
        display: inline-block;
        margin: 5px 7px; }
      .owl-carousel .owl-dots .owl-dot.active span {
        background: #53d397; }
  
  .owl-carousel.home-slider {
    display: block;
    z-index: 0; }
    .owl-carousel.home-slider .slider-item {
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      height: 500px;
      min-height: 500px;
      position: relative;
      display: block; }
      .owl-carousel.home-slider .slider-item .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        content: '';
        background: #1b212c;
        opacity: .8;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s; }
        @media screen and (prefers-reduced-motion: reduce) {
          .owl-carousel.home-slider .slider-item .overlay {
            -webkit-transition: none;
            -o-transition: none;
            transition: none; } }
      .owl-carousel.home-slider .slider-item:hover .overlay {
        opacity: .3; }
     
       
        
    .owl-carousel.home-slider .owl-nav .owl-prev span,
    .owl-carousel.home-slider .owl-nav .owl-next span {
      color: #fff; }
    .owl-carousel.home-slider:hover .owl-nav .owl-prev,
    .owl-carousel.home-slider:hover .owl-nav .owl-next {
      opacity: 1; }
    .owl-carousel.home-slider:hover .owl-nav .owl-prev {
      left: 20px; }
    .owl-carousel.home-slider:hover .owl-nav .owl-next {
      right: 20px; }
    .owl-carousel.home-slider .owl-dots {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 100px;
      width: 100%;
      text-align: center; }
      .owl-carousel.home-slider .owl-dots .owl-dot {
        width: 18px;
        height: 18px;
        margin: 5px;
        border-radius: 50%;
        background: white;
        background: none;
        border: 2px solid rgba(255, 255, 255, 0.5);
        outline: none !important;
        position: relative;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
        display: inline-block; }
        .owl-carousel.home-slider .owl-dots .owl-dot span {
          position: absolute;
          width: 12px;
          height: 12px;
          background: rgba(255, 255, 255, 0.5);
          border-radius: 50% !important;
          left: 0%;
          top: 2px;
          display: block;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%); }
        .owl-carousel.home-slider .owl-dots .owl-dot.active {
          border: 2px solid white; }
          .owl-carousel.home-slider .owl-dots .owl-dot.active span {
            background: white; }

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
    </style>
  </style>
  <body>

    <!-- <div class="KW_progressContainer">
      <div class="KW_progressBar">

      </div>
    </div> -->
    
<?php include "header.php"?>
<div style="margin-top:70px;">
      <section class="home-slider owl-carousel" >
      <?php 
            $query2="select * from photos where p_id={$p["id"]}";
            $res2=mysqli_query($photographer->connection,$query2);
            while($re=mysqli_fetch_array($res2)){
?>

        <a  class="slider-item" style="background-image: url(profiles/img/<?php echo $re["filename"]; ?>);height:300px;">
          <div class="overlay"></div>
          <div class="container" >
            <div class="row slider-text align-items-end justify-content-center">
              <div class="col-md-12 ftco-animate p-4" data-scrollax=" properties: { translateY: '70%' }">
              </div>
            </div>
          </div>
        </a>
        <?php }?>

       
      </section>
      <!-- END slider -->
      <section class="blog_area section-padding">
        <div class="container">
        <?php 
            $query1="select * from camera where p_id={$p["id"]}";
            $res1=mysqli_query($photographer->connection,$query1);
            
?>

            <div class="row">

                <div class="col-lg-4">
                            <div class="blog_item_img">
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

                            <div class="">
                                <a class="d-inline-block" href="">
                                    <h2><?php 
                                    echo $p["fullname"];?> </h2>
                                </a>
                                
<div style="float:right;"><?php
 for($i=0;$i<5;$i++){
    if($i<$p["rating"])
echo"<span class='fa fa-star checked'></span>";
else
echo"<span class='fa fa-star '></span>";
    }?>
    </div>
                                <p><?php echo $p["location"]; ?> ,<?php echo $p["state"]; ?> </p>
                                <p><i class='fa fa-camera-retro'></i>
                                <?php while($t=mysqli_fetch_array($res1)){
                                  echo "{$t['name']},";
                             }?> </p>
<h5>  <?php echo "Rs". $p["price"] ." Onwards";?> </h5>
<form action="photographerprofile.php?id=<?php echo $_GET["id"];?>" method="post">
          <button style="float:right;border:1px solid rgb(249,25,66,0.85);padding:10px; background:white;margin:-top:5%" name="book">Book Now</button>
</form>

                            </div></div>
             
                    </div>                         

                </div>
                
    </section></div>
    <div class="container section-top-border">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<h3 class="mb-30">Add Review</h3>
            <form action="#">
							<div class="mt-10">
								<input type="text" name="name" placeholder=" Name"
									onfocus="this.placeholder = ''" onblur="this.placeholder = ' Name'" required
									class="single-input">
							</div>							<div class="mt-10">
								<textarea class="single-textarea" placeholder="Comment" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Comment'" required></textarea>
							</div>
              <button type="submit" style="background:red;float:right;margin-top:10px;border:1px solid red;padding:10px;">Post</button>

</form>
		<!---		<div class="row">
					<div class="col-md-8">
						<div class="single-defination">
							<h4 class="mb-20">Name</h4>
							<p>Good Experience</p>
              <span class='fa fa-star checked'></span>              <span class='fa fa-star checked'></span>
              <span class='fa fa-star checked'></span>
              <span class='fa fa-star checked'></span>
              <span class='fa fa-star checked'></span>

						</div></div>
					</div>-->

            </div>
                            </div>
                            </div>
<?php include"footer.php"?>
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main2.js"></script>
    
  </body>
</html>