<?php
Include"class.php";

Include"conn.php";
$id=$_GET["id"];
$_SESSION["hotel_id"]=$id;

$sql="select * from hotel where id= '$id'";
$r1=mysqli_query($hotel->connection,$sql);
$p=mysqli_fetch_array($r1);

$sq="select * from hotel_fac where id= '$id'";
$r2=mysqli_query($hotel->connection,$sq);
$q=mysqli_fetch_array($r2);
if(isset($_POST["search_photo"] )){
    $state=$_POST["state"];
    $_SESSION["from"]=$_POST["from"];
    header("location:photographerlist.php?state=$state");
    }

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HoneymoonIQ</title>
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
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
<style>
video{
Width:350px;
}
Iframe{
Width:350px;
Height:190px;
}
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

.icon{
Color:#fcba03;
font-Size:20px;

}
.fac_list{
Margin-bottom:25px;
}

#book_photo{
  height:0%;
  width: 45%;
  position: fixed;
  left : 20%;
  top:-10%;
  overflow-x: hidden;
  transition: 0.5s;
padding:10px;
z-index:9;
}
@media screen and (max-width:736px) {
  #book_photo {width:90%;
    left:5%;
    }
.text-block {
    background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4);
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  left: 10%;
  z-index: 2;
  width: 60%;
  padding: 20px;
  text-align: center;
}

}
.ui-datepicker {
background: white;;
border: 1px solid #555;
color: red;
}
.hasDatepicker {
    position: relative;
    z-index: 9999;}
#photo_form{
  padding:10px;
}
#modal {
    display:none;
  position: fixed; 
  z-index: 9; 
  left: 0;
  top: 0;
  transition: 0.5s;
  width: 100%;
  height: 100%; 
  overflow: hidden; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.6); 
}
.text-block {
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4);
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  left: 20%;
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
input{
    width:100%;
}
label{
    color:white;
}
</style>
</head>

<body>
    <!--[if lte IE 9]>
      transform: translate(-50%, -110%);

            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
   <?php include ("header.php");?>
    <!-- header-end -->
    <div id="modal"></div>
    <div id="book_photo">
<!--    <div id="book_bg"></div>-->

    <div class="row">
    
      <div class="text-block">
      <button onClick='remove()'style="float:right;"><i class="fa fa-close" ></i></button>

       <h2 style="color:white;">Find Photographer</h2>


      <form action="hotelprofile.php?id=<?php echo $id; ?> " method="post"  id="photo_form" >
<div class="row">
          <div class="col-12">
                              <label for="#" >From</label>
                             <input type="text"  id="datepick" name="from"  required>
                          </div>
                          


                          <div class="col-xl-12">
                            <label for="#">Destination</label>
                              <select class="form-control" name="state"required>
                              <?php  $photographer=new Photographer();
                                                                  $qp = "SELECT state FROM Photographer GROUP BY state";
                                                                  $rep=mysqli_query($hotel->connection,$qp);
                                                                 while( $stp = mysqli_fetch_array($rep)){
                                                                  $sttp=array_unique($stp);
                                                                 foreach ($sttp as $value){ ?>
                                                                   <option value="<?php echo $value ;?>" ><?php echo $value ;?></option>
                                                                   <?php
                                                                 }
                                                                }
                                                                  
?>

                              </select>
                          </div>
                         
                     
                      
                          <div class="col-xl-12" style=" margin-top:10px;">
                            <input type="submit"  value="Search" class="btn btn btn-md text-white" style="background:rgb(249,25,66,0.6); border:#FD8E5E;" name="search_photo">

                           <a href="booking_details.php" style="padding:10px;text-decoration:underline;color:red;">Skip</a>
                              </div></div></form></div>

              </div>     
 
                   </div>  
         <!-- bradcam_area  -->
        <div class="property_details_banner">
                <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-md-8 col-lg-6">
                                <div class="comfortable_apartment">
                                    <h4><?php echo $p["name"];?></h4>
                                    <p> <img src="img/svg_icon/location.svg" alt=""> <?php echo $p['address'];?></p>
                                    <div class="row quality_quantity d-flex">
                                        
<?php if ($q['breakfast']!="Null"){?>
                                        <div class="col-3 single_quantity">
<i class="fa fa-coffee icon "></i>


                                            <span>Complementary Breakfast</span>
                                        </div>
<?php } ?>

