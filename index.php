<?php 
Include"class.php";
$_SESSION["phone"]="9354500474";
$_SESSION["user"]="user";

$message="";
if(isset($_POST["search_hotel"] )){
$state=$_POST["state"];
$_SESSION["checkin"]=$_POST["checkin"];
$_SESSION["checkout"]=$_POST["checkout"];
header("location:search.php?state=$state");
}
if(isset($_POST["search_photo"] )){
$state=$_POST["state"];
$_SESSION["from"]=$_POST["from"];
header("location:photographerlist.php?state=$state");
}
if(isset($_SESSION["hotel_id"])){
  unset($_SESSION["hotel_id"]);
}
if(isset($_SESSION["photo_id"])){
  unset($_SESSION["photo_id"]);
}
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
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
<style>
.more-services {
  margin-top: -100px;
Margin-bottom:60px;
}

.more-services .card {
  border: 0;
  padding: 160px 20px 20px 20px;
  position: relative;
  width: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

.more-services .card-body {
  z-index: 4;
  background: rgba(255, 255, 255, 0.9);
  padding: 15px 30px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  transition: 0.3s;
  transition: ease-in-out 0.4s;
  border-radius: 5px;
}

.more-services .card-title {
  font-weight: 700;
  text-align: center;
  margin-bottom: 15px;
}



.more-services .card-text {
  color: #5e5e5e;
}


.more-services .read-more a:hover {
  text-decoration: underline;
}

.more-services .card:hover .card-body {
  background: rgb(249, 25, 66,0.85);
}
input {
  background: transparent;
  color: #C7C7C7;
  font-size: 15px;
  font-weight: 400;
  border: 1px solid rgba(255, 255, 255, 0.4);
  height: 45px;
  line-height: 45px;
}
.pro_option{
Width:180px;
Top:120px;
  position: fixed;
  z-index: 2;
  overflow-x: hidden;
Background:white;
Display:none;
border:1px solid #eee;
text-align:center;
}
.pro_option h5{
  cursor:pointer;
}
.mailto-message {
	bottom:2px;
	left: 50%;
	margin-bottom: -5px;
	transform: translate(-50%, -100%);
	position: absolute;
	display: none;
	width: auto;
	white-space: nowrap;
	font-size: 12px;
	background-color: black;
	color: white;
	padding: 2px 6px;
	border-radius: 2px;
	&:after,
	&:before {
		content: '';
	}
	&:before {
		top: 100%;
		left: 50%;
		border: solid transparent;
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(0, 0, 0, 0);
		border-top-color: #000000;
		border-width: 4px;
		margin-left: -4px;
	}
}
.mailto-link:hover .mailto-message,
.mailto-link:focus .mailto-message,
.mailto-link:focus-within .mailto-message {
	display: block;
}


.item::before {
  background: #001D38;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  content: '';
  opacity: .6;
}
.content{
Margin-top:-250px;
}
#message{
Opacity:0.6;
Margin-top:50px;
Margin-left:30px;
}

.ui-datepicker {
 background: white;;
 border: 1px solid #555;
color: red;
}
option{
  z-index:10;
}
.team {
  background: #fff;
}
.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: rgb(249,25,66,0.85);
  bottom: 0;
  left: 0;
}

.team .member {
  position: relative;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
  border-radius: 10px;
  text-align: center;
}


.team .member span {
  display: block;
  font-size: 15px;
  padding-bottom: 10px;
  position: relative;
  font-weight: 500;
}

.team .member span::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 1px;
  background: #b5b3ba;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.team .member p {
  margin: 10px 0 0 0;
  font-size: 14px;
}

