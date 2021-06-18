<?php
Include"class.php";
Include"conn.php";

if(isset($_POST["cancel"])){
    $b_id=$_POST["b_id"];
$reason=$_POST["reason"];
$sql="insert into  cancel_requests(booking_id,message)values('$b_id','$reason')";
$conn->query($sql)or die("Error: " . mysqli_error($conn));
$message="Booking Cancel";

$bookings->cancelmessage($_SESSION["phone"],$b_id);
$message="Booking Cancelled"; 

}

if(!isset($_SESSION["phone"])){
    header("location:index.php");
}
$sqlt="select * from customer where phone= {$_SESSION["phone"]}";
$r1=mysqli_query($conn,$sqlt);
$p=mysqli_fetch_array($r1);
$date=date("m-d-Y");
$query="select * from bookings where customer_id={$p["id"]}";
$res=mysqli_query($conn,$query);


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

.filter{
Box-shadow:1px 1px 1px 1px grey;
Padding:20px;
}
.listing{
    border:1px solid #d8ebdd;
Margin-bottom:50px;
padding:10px;
}
.containerl{margin:3%;margin-top:-5%;padding:40px;}


.pro_option{
    display:none;
}
svg{
    width:40px;
}
.rem{
    color:blue;
    float:right;
}
.payment{
    background:#d8ebdd;
    padding:10px;
}
.cancel_form{
    padding:10px;
box-shadow: 0px 0px 10px  gray;
   margin-bottom:50px;
   display:none;

}
.cancel_for{
display:none;
 padding:5px;
    border:1px solid #eee;
   margin-bottom:20px;
   margin-top:-4%;
   transition: 0.5s;
   height:0%;

}
.msg{
    border:2px solid #d8ebdd;    
    background:#fff;
}
input[type=submit]{
    background:blue;
    background:#f2ba8d;
    padding:10px;
    border:1px solid #d8ebdd;
}
textarea:focus{
    outline: none;

}
.text-block {
    background-color: maroon;
    padding:10px;
    z-index:9;
    width:60%;
    
  }
  .text-block span{
    font-size:20px;

  }
  .b_info{

  }
  #book_photo{
    height:0%;
    width: 30%;
    position: fixed;
    left : 40%;
    top:-10%;
    overflow-x: hidden;
    transition: 0.5s;
  z-index:9;
  }
</style>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
<!--    <div id="book_bg"></div>-->

<?php include "header.php"?>
<section style="margin-top:15%;">
<?php if(isset($_POST["cancel"])){?>

<center>  
     <div class="text-block" id="text-block">
 <span style="color:white;" id="message">Booking Cancelled </span><a href="cancellation.php">Click here for cancellation Policy</a>
  <span onClick='remove("text-block")'style="float:right;color:#fff;font-size:20px;padding:5px;"><i class="fa fa-close" ></i></span>



 
                   </div> </center><?php }?>

            <!--/ bradcam_area  -->
          
			<div class="containerl">
				<div class="row">
					<div class="col-lg-9">
                    <h2>Bookings</h2>

    <div class="about_mission" style="margin-top:-10%;">