<?php if ($q['dinner']!="Null"){?>

                                        <div class="col-3 single_quantity">

<i class="fas fa-utensils icon"></i>

                                            <span>One complementary Dinner</span>
                                        </div>
<?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4 col-lg-6">
                                <div class="prise_quantity">
                                <?php $roo="select * from rooms where hotel_id='$id' ";
$room=mysqli_query($hotel->connection,$roo);
while($rooms=mysqli_fetch_array($room)){?>

                    <h5 style="color:white;margin-top:10px;"><?php echo $rooms["room_type"]; ?> Room:Rs<?php echo $rooms['price']; ?></h5><br>

                                    <?php }?>
                                    <button class="book_now" style="background:transparent;" onClick='show()'>Book Now</button>

                                </div>
                            </div>
                        </div>
                    </div>
        </div>
            <!--/ bradcam_area  -->

    <!-- details  -->
    <div class="property_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="property_banner">
 <div class="property_banner_active owl-carousel">
                            <div class="single_property">
                                <img src="profiles/img/hotelimages/<?php echo $p["img1"];?>" alt="" style="height:400px;">
                            </div>
                            <div class="single_property">
                                <img src="profiles/img/hotelimages/<?php echo $p['img2'];?>" alt="" style="height:400px;">
                            </div>
                            <div class="single_property">
                                <img src="profiles/img/hotelimages/<?php echo $p['img3'];?>" alt="" style="height:400px;">
                            </div>
 <div class="single_property">
                                <img src="profiles/img/hotelimages/<?php echo $p['img4'];?>" alt="" style="height:400px;">
                            </div>
                            <div class="single_property">
                                <img src="profiles/img/hotelimages/<?php echo $p['img5'];?>" alt="" style="height:400px;">
                            </div>


                       </div>

</div>

  </div>   
<div class="col-xl-4" style="overflow:hidden;">
<video  controls>
  <source src="profiles/img/videos/<?php echo $p['video'];?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.771137187886!2d77.22687901501672!3d28.66657058240437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd06212b4c29%3A0xc9d99da2f09b9325!2sKashmiri%20Gate!5e0!3m2!1sen!2sin!4v1613567155886!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
<div class="container">
<h3>Facilities</h3>
             <div class="row">
<?php if($q["wifi"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fa fa-wifi icon "></i>

                                            <span>Wifi</span>
                                        </div>
<?php }if($q["breakfast"]!="Null"){?>


                                        <div class="col-xl-4 fac_list">
<i class="fa fa-coffee icon "></i>

                                            <span>Complementary Breakfast</span>
                                        </div>
<?php }if($q["dinner"]!="Null"){?>

<div class="col-xl-4">
<i class="fa fa-utensils icon "></i>
 <span>one Complementary Dinner</span>
                                        </div>
<?php }if($q["room_service"]!="Null"){?>
                                        <div class="col-xl-4 fac_list">
<i class="fas fa-concierge-bell icon"></i>


                                            <span>Room Service</span>
                                        </div>
<?php }if($q["airport_transfer"]!="Null"){?>
                                        <div class="col-xl-4 fac_list">
<i class="fas fa-car icon"></i>
<span>Airport Pick Up and Drop</span>
                                        </div>
<?php }if($q["tv"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-tv icon"></i>

 <span>T.V</span>
                                        </div>
<?php }if($q["kids_play"]!="Null"){?>


                                        <div class="col-xl-4 fac_list">
<i class="fas fa-child icon"></i>
<span>Kids Play</span>
                                        </div>
<?php }if($q["bar"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-beer icon"></i>
<span>Bar</span>
                                        </div>
<?php }if($q["gym"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-dumbbell icon"></i>


                                            <span>GYM</span>
                                        </div>
<?php }if($q["swimming_pool"]!="Null"){?>


                                        <div class="col-xl-4 fac_list">
<i class="fas fa-swimming-pool icon"></i>

 <span>Swimming Pool</span>
                                        </div>
<?php }if($q["restaurant"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-pizza-slice icon"></i>
<span>Restaurent</span>
                                        </div>
<?php }if($q["cctv"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fa fa-video icon "></i>

                                            <span>CCTV</span>
                                        </div>

<?php }if($q["parking"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-parking icon"></i>

 <span>Parking</span>
                                        </div>
<?php }if($q["library"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-book-reader icon"></i>
<span>Library</span>
                                        </div>
<?php }if($q["lawn"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fa fa-seedling icon "></i>

                                            <span>Lawn</span>
                                        </div>

<?php }if($q["fire"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-fire-extinguisher icon"></i>


 <span>Fire Safety</span>
                                        </div>
<?php }if($q["ac"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fas fa-wind icon"></i>
<span>Air Conditioned </span>
                                        </div>
<?php }if($q["emergency"]!="Null"){?>

                                        <div class="col-xl-4 fac_list">
<i class="fa fa-first-aid icon "></i>

                                            <span>First Aid</span>
                                        </div>
<?php }?>


</div>

        
                                        

                    <div class="details_info">
                        <h4>Description</h4>
                       <p><?php echo $p["about"];?></p>
                      
   

                    </div>
         
                
                </div>
            </div>
        </div>
    </div>

    <script>
         $(function() {
            $( "#datepick" ).datepicker({minDate: 0});
         });
      </script>
    <!-- /details  -->

    <!-- contact_action_area  -->
        <!-- /contact_action_area  -->


    <!-- footer start -->
    
                            <?php include"footer.php";?>
                           
    <!--/ footer end  -->
    <script>
        
      
  n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("from").value =  d + "/" + m + "/" + y;

function show(){
    document.getElementById("modal").style.display = "block";

document.getElementById("book_photo").style.height = "50%";
document.getElementById("book_photo").style.top = "20%";

}
function remove(){
    document.getElementById("modal").style.display = "none";

document.getElementById("book_photo").style.height = "0%";
document.getElementById("book_photo").style.top = "-10%";

}</script>
    <!-- link that opens popup -->
    <!-- JS here -->


    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <!--  <script src="js/vendor/jquery-1.12.4.min.js"></script>-->
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
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/slick.min.js"></script>
   


    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>


    <script src="js/main.js"></script>

</body>

</html>