select {
  background: transparent;
  color: #C7C7C7;
  font-size: 15px;
  font-weight: 400;
  border: 1px solid rgba(255, 255, 255, 0.4);
  height: 45px;
  line-height: 45px;
}
.abc{
  width:360px;
}
@media (max-width: 500px) {
  .property_form{
  margin-top:-260px;}
  .abc{
  width:250px;
  margin-bottom:20px;
}
}
.item{
  width:100%;
  height:750px
}
@media (max-width: 500px) {
  .item{
  width:300px;}
}
#photo_form{
  margin-left:10%;
}
#sticky-header{
  background:#fff;
  color:black;
}
.Appointment:hover .pro_option{
  display:block;

}
</style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <?php include "header.php" ?>

    <!-- slider_area_start -->
    <div class="slider_area" style="margin-top:5%;">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" >
      <div class="item active" style="background:#001D38;background:url(img/img2.jpg);background-repeat:no-repeat;background-size:100% 100%;width:100%;height:750px;">
                        <div class="row align-items-center">
                            <div class="col-xl-10 offset-xl-1">

                                <div class="slider_text text-center justify-content-center" style="margin-top:20%;">

<h3></h3>
                                    <p></p></div></div></div>

      </div>

      <div class="item" style="background:url(img/img3.jpg);width:100%;height:750px;background-repeat:no-repeat;background-size:cover;">
      </div>
    
      <div class="item" style="background:url(img/img4.jpg);width:100%;height:750px;background-repeat:no-repeat;background-size:cover;">
     </div>
    </div>

  </div>
<div class="container content">
                        <div class="row align-items-center" >
                            <div class="col-xl-10 offset-xl-1">
                               <div class="property_form">
                                    <form action="index.php" method="post" id="hotel_form" >
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form_wrap d-flex"  >
                                                        <div class="single-field max_width ">
                                                                <label for="#" >Check In</label>
                                                               <input type="text"  id="my_date_picker" name="checkin" style="width:250px;" required>
                                                            </div>
<div class="single-field max_width ">
                                                                <label for="#" style="margin-left:50px;">Check Out</label>
                                                               <input type="text"  id="my_date_picker1" name="checkout" style="width:250px;"  required>
                                                            </div>


                                                        <div class="single-field max_width ">
                                                                <label for="#">Destination</label>
                                                                <select class="wide" name="state" style="width:250px;" required>
                                                                  <?php  $hotel=new Hotel();
                                                                  $q = "SELECT state FROM hotel GROUP BY state";
                                                                  $re=mysqli_query($hotel->connection,$q);
                                                                 while( $st = mysqli_fetch_array($re)){
                                                                  $stt=array_unique($st);
                                                                 foreach ($stt as $value){
                                                                   echo"<option value='{$value}'>{$value}</option>";
                                                                 }
                                                                }
                                                                  
?>
                                                                </select>
                                                            </div>
                                                           
                                                       
                                                        
                                                            <div class="serach_icon">
                                                                  <button style="background:rgb(249, 25, 66,0.85); border:rgb(249, 25, 66,0.85);margin-top:30px;" name="search_hotel">   <i class="ti-search"></i>
                                             </button>
                                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
<form action="index.php" method="post" style="display:none;" id="photo_form">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form_wrap d-flex">
                                                  
                                                        <div class="single-field max_width">
                                                                <label for="#" >From</label>
                                                              
                                                                <input type="text" class="abc" id="my_date_picker2" name="from" style="width:260px;"required>
                                                            </div>



                                                        <div class="single-field max_width">
                                                                <label for="#">Destination</label>
                                                                <select class="wide abc" name="state"required>
                                                                <?php  $photographer=new Photographer();
                                                                  $qp = "SELECT state FROM Photographer where isVerified =1 GROUP BY state";
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
                                                           
                                                       
                                                        
                                                            <div class="serach_icon">
                                                                  <button style="background:rgb(249, 25, 66,0.85); border:rgb(249, 25, 66,0.85);margin-top:30px;" name="search_photo">   <i class="ti-search"></i>
                                             </button>
                                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

<div class="row " style="color:white;margin-left:20%;margin-top:10px;"><div class="col-md-2">
<p style="color:red;margin-top:-5px;">Search For </p></div>
<div class="col-md-3"> <h5 style="color:white;" id="p">Photographers</h5></div><div class="col-md-2"><h5 style="color:white;" id="h">Hotel</h5>
</div></div>

                                </div>

                            </div>
                        </div>
                    </div>


   </div>
    <!-- slider_area_end -->
   
    <!-- popular_property  -->
        <!-- /popular_property  -->
