<?php
include("../class.php");

$ic=$_GET["id"];
$data=$hotel->get_info($ic);
if(isset($_POST["update_room"])){
  $hotel=new Hotel();
  $normal=$_POST["normal_room_price"];
  $suite=$_POST["suite_room_price"];
  $normalw=$_POST["weekn_room_price"];
  $suitew=$_POST["weeks_room_price"];

  $room="Normal";
$sql="UPDATE rooms SET normal_price='$normal', weekend_price='$normalw' where hotel_id='$ic' And room_type='$room' ";
$result = mysqli_query($hotel->connection,$sql)or die("Error: " . mysqli_error($hotel->connection));
$sql="UPDATE rooms SET normal_price='$normal', weekend_price='$normalw' where hotel_id='$ic' And room_type='Suite' ";
$result = mysqli_query($hotel->connection,$sql)or die("Error: " . mysqli_error($hotel->connection));

}
if(isset($_POST["update_fac"])){
$room_service =$_POST["Room_service"];

$breakfast =$_POST["Breakfast"];
$dinner =$_POST["Dinner"];

$airport_transfers =$_POST["Tranfers"];
$wifi =$_POST["Wifi"];
$bar =$_POST["Bar"];
$gym =$_POST["Gym"];
$tv =$_POST["T_V"];
$swimming_pool =$_POST["Swimming_pool"];
$ac =$_POST["AC"];
$kids_play =$_POST["Kids_play"];
$restaurant =$_POST["Restaurant"];
$cctv =$_POST["cctv"];
$fire =$_POST["Fire"];
$emergency =$_POST["Emergency"];
$parking =$_POST["Parking"];
$library =$_POST["Library"];
$lawn =$_POST["Lawn"];
$hotel=new Hotel();

$sql="UPDATE hotel_fac SET room_service='$room_service', breakfast='$breakfast', dinner='$dinner', airport_transfer='$airport_transfers' ,wifi ='$wifi',
bar='$bar',gym='$gym',tv='$tv', swimming_pool='$swimming_pool', ac='$ac',kids_play='$kids_play', restaurant='$restaurant', cctv='$cctv',fire='$fire',
emergency ='$emergency',parking='$parking' ,library='$library', lawn ='$lawn' where id=$ic";
$result = mysqli_query($hotel->connection,$sql);
//header("location:hotel.php?id={$ic}");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>HoneyMooniq</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="css/templatemo-main.css">

        <link rel="stylesheet" href="css/templatemo-main.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="https://assets.ivdata.in/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<style>
.icons{
Position:absolute;
Margin-top:-10px;
Font-size:20px;
}
fieldset{
Margin-bottom:10px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.remv{
  height:70%;
  width:85%;
  overflow:hidden;

}
.icons{
Position:absolute;
Margin-top:-10px;
Font-size:20px;
}
.hover-shadow:hover {
  box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
svg{
  width:40px;
}
</style>
    </head>

<body style="background:#f5f5ed;">
        <nav style="box-shadow: 5px 10px 5px #8a8f91;background:url(https://image.freepik.com/free-photo/brick-wall-texture_1194-6421.jpg);">
          <div class="logo">
              <img src="../img/logo.png" alt="">
          </div>
          
          <ul>
            <li><a href="#1"><i class="fa fa-user"></i> <em>Profile</em></a></li>
            <li><a href="#2"><i class="fa fa-pencil"></i> <em>Update</em></a></li>
            <li><a href="#3"><i class="fa fa-pencil"></i> <em>Update Facilities</em></a></li>
 <li><a href="#4"><i class="fa fa-clipboard"></i> <em>Bookings</em></a></li>
       <!--     <li><a href="#5"><i class="fa fa-search"></i> <em>Reviews</em></a></li>-->
          </ul>
        </nav>
        
        <div class="slides">
          <div class="slide" id="1">
            <div class="content first-content"  style="background:#f5f5ed; ">
              <div class="container-fluid" style="border: 2px solid rgb(207, 203, 192);padding:30px;">
              <div class="row">
                  <div class="col-md-4 acd">
                  <h5 style="color:red;"><i class="fa fa-building"></i> <?php echo $data["name"];?></h5>
                  <p><i class="fa fa-envelope"></i> <?php echo $data["email"];?></p>
                  <p><i class="fa fa-phone"></i> <?php echo $data["phone"];?></p>
 <p><i class="fa fa-map-marker"></i> <?php echo $data["country"]?>,<?php echo $data["state"]?></p>
 <p><em><?php echo $data["address"];?></em></p>

                </div>
                  <div class="col-md-8"  style="float:right; margin-top:50px;">
                  <video class="remv" style="" controls>  <source src="img/videos/<?php echo $data['video'];?>" type="video/mp4">
  </video>

    </div>
    <div class="col-md-12" >
    <p style="margin-top:20px;"><?php echo $data["about"];?></p>

</div>
</div>
<div class="row">
<div class="col-md-12"  >

                    <div class="row" >
                      <?php  $hotel=new hotel();  
                      $query="select * from hotel_photos  where h_id= $ic";
  $res=mysqli_query($hotel->connection,$query);
  while($rowi = mysqli_fetch_array($res)){
    ?>

<div class="column">
    <img src="img/hotelimages/<?php echo $rowi["name"];?>" style="width:300px;height:300px;"  class="hover-shadow cursor">
  </div>
                        <?php }?>
                       
            </div>
          </div></div>

              </div>

            </div>

          </div>

          <div class="slide" id="2">
            <div class="content second-content" style="background:#f5f5ed;">
                <div class="container-fluid">
<div class="row">
                    <div class="col-md-6">
                        <div class="left-content">
                            <form id="contact" action="hotel.php?id=<?php echo $ic;?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input  type="text" class="form-control" id="name" placeholder="<?php echo $data["name"] ?>"  oninput='saves("name")'>
                                </fieldset>
                                </div>
                                <div class="col-md-12" >
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="<?php echo $data["email"] ?>" oninput='saves("email")'>
                                  </fieldset>
                                </div>

                                 <div class="col-md-12" >
                                  <fieldset>
                                  <input name="phoe" type="number" class="form-control" id="address" placeholder="<?php echo $data["address"] ?>" oninput='saves("address")'>
                                  </fieldset>
                                </div>
                                <div class="col-md-12" >
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="about" placeholder="<?php echo $data["about"];?>" oninput='saves("about")'></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Update</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
 <form id="contact" action="hotel.php?id=<?php echo $ic;?>" method="post" style="margin-top:10%;">
                            <div class="row">
                              
                                 <div class="col-md-12" >
<h5> Contact Person</h5
                                  <fieldset>
                                  <input name="text" type="text" class="form-control" id="contact_person" placeholder="<?php echo $data["contact_person"];?>" oninput='saves("contact_person")'>
                                  </fieldset>
                                </div>
                               
                                <div class="col-md-12" >
<h5>Phone Number</h5
                                  <fieldset>
                                  <input name="text" type="number" class="form-control" id="phone" placeholder="<?php echo $data["phone"];?>" oninput='saves("phone")'>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Change</button>
                                  </fieldset>
                                </div>

                            </div>
                        </form>

                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-image">
<div class="content fourth-content"  style="margin-left:-20%;">
                <div class="container-fluid">
                    <div class="row">
                      <?php 
                    $res=mysqli_query($hotel->connection,$query);
  while($rowi = mysqli_fetch_array($res)){
    ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <div class="image">
  <p style="float:right;" id="<?php echo "c".$rowi["id"] ;?>"><i class="fa fa-times-circle icons" onclick='delteimg("<?php echo $rowi["id"];?>")'></i></p>

 <img src="img/hotelimages/<?php echo $rowi["name"];?>" id="<?php echo $rowi["id"];?>" style="height:100px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
    
                </div>
            </div>
                      </div>

<form style="margin-top:30px;" action="hotel.php?id=<?php echo $ic;?>" method="post">
                            <div class="row">
                                <div class="col-md-9" >
                                  <fieldset id="gallery">
                                  <input name="img[]" type="file" class="form-control" id="img" oninput='saveimg("img")' >
                    </fieldset>

                                  <h5 style="color:red;" id="add_more">ADD  IMAGES</h5>


                                </div>

<div class="col-md-9" style="float:left;">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Change</button>
                                  </fieldset>
                                </div></div></form>
                                <form style="margin-top:30px;" action="hotel.php?id=<?php echo $ic;?>" method="post">
                            <div class="row">
                                <div class="col-md-9" >
                            <video class="" style="width:200px;height:150px;" controls>  <source src="img/videos/<?php echo $data['video'];?>" type="video/mp4">
  </video>

                                  <fieldset>
                      <input name="vid[]" type="file" class="form-control" id="changevid"  style="" oninput='savevid()' >
                                  </fieldset>


                                </div>

<div class="col-md-9" style="float:left;">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Change Video</button>
                                  </fieldset>
                                </div></div></form>


                     </div>
</div>
                </div>
            </div>
          </div>
          <div class="slide" id="3">
            <div class="content third-content" style="background:#f5f5ed;">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                    <div class="col-md-3">
                                    <h2> Room Price</h2><br>
                                    <?php  
                                    $hotel =new Hotel();
                                    $type = "SELECT * FROM rooms WHERE hotel_id ='$ic'";
$resroo=mysqli_query($hotel->connection,$type);
echo"<b>Working</b><br>";

while($rooms = mysqli_fetch_array($resroo)){
echo $rooms["room_type"].":".$rooms["normal_price"]."<br>";
}

echo"<b>Weekend</b><br>";

$resroo=mysqli_query($hotel->connection,$type);
while($rooms = mysqli_fetch_array($resroo)){

echo $rooms["room_type"].":".$rooms["weekend_price"]."<br>";
}
?>
     
                                    <h2> Facilities</h2><br>
                                    <?php  
                                    $query = "SELECT * FROM hotel_fac WHERE id ='$ic'";
$result=mysqli_query($hotel->connection,$query);
$rows = mysqli_fetch_array($result);
mysqli_close($hotel->connection);
for($i=2;$i<20;$i++){
  if($rows[$i]!="Null"){
   
    echo $rows[$i];
   
    echo"<br>";
  }
     }

?>


</div>
                                        <div class="col-md-9" style="left:25%;">
                                            <div class="left-content">
                                            <h2>Update Room Price</h2>
<form action="hotel.php?id=<?php echo $ic;?>" method="post">
                                            <div class="row form-group">
                <div class="col-md-5" style="margin-left:10px;">

                <h5>Working days</h5>

                  <label class="text-black" for="Room Size">Normal Room price </label>
                  <input type="number" name="normal_room_price" class="form-control" required>
                </div>
<div class="col-md-5"><br>
                  <label class="text-black" for="Room Price">Suite Room Price </label>
                  <input type="number" name="suite_room_price" class="form-control" required>
                </div>
</div> <div class="row form-group">
                <div class="col-md-5" style="margin-left:10px;">

                <h5>Weekend days</h5>

                  <label class="text-black" for="Room Size">Normal Room price </label>
                  <input type="number" name="weekn_room_price" class="form-control" required>
                </div>
<div class="col-md-5"><br>
                  <label class="text-black" for="Room Price">Suite Room Price </label>
                  <input type="number" name="weeks_room_price" class="form-control" required>
                </div>
</div><div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="update_room" value="Update" class="btn btn-primary btn-md text-white">
                </div>
              </div>
</form>
                                                <h2>Update Facilities</h2>
                                                <form action="hotel.php?id=<?php echo $_GET["id"];?>" method="post">
                                                <div class="row form-group">
                

</div>

          <div class="row form-group">
                <div class="col-md-6">
                <input type="hidden" name="Breakfast" value="Null">

                  <input type="Checkbox" name="Breakfast" value="Complimentry Breakfast">
                  <label class="text-black" for="Breakfast"> Complimentry Breakfast </label>
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Dinner" value="Null">

                  <input type="Checkbox" name="Dinner" value="one complimentry Dinner" >
                  <label class="text-black" for=" Dinner">one complimentry Dinner</label> 
                </div>

              </div>
     
             
<div class="row form-group">
              
                <div class="col-md-6">
                <input type="hidden" name="T_V" value="Null">

                  <input type="Checkbox" name="T_V" value="T.V">
                  <label class="text-black" for="Room service">T.V</label> 
                </div>
<div class="col-md-6">
<input type="hidden" name="Swimming_pool" value="Null">

                  <input type="Checkbox" name="Swimming_pool" value="Swimming Pool ">
                  <label class="text-black" for="Swimming_pool"> Swimming Pool </label> 
                </div>
              </div>
             <div class="row form-group">
                <div class="col-md-6">
                <input type="hidden" name="AC" value="Null">

                  <input type="Checkbox" name="AC" value="A.C">
                  <label class="text-black" for="Ac"> A.C </label>
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Kids_play" value="Null">

                  <input type="Checkbox" name="Kids_play" value="Kids Play Area">
                  <label class="text-black" for="Kids">Kids Play Area</label> 
                </div>

              </div>
              <div class="row form-group">
              <div class="col-md-6">
              <input type="hidden" name="Restaurant" value="Null">

                  <input type="Checkbox" name="Restaurant" value="Restaurant">
                  <label class="text-black" for="Restaurant"> Restaurant </label> 
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Emergency" value="Null">

                  <input type="Checkbox" name="Emergency" value="Emergency exit" >
                  <label class="text-black" for="Emergency exit"> Emergency exit </label> 
                </div>
</div>
 <div class="row form-group">
                <div class="col-md-6">
                <input type="hidden" name="cctv" value="Null">

                  <input type="Checkbox" name="cctv" value="CCTV">
                  <label class="text-black" for="cctv"> CCTV </label>
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Fire" value="Null">
                  <input type="Checkbox" name="Fire" value="Fire extinguishers">
                  <label class="text-black" for="Fire extinguishers">Fire extinguishers</label> 
                </div>

              </div>
<div class="row form-group">
                <div class="col-md-6">
                <input type="hidden" name="Lawn" value="Null">

                  <input type="Checkbox" name="Lawn" value="Lawn">
                  <label class="text-black" for="Lawn"> Lawn </label>
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Parking" value="Null">

                  <input type="Checkbox" name="Parking" value="Parking">
                  <label class="text-black" for="Parking"> Parking </label> 
                </div></div>
                <div class="row form-group">
                <div class="col-md-6">
                <input type="hidden" name="Tranfers" value="Null">

                  <input type="Checkbox" name="Tranfers" value=" Pick Up and Drop">
                  <label class="text-black" for="Tranfers">  Pick Up and Drop </label> 
                </div>
<div class="col-md-6">
<input type="hidden" name="Library" value="Null">

                  <input type="Checkbox" name="Library" value="Library">
                  <label class="text-black" for="Library"> Library </label> 
                </div>
              </div>
              <div class="row form-group">
              <div class="col-md-6">
              <input type="hidden" name="Wifi" value="Null">

                  <input type="Checkbox" name="Wifi" value="Wifi" >
                  <label class="text-black" for=" Wifi">Wifi</label> 
                </div>
                
                <div class="col-md-6"> 
                <input type="hidden" name="Room_service" value="Null">

                  <input type="Checkbox" name="Room_service" value="Room Service">
                  <label class="text-black" for="Room service">Room Service</label> 
                </div>

              </div>

              <div class="row form-group">
              <div class="col-md-6">
              <input type="hidden" name="Bar" value="Null">

                  <input type="Checkbox" name="Bar" value="Bar">
                  <label class="text-black" for="bar">Bar</label> 
                </div>
                <div class="col-md-6">
                <input type="hidden" name="Gym" value="Null">

                  <input type="Checkbox" name="Gym" value="GYM">
                  <label class="text-black" for="Gym"> GYM </label>
                </div>
</div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="update_fac" value="Update" class="btn btn-primary btn-md text-white">
                </div>
              </div></form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                 

                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide" id="4">
            <div class="content third-content" style="background:#f5f5ed;">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="left-content">
                                                <h2>Bookings</h2>
                                                <table>
  <tr>
    <th>S.No</th>
    <th>Booking ID</th>
    <th>From</th>
    <th>To</th>
    <th>Customer Name </th>
    <th>Customer Contact</th>
    <th>Status</th>
   <!-- <th>Operation</th>-->
  </tr>
  <?php  
  $hotel=new Hotel();
                                    $type = "SELECT * FROM bookings WHERE hotel_id ='$ic'";
$book=mysqli_query($hotel->connection,$type);
$i=1;
while($booking = mysqli_fetch_array($book)){
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $booking["booking_id"];?></td>
    <td><?php echo $booking["check_in"];?></td>
    <td><?php echo $booking["check_out"];?></td>
    <td><?php echo $booking["fullname"];?></td>
    <td><?php echo $booking["phone"];?></td>
    <td><?php echo $booking["status"];?></td>
   <!-- <td style="color:red;">Cancel</td>-->
  </tr>
  <?php   $i++;
}?>

</table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                 

                        </div>
                    </div>
                </div>
            </div>
          </div>

         
          <div class="slide" id="5">
            <div class="content fifth-content">
                <div class="container-fluid">
                    
                    <div class="col-md-6">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-12">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Now</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery-1.11.2.min.js/js/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="https://assets.ivdata.in/js/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/main.js"></script>
<script>

function saves(row) {
  var xmlhttp = new XMLHttpRequest();
  var text = document.getElementById(row).value;

     var row="row="+row;
     var value="value="+text;
       var id=  "id="+<?php echo $ic;?>;

    var str=value+"&"+row+"&"+id;

    xmlhttp.open("GET","saveh.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}
function saveimg(row) {
    var formData = new FormData();
formData.append("img",document.getElementById(row).files[0]);
formData.append("id",<?php echo $_GET["id"]; ?>);
formData.append("value","Addgallery");
      var xr = new XMLHttpRequest();
      
      var url = "saveh.php";
      xr.open ("POST",url,true);
      xr.send(formData);
  
}
function delteimg(row) {
  var xmlhttp = new XMLHttpRequest();

      var url = "saveh.php";
     var id="id="+row;
     var value="value=delteimghotel";
    var str=value+"&"+id;

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(row).style.display = "none";
        document.getElementById("c"+row).style.display = "none";

      }
    };

    xmlhttp.open("GET","saveh.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}
function savevid() {
    var formData = new FormData();
formData.append("vid", document.getElementById("changevid").files[0]);
formData.append("id",<?php echo $_GET["id"]; ?>);
      var xr = new XMLHttpRequest();
      var url = "saveh.php";
      xr.open ("POST",url,true);
      xr.send(formData);
  
}
  </script>
    <script type="text/javascript">
    
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>