<?php
while($row=mysqli_fetch_array($res)){
    $hotel="select * from hotel where id= {$row["hotel_id"]}";
$rhotel=mysqli_query($conn,$hotel);
$h=mysqli_fetch_array($rhotel);

?><div class="option" >

            <div class="row align-items-center listing" >

                <div class="col-md-6">
                    <h5>Booking ID <?php echo $row["booking_id"];?></h5></div>
                    <div class="col-md-6">

                    <?php if($row["status"]==0){
                         echo "<span class='rem'>Remove</span>";

                        }?>

                </div>
                
                <?php  if($row["hotel_id"]!=""){?>

                <div class="col-md-6 " >
               <span><?php include "svg/review.svg";?></span>
                        <h4><?php echo $row["hotel_name"];?></h4>
                        <p ><i class="fa fa-map-marker"></i>&nbsp;<?php echo $h["address"];?></p>

                </div>
                <?php }?>

                <?php  if($row["photographer_id"]!=""){

                    $photographer="select * from photographer where id={$row["photographer_id"]}";
                    $rphotographer=mysqli_query($conn,$photographer);
                    $pho=mysqli_fetch_array($rphotographer);
                    
                    ?>
                <div class="col-md-6 " >
                <span><?php include "svg/photographer.svg";?></span>

                        <h4><?php echo $row["photographer_name"];?></h4>
                        <p ><i class="fa fa-map-marker"></i>&nbsp;<?php echo $pho["location"];?></p>

                </div>
                <?php }?>
                <div class="col-md-12" >
               
                        <h4 style='color:red;font-weight:bold;'><?php echo $row["amount"];?>Rs</h4></div>
                        <div class="col-md-12 payment" >
                        <p style='color:green;float:left;' onClick='info("<?php echo $row["booking_id"].'info';?>")'>View More Info</p>
                        <?php if($row["status"]==0){
                         echo "
                         <span style='color:#fff;background:green;padding:5px;float:right;'>Pay Now</span>
                        ";

                        }
                        elseif($row["status"]==1){ ?>
                            

   <span style='color:#fff;background:rgb(249, 25, 66,0.85);padding:5px;float:right' onClick='cancel("<?php echo $row["booking_id"];?>")'>Cancel Booking</span>
                           <?php
                            
                           }
                           elseif($row["status"]==2){ 
                           echo" 
                           <span style='color:#fff;background:blue;padding:5px;float:right'>Booking Cancelled</span>
                           ";

                           }

   
                        else{
                            echo" 
                            <span style='color:#fff;background:orange;padding:5px;float:right'>Payment Failed</span>
                            ";
 
                        }
                    
                    ?>
                    
                    
                </div>
                
                
            </div>
            <div class="cancel_for" id="<?php echo $row["booking_id"].'info';?>">
            <span style="float:right;" onclick='remove("<?php echo $row["booking_id"]."info" ; ?>")'><i class="fa fa-times"></i></span>
            <?php  if($row["hotel_id"]!=""){?>
           <p>Hotel Details</p>

            <div class="row" >
            <div class="col-md-4" >
                <label>Check In</label>
<span class='b_info' ><?php echo $row["check_in"];?></span>
							</div> 
                            <div class="col-md-4" >
                <label>Check Out</label>
                <span class='b_info' ><?php echo $row["check_out"];?></span>

							</div> 
                            <div class="col-md-4" >
                <label>Room Type</label>
                <span class='b_info' ><?php echo $row["room_type"];?></span>

							</div> 
                            <div class="col-md-4" >
                <label>Rooms</label>
                <span class='b_info' ><?php echo $row["couple"];?></span>

							</div> </div><?php }?>
                            <?php  if($row["photographer_id"]!=""){?>
                                <p>Photographer Details</p>

<div class="row" >

<div class="col-md-8" >
    <label> Booking Date</label>
<span class='b_info' ><?php echo $row["pfrom"];?></span>
                </div> </div>
                 <?php }?>
                            </div>
            
            <?php if($row["status"]==1){?>
<form method="post" action="bookings.php" >
            <div id="<?php echo $row["booking_id"];?>" class="cancel_form">
            <span style="float:right;" onclick='remove("<?php echo $row["booking_id"];?>")'><i class="fa fa-times"></i></span>
            <div class='mt-10'>
                <label>Booking ID</label>
                <input class='single-input msg' value='<?php echo $row["booking_id"];?>' name="b_id" type="hidden" required/>

								<input class='single-input msg' value='<?php echo $row["booking_id"];?>' name="b_id" disabled required/>
							</div> 
            <div class='mt-10'>
            <label>Reason for  Cancellation/Any Comment</label>

								<textarea class='single-textarea msg' placeholder='Message' onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Message'" name="reason" required></textarea>
							</div>                        
                            <div class='mt-10'>

                            <input type='submit' value='confirm cancellation' name='cancel'/>
                            </div></div></form>
                            <?php }?>
<?php }?>

    </div></div>
<!-- end -->

</div>
</div></section>
    <!-- accordion  -->
            <!-- accordion  -->

    
    <!-- testimonial_area  -->
       <!-- /testimonial_area  -->


   

    <!-- link that opens popup -->
    <!-- JS here -->
    <?php include "footer.php"?>
    

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
        function info(c){

      document.getElementById(c).style.height = "10%";
      document.getElementById(c).style.display = "block";

      
      }
    function remove(c){
            document.getElementById(c).style.display="none"; 
}

        function cancel(c){

            document.getElementById(c).style.display="block"; 
}

</script>
</body>

</html>