<div class="team_area">

            <div class="container">
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="section-title">
                                    <h2>
                                            What We Offer
                                    </h2>
                                </div>
    <div class=" mb-60 text-center" >
                                    <p style="font-size:17px;">
We at honeymooniq understand that honeymoon is once a lifetime 
experience , so we want to make it memorable for you, memories are priceless and when caught on camera they will be with you for ever, we work with only best photographers, to make your pictures special, beside this we give album as a gift from our side. You will also get three months complementary Eazydiner membership , which will help in experiencing five star fine dining experience at good price.                                     </p>
                                </div>                            </div>
                        </div></div></div>
    <!-- Features  -->


    <section id="more-services" class="more-services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card" style='background-image:url("img/a.jpeg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title">Personalized Service</h5>
                <p>Economical and customised packages as per the requirements with no hidden charges and 24x7 personalised services from our relationship manager</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style='background-image:url("img/b.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title">Hotel stay</h5>
                <p>Stay at Luxurious Hotels with world-class amenities with Free Airport Transfers</p>
              </div>
            </div>

          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image:url("img/c.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"> Eazy Diner Prime Membership</h5>
                <p>Complimentary exclusive Prime Membership for Honeymoon IQ consumers and guaranteed 25-50% off at 2000 best restaurants</p>

              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("img/d.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title">Photographer</h5>
                <p>Professional Photographers across the country can be booked conveniently before checking in to the destination with complimentary photo album</p>

              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End More Services Section -->

    <div class="contact_action_area" id="photograph">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="action_heading">
                        <h3>Book Your Photographer</h3>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="call_add_action">
                    <span  >Select Your State</span>
                    <select class="" name="state" onchange='search()' id="sea" style="background:white;color:black;" required>
                                                                <?php  
                                                                  $qp = "SELECT state FROM photographer Where isVerified='1' GROUP BY state ";
                                                                  $rep=mysqli_query($photographer->connection,$qp);
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
                </div>
            </div>
        </div>
    </div>
    <!-- /contact_action_area  -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team" style="padding:10px;margin:20px;">
      <div class="container">

        <div class="row">
            <div class="section-title" >
              <h2>TESTIMONIALS</h2>
            </div>
          <div class="col-lg-12">
            <div class="row">

              <div class="col-lg-6">
                <div class="member"  >
                  <div class="member-info">
                  <p>
We planned an amazing one week honeymoon in Kerala. We booked our honeymoon through honeymooniq.in and were impressed by their services. They were so helpful in planning out our honeymoon and guiding us through hotels. To be honest, we got what was promised to us at the initial stage. Apart from that, they also gifted us a beautiful album. We were also able to save up to 6000 rupees by easy diner membership. 
</p>
                    <span>Sonam and Ankush</span>
                   
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" >
                  <div class="member-info">
                  <p>We choose honeymooniq.in, because-they offered a photo-shoot. My husband and I were thrilled by the concept of a post-wedding shoot. It was new, and we were excited. The sole reason we choose honeymooniq.in was they provided a photo-shoot and photo album. Our photo-shoot theme was underwater photography, and we loved how beautifully the photographer captured moments. Looking at the photo book they gifted, we feel happy as the money was worth it. 
</p>
                    <span>Priya and Akash 
</span>
                   
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" >
                  <div class="member-info">
                  <p>Honeymooniq.in is the best website so far as they treat us not like customers but friends. I would definitely recommend anyone who wants to plan their honeymoon. The team was so helpful and guided us throughout our honeymoon within our budget.
                      The photographers were cooperative as they made us comfortable in front of the camera. The album they gifted us was the cherry on the top.  Definitely, the best experience we had and would cherish for lifetime. </p>
                    <span>Daisy and Sameer</span>
                 
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member">
                  <div class="member-info">
                  <p>We wanted our honeymoon to be extraordinary and the least expensive. There were so many websites and packages out there, and we were confused. But finally, we choose honeymooniq.in because of two things Eazy Diner membership and Photo Album. I am a photo fanatic, and my husband is the opposite. But in the end, it was worth it because we had the best experience of our lives on a budget and a photo album to cherish for a lifetime. 
</p>

                    <span>Shreya and Rohan </span>
                    
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- footer start -->
   <?php include "footer.php"?>
    <!--/ footer end  -->
    <script> $(document).ready(function(){
  $("#p").click(function(){
    $("#hotel_form").hide();
    $("#photo_form").show();
  });
});
$(document).ready(function(){
  $("#h").click(function(){
    $("#photo_form").hide();
    $("#hotel_form").show();
  });
});
function search(){
  var x = document.getElementById("sea").value;
  window.location.replace("photographerlist.php?state="+x);

}
</script>
    <!-- link that opens popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   <!--- <script src="js/vendor/jquery-1.12.4.min.js"></script>-->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
     <script src="js/gijgo.min.js"></script> 
    <script src="js/slick.min.js"></script>
   

    
    <script src="js/jquery.ajaxchimp.min.js"></script>

    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>


<script>
 /*$(function() {
          var pickerOpts1 = {
        dateFormat: "dd-M-yy"

    };
    var pickerOpts2 = {
        dateFormat: "dd-M-yy",
        minDate: new Date()
    };
    $( "#my_date_picker1" ).datepicker(pickerOpts2); 
                $( "#my_date_picker").datepicker({minDate: 0}); 
                $( "#my_date_picker2").datepicker(pickerOpts1); 


            });*/
            $(function() {
          var pickerOpts1 = {

        dateFormat: "dd-M-yy",
        minDate: new Date(),
    };
   
            $( "#my_date_picker2" ).datepicker(pickerOpts1);
            $("#my_date_picker").datepicker(pickerOpts1); 
         //  $("#checkout").datepicker(pickerOpts1); 


         });
         $("#my_date_picker1").datepicker({

          dateFormat: "dd-M-yy",
          minDate: new Date($('#my_date_picker').val()),
    onSelect: function(date){            
        var date1 = $('#my_date_picker').datepicker('getDate');           
        var date = new Date( Date.parse( date1 ) ); 
        date.setDate( date.getDate() + 1 );        
        var newDate = date.toDateString(); 
        newDate = new Date( Date.parse( newDate ) );                      
        $('#my_date_picker1').datepicker("option","minDate",newDate);            
    }
});

n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("my_date_picker").value =  d + "-" + m + "-" + y;



var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("item");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
  

  </script>
    <script>
        function collision($div1, $div2) {
            var x1 = $div1.offset().left;
            var w1 = 40;
            var r1 = x1 + w1;
            var x2 = $div2.offset().left;
            var w2 = 40;
            var r2 = x2 + w2;

            if (r1 < x2 || x1 > r2)
                return false;
            return true;
        }
        // Fetch Url value 
        var getQueryString = function (parameter) {
            var href = window.location.href;
            var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        // End url 
        // // slider call
        $('#slider').slider({
            range: true,
            min: 20,
            max: 200,
            step: 1,
            values: [getQueryString('minval') ? getQueryString('minval') : 20, getQueryString('maxval') ?
                getQueryString('maxval') :200
            ],

            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html( ui.values[0] + 'K');
                $('.ui-slider-handle:eq(1) .price-range-max').html( ui.values[1] + 'K');
                $('.price-range-both').html('<i>K' + ui.values[0] + ' - </i>K' + ui.values[1]);

                // get values of min and max
                $("#minval").val(ui.values[0]);
                $("#maxval").val(ui.values[1]);

                if (ui.values[0] == ui.values[1]) {
                    $('.price-range-both i').css('display', 'none');
                } else {
                    $('.price-range-both i').css('display', 'inline');
                }

                if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                    $('.price-range-min, .price-range-max').css('opacity', '0');
                    $('.price-range-both').css('display', 'block');
                } else {
                    $('.price-range-min, .price-range-max').css('opacity', '1');
                    $('.price-range-both').css('display', 'none');
                }

            }
        });

        $('.ui-slider-range').append('<span class="price-range-both value"><i>' + $('#slider').slider('values', 0) +
            ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + $('#slider').slider('values', 0) +
            'k</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">' + $('#slider').slider('values', 1) +
            'k</span>');
    </script>
</body>

</html>