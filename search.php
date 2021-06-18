<?php
Include"class.php";
Include"conn.php";
if(isset($_POST["search_hotel"] )){
    $state=$_POST["state"];
    $_SESSION["checkin"]=$_POST["checkin"];
    $_SESSION["checkout"]=$_POST["checkout"];
    header("location:search.php?state=$state");
    }
$state=$_GET["state"];
$hotel=new Hotel();
$query="select * from hotel_fac  
 INNER JOIN hotel
ON hotel.id = hotel_fac.id where hotel.state='$state';
";
$res=mysqli_query($hotel->connection,$query);

if(isset($_POST["rs"])){
    $query="select * from hotel_fac  
    INNER JOIN hotel
   ON hotel.id = hotel_fac.id where hotel.state='$state' AND hotel_fac.breakfast='Complimentry Breakfast';
   ";   $res=mysqli_query($hotel->connection,$query);

}

if(isset($_POST["cd"])){
    $query="select * from hotel_fac  
    INNER JOIN hotel
   ON hotel.id = hotel_fac.id where hotel.state='$state' AND hotel_fac.dinner='one complimentry Dinner';
   ";
$res=mysqli_query($hotel->connection,$query);

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
    <title>Hotels List</title>
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
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<style>
.checked {
  color: orange;
}
.hotel_img{
Width:100px;
Height:300px;
Margin-top:5%;
}

.filter{
Box-shadow:1px 1px 1px 1px grey;
Padding:20px;
}
.listing{
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
Margin-bottom:50px;
}
.containerl{margin:3%;margin-top:-5%;padding:40px;}

.single-gallery-image {
  margin-top: 40px;
  background-repeat: no-repeat !important;
  background-position: center center !important;
  background-size: cover !important;
}
.gallery_area .single-gallery {
  overflow: hidden;
  position: relative;
}
.side{
Height:95px;
}
.list li{
    font-size:15px;
    display:inline;
    margin:20px;
    margin-top:20px;
  color:gray;
}
svg{
    width:30px;
}
.blur{
    animation-iteration-count: infinite;
    animation-name: example;
  animation-duration: 0.3s;
}
@keyframes example {
  0% {color: red;}
  100% {color: green;}
}
.big{
    width:100%;
    height:250px;
margin-left:-3%;
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
select {
  background: transparent;
  color: #C7C7C7;
  font-size: 15px;
  font-weight: 400;
  border: 1px solid rgba(255, 255, 255, 0.4);
  height: 45px;
  line-height: 45px;
}
.ui-datepicker {
 background: white;;
 border: 1px solid #555;
color: red;
}
.ui-datepicker-calendar a {
  color: black !important;
  background: white;
box-shadow:none;
  border-color: black;
}</style>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
   <?php include "header.php"?>

            <!--/ bradcam_area  -->
            <div class="slider_area">
            <div class="single_slider single_slider2  d-flex align-items-center property_bg overlay2" >
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="property_wrap" style="top:100px;">
                                        <div class="slider_text text-center justify-content-center">
                                                <h3>Search Results</h3>
                                            </div>
                                            <div class="property_form" >
                                                <form action="search.php" method="post">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="form_wrap d-flex">
                                                                    <div class="single-field max_width ">
                                                                            <label for="#">Check In</label>
                                                                            <input type="text"  id="my_date_picker" name="checkin" style="width:250px;" required>

                                                                        </div>
                                                                  
                                                                    <div class="single-field min_width ">
                                                                            <label for="#">Check Out</label>
                                                                            <input type="text"  id="my_date_picker1" name="checkout" style="width:250px;"  required>

                                                                        </div>
                                                                    <div class="single-field min_width ">
                                                                            <label for="#">Destination</label>
                                                                            <select class="wide" name="state" style="width:250px;" required>
                                                                  <?php  
                                                                  $q = "SELECT state FROM hotel GROUP BY state";
                                                                  $re=mysqli_query($hotel->connection,$q);
                                                                 while($st = mysqli_fetch_array($re)){
                                                                  $st=array_unique($st);
                                                                 foreach ($st as $value){
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
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <section>
			<div class="containerl">
				<div class="row">
					<div class="col-lg-9">

    <div class="about_mission">
<?php
while($p=mysqli_fetch_array($res)){
$c=$p["id"];
$qp="select * from hotel_photos where h_id='$c'";
$rp=mysqli_query($conn,$qp);
$tp=mysqli_fetch_array($rp);
?><div class="option" >
            <div class="row align-items-center listing" >

                <div class="col-md-6 ">
                    
                        <img src="profiles/img/hotelimages/<?php echo $tp["name"];?>" class="big"/>

					
          <!-----          <div class="about_thumb ">
                        <img src="images/" alt="" class="hotel_img">
                    </div>----->


                </div>

                <div class="col-xl-6 col-md-6 property_content" >
                <?php $roo="select * from rooms where hotel_id='$c'";
$room=mysqli_query($hotel->connection,$roo);
$rooms=mysqli_fetch_array($room);
if($rooms["normal_price"]!=$rooms["weekend_price"]){
    echo"<marquee><i class='blur'>Weekend prices are diffrent for this hotel</i></marquee>";
}
?>
<div style="float:right;">
<?php 
$i=0;
while($i<5){
if($i<$p["rating"]){
Echo"<span class='fa fa-star checked'></span>";
}else{
Echo"<span class='fa fa-star'></span>";}
$i++;
}
?>
</div>
                        <h4><?php echo $p["name"];?></h4>
                        <p ><i class="fa fa-map-marker"></i>&nbsp;<?php echo $p["address"];?></p>

                        
                                <ul class="list">
                                    
                                    <li>
<i class="fa fa-hotel"></i>

<?php if($p["room_service"]!="Null"){
?>
    Room Service
<?php } else{
?>
     NO Room Service
<?php }?>         
                                    </li>
                                    <li>
<i class="fa fa-wifi"></i>  
<?php if($p["wifi"]!="Null"){
?>

    Wifi
<?php } else{
?>
 NO Wifi
<?php }?>
        
                                    </li>
<li>
<?php if($p["kids_play"]!="Null"){
?>
<i class="fa fa-child"></i>

    Kids Play
<?php } ?>        
                                
                                    </li><br>
<li>
<?php if($p["breakfast"]!="Null"){
?>
<i class="fa fa-coffee"></i>


    Complementry Breakfast
<?php } ?>        
                               
                                    </li><li><a href="hotelprofile2.php?id=<?php echo $p['id'];?>">+more..</a></li><br><br>
                                    <li><?php 
            $room=mysqli_query($hotel->connection,$roo);
$rooms=mysqli_fetch_array($room);

 ?>

              <span style="color:red;font-size:25px;font-weight:bold;"><i class="fa fa-rupee"></i><?php echo $rooms["normal_price"];?></span>      
Per Night</li>
              <li>
                                        <div class="single_info_doc" >
<a href="hotelprofile2.php?id=<?php echo $p['id'];?>" style="color:red;float:right;">View Details >></a>                                        </div>
                                    </li>
                                </ul>

                   
                                


                </div></div>
            </div>


<?php }?>

    </div></div>
<div class="col-lg-3" style="Margin-top:15%;">
						<div class="filter">
							<h3><i class="fa fa-filter"></i>&nbsp;&nbsp; Filters</h3>
							<form action="search.php?state=<?php echo $state;?>" method="post" class="search-property" id="filter">
		        
<div class="col-md-12 align-items-end ftco-animate">
<div class="form-field">
		          					<div class="switch-wrap d-flex justify-content-between"><p>According to  Ratings</p>
								<div class="primary-switch">
									<input type="checkbox" id="default-switch3" value="1" name="ru" class="checkbox">
									<label for="default-switch3"></label>
								</div>
							</div>				              </div>
		        				<div class="form-group" >
		          				<div class="form-field">
		          					<div class="switch-wrap d-flex justify-content-between"><p> Complementary Breakfast</p>
								<div class="primary-switch">
									<input type="checkbox" id="default-switch" value="1" name="rs" class="checkbox">
									<label for="default-switch"></label>
								</div>
							</div>	
                            <div class="form-field">
		          					<div class="switch-wrap d-flex justify-content-between"><p>Complementary One Time Dinner</p>
								<div class="primary-switch">
									<input type="checkbox" id="default-switch1" value="1" name="cd" class="checkbox">
									<label for="default-switch1"></label>
								</div>
							</div>				              </div>
		        			</div>
<div class="col-md-12 align-items-end ftco-animate">
		        				<div class="form-group" style="margin-left:-5%">
		        					<label for="#">Most Visited</label>
		        					<div class="form-field">
		          					<div class="switch-wrap d-flex justify-content-between">
								<div class="primary-switch">
									<input type="checkbox" id="default-switch4" value="1" name="mv" class="checkbox"> 
									<label for="default-switch4"></label>
								</div>
							</div>					              </div>
		        			</div>
		        				
		        			
		        			
		        			<div class="col-md-12 align-items-end ftco-animate">
		        				<div class="form-group" style="margin-left:-15%">
		        					<label for="#" >Free Airport Transfer</label>
		          				<div class="form-field">
		          					<div class="switch-wrap d-flex justify-content-between">
								<div class="primary-switch">
									<input type="checkbox" id="default-switch2" value="1" name="fat" class="checkbox">
									<label for="default-switch2"></label>
								</div>
							</div>			              </div>
		        			</div>
		        			
		        			<div class="col-md-12 align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Search" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>

		        		</div>
		        	</form>
		        </div>
					</div><!-- end -->

</div>
</div></section>
    <!-- accordion  -->
            <!-- accordion  -->

    
    <!-- testimonial_area  -->
       <!-- /testimonial_area  -->


    <!-- team_area  -->
        <!-- /team_area  -->

    <!-- contact_action_area  -->
        <!-- /contact_action_area  -->


    <!-- footer start -->
    
 
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <?php include "footer.php"?>
    <script type="text/javascript">  
    
    <?php  if(isset($_POST["rs"])){
   echo" document.getElementById('default-switch').checked = true;";}?>
       <?php  if(isset($_POST["ru"])){
   echo" document.getElementById('default-switch3').checked = true;";}?>

<?php  if(isset($_POST["cd"])){
   echo" document.getElementById('default-switch1').checked = true;";}?>

$('input.checkbox1').on('change', function() {
    $('input.checkbox1').not(this).prop('checked', false);  
});



    $(function(){
     $('.checkbox').on('change',function(){

        $('#filter').submit();
        });
    });
    $(function(){
     $('.checkbox1').on('change',function(){

        $('#filter').submit();
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>

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
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
    <script>
$(document).ready(function() { 
           $(function() { 
                $( "#my_date_picker1" ).datepicker({minDate: 0}); 
                $( "#my_date_picker").datepicker({ minDate: 0}); 


            }); 
        }) 

n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("my_date_picker").value =  m + "/" + d + "/" + y;
</script>
</body>

</html>