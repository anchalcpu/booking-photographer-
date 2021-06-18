<?php
include("../class.php");
include("../conn.php");

$id=$_GET["id"];
//$_SESSION["admin"]="1";
if(isset(($_POST["appr"]) )&& isset($_SESSION["admin"] )){
  $sql="UPDATE  photographer SET isVerified = 1 where  id= '$id'";
  $result = mysqli_query($photographer->connection,$sql);

}
$photographer = new Photographer();

$query="select * from camera  where p_id= $id";
$res=mysqli_query($photographer->connection,$query);
$r = mysqli_fetch_array($res);
$data=$photographer->get_info($id);
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
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="css/light-box.css">
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
.approve:hover{
color:black;
border: 1px solid black;
background:white;
}
.acd{
  background:url(../img/back.png);
  background-size:100% 100%;
  padding:20px;
  font-size: 55px;
}
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 25%;;
  top: 8%;
  width: 70%;
  height: 85%;
  overflow: hidden;
  background-color: black;
}


img {
  margin-bottom: -4px;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
svg{
  width:40px;
}

</style>
    </head>

<body style="background-color:#f5f5ed;"> 
        <nav style="box-shadow: 5px 10px 5px #8a8f91;background:url(https://image.freepik.com/free-photo/brick-wall-texture_1194-6421.jpg);">
          <div class="logo">
              <img src="../img/logo.png" alt="">
          </div>
          <div class="mini-logo">
            <!---  <img src="../img/logo.png" alt="">--->
          </div>
          <ul>
            <li><a href="#1"><i class="fa fa-user"></i> <em>Profile</em></a></li>
            <li><a href="#2"><i class="fa fa-pencil"></i> <em>Update</em></a></li>
            <li><a href="#3"><i class="fa fa-clipboard"></i> <em>Bookings</em></a></li>
           <!-- <li><a href="#5"><i class="fa fa-search"></i> <em>Reviews</em></a></li>-->

          </ul>
        </nav>
        
        <div class="slides" >
          <div class="slide" id="1">
            <div class="content first-content" style="background:#f5f5ed; ">
              <div class="container-fluid "  style="border: 2px solid rgb(207, 203, 192);padding:30px;">
              <div class="row ">
                  <div class="col-md-4">
                   <h5> <svg  viewBox="0 0 128 128" width="300" xmlns="http://www.w3.org/2000/svg"><g><path d="m64.251 52.916h1.97a1.75 1.75 0 0 0 0-3.5l-1.911.062 1.015-6.843a1.75 1.75 0 0 0 -3.463-.514l-1.014 6.839a3.442 3.442 0 0 0 3.4 3.956z"/><path d="m56.042 57.253a1.748 1.748 0 0 0 -.238 2.463 10.425 10.425 0 0 0 8.07 3.363 10.432 10.432 0 0 0 8.069-3.36 1.75 1.75 0 0 0 -2.7-2.227 7.043 7.043 0 0 1 -5.368 2.087 7.04 7.04 0 0 1 -5.369-2.088 1.752 1.752 0 0 0 -2.464-.238z"/><path d="m75.07 44.042a4.182 4.182 0 1 0 -4.181-4.182 4.187 4.187 0 0 0 4.181 4.182z"/><path d="m52.93 44.042a4.182 4.182 0 1 0 -4.183-4.182 4.186 4.186 0 0 0 4.183 4.182z"/><path d="m103.712 87.283a46.127 46.127 0 0 0 -8.556-1.236c-3.1-.286-5.925-.418-9.086-.8-3.04-.33-5.866-1.751-6.148-4.8l-.973-7.606a23.773 23.773 0 0 0 7.107-9.562 46.945 46.945 0 0 0 2.271-8.6c.048-.245.1-.484.149-.728a8.289 8.289 0 0 0 1.388.123 8.6 8.6 0 0 0 1.069-17.132v-16.2a20.773 20.773 0 0 0 -20.749-20.742h-12.368a20.773 20.773 0 0 0 -20.749 20.749v16.165a8.6 8.6 0 0 0 .817 17.165 8.459 8.459 0 0 0 1.631-.168c.052.259.106.513.158.773a46.962 46.962 0 0 0 2.272 8.6 23.759 23.759 0 0 0 7.106 9.559l-.959 7.506a6.116 6.116 0 0 1 -6.166 4.9c-2.144.192-4.3.371-6.449.506a56.664 56.664 0 0 0 -11.189 1.53 24.361 24.361 0 0 0 -17.894 23.442v15.516a1.749 1.749 0 0 0 1.75 1.75h111.712a1.749 1.749 0 0 0 1.75-1.75v-15.516a24.361 24.361 0 0 0 -17.894-23.444zm-18.094 1.436c.4.052.8.1 1.2.139l-6.652 14.752-6.531-2.389-6.905-7.421 12.335-7.673a13.155 13.155 0 0 0 6.553 2.592zm-18.424 21.719h-6.388l-3.367-7.381 6.561-7.05 6.561 7.05zm27.774-64.962a5.109 5.109 0 0 1 -5.1 5.1 4.8 4.8 0 0 1 -.664-.063l1.19-5.432a24.28 24.28 0 0 0 .53-4.6 5.109 5.109 0 0 1 4.044 4.995zm-37.152-41.976h12.368a17.269 17.269 0 0 1 17.249 17.249v9.379a9.219 9.219 0 0 1 -9-7.1l-.733-3.056a1.75 1.75 0 0 0 -3.344-.2l-1.593 4.313a9.286 9.286 0 0 1 -8.676 6.043h-23.52v-9.379a17.269 17.269 0 0 1 17.249-17.249zm-25.036 41.977a5.1 5.1 0 0 1 4.3-5.023 24.227 24.227 0 0 0 .532 4.636l1.183 5.4a4.952 4.952 0 0 1 -.91.091 5.109 5.109 0 0 1 -5.105-5.104zm12.408 16.489a44.409 44.409 0 0 1 -2.082-7.96c-.18-.918-.361-1.83-.556-2.73l-1.518-6.928a20.683 20.683 0 0 1 -.465-4.335v-6.385h23.521a12.8 12.8 0 0 0 11.668-7.612 12.7 12.7 0 0 0 11.673 7.612v6.384a20.672 20.672 0 0 1 -.464 4.33l-1.515 6.935c-.2.9-.376 1.811-.556 2.729a44.31 44.31 0 0 1 -2.082 7.957 20.32 20.32 0 0 1 -37.624 0zm18.812 16.134a23.819 23.819 0 0 0 11.7-3.055l.748 5.846a8.337 8.337 0 0 0 .661 2.328l-13.109 8.158-13.212-8.218a11.16 11.16 0 0 0 .728-2.078c.014-.062.026-.125.035-.189l.747-5.844a23.826 23.826 0 0 0 11.702 3.052zm-22 10.647a9.416 9.416 0 0 0 6.69-2.567l.126-.125 12.454 7.745-6.905 7.419-6.531 2.389-6.662-14.781c.278-.027.556-.052.828-.08zm-32.11 21.98a20.853 20.853 0 0 1 15.322-20.068 52.236 52.236 0 0 1 10.5-1.414q.88-.059 1.76-.121l7.844 17.407a1.776 1.776 0 0 0 2.2.925l6.933-2.536 3.318 7.274-5.517 12.3h-23.874v-10.745a1.75 1.75 0 0 0 -3.5 0v10.744h-14.982zm46.185 13.766 4.734-10.555h6.373l4.735 10.555zm62.027 0h-14.978v-10.744a1.75 1.75 0 0 0 -3.5 0v10.744h-23.867l-5.517-12.3 3.318-7.274 6.933 2.536a1.773 1.773 0 0 0 2.2-.925l7.82-17.352.191.015c.853.065 1.707.13 2.572.208.534.047 1.069.09 1.605.133a42.893 42.893 0 0 1 7.912 1.124 20.851 20.851 0 0 1 15.318 20.067z"/></g></svg>
                   <?php echo $data["fullname"];?></h5>
 <div class="author-image" style="margin-bottom:10px;"><img src="img/photographer/<?php echo $data["dp_pic"];?>" alt="Photographer Image"></div>

                </div>
                  <div class="col-md-6 acd"  style="float:right; margin-top:80px;">
                  <p ><i class="fa fa-envelope"></i> <?php echo $data["email"];?></p>
                  <p><i class="fa fa-phone"></i> <?php echo $data["phone"];?></p>

 <p><em><?php echo $data["type"];?></em></p>

 <p><i class="fa fa-map-marker"></i> <?php echo $data["location"]?></p>
 <p><i class="fa fa-camera"></i> 
 <?php   
 $photographer = new Photographer();
 $c="select * from camera  where p_id= '$id'";
    $resc=mysqli_query($photographer->connection,$c);
    while($data1 = mysqli_fetch_array($resc)){
?>
 <?php echo $data1["name"].","?>
<?php }?><p>
    </div>
    <div class="col-md-12">
    <p style="margin-top:20px;"><?php echo $data["about"];?></p>

</div>
    </div>
    
<div class="row" >
<div class="col-md-12">
  
<div class="row">
<?php 

$query="select * from photos  where p_id= $id";
$res=mysqli_query($photographer->connection,$query);
while($rows = mysqli_fetch_array($res)){
?>
  <div class="column">
    <img src="img/<?php echo $rows["filename"];?>" style="width:300px;height:300px;"  class="hover-shadow cursor">
  </div>
  <?php }?>
  
</div>



          </div></div>

              </div>

            </div>

          </div>

          <div class="slide" id="2" >
            <div class="content second-content" style="background-color:#f5f5ed;">
                <div class="container-fluid">
<div class="row">
                    <div class="col-md-6">
                        <div class="left-content">
                            <form id="contact" action="photographer.php?id=<?php echo $id;?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="fullname" placeholder="<?php echo $data["fullname"] ?>"  oninput='saved("fullname")'>
                                </fieldset>
                                </div>
                                <div class="col-md-12" >
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="<?php echo $data["email"] ?>" oninput='saved("email")'>
                                  </fieldset>
                                </div>

                                 <div class="col-md-12" >
                                  <fieldset>
<select class="form-control" id="type" onChange='saved("type")'><option value="Freelancer">Freelancer</option><option value="Professional">Professional</option></select>
                                  </fieldset>
                                </div>
                                <div class="col-md-12" >
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="about" placeholder="<?php echo $data["about"];?>" oninput='saved("about")'></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Update</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
 <form id="contact" action="" method="post" style="margin-top:10%;">
                            <div class="row">
                              
                                 <div class="col-md-12" >
<h5>Add Camera</h5
                                  <fieldset>
                                  <input name="text" type="camera" class="form-control" id="camera" placeholder="camera" onblur="camerae()">
                                 <p id="demo" style="color:Red;"></p>
                                </fieldset>
                                </div>
                               
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Add</button>
                                  </fieldset>
                                </div>
                                <div class="col-md-12" >
<h5>Change Profile picture</h5
                                  <fieldset>
                                  <input name="file" type="file" class="form-control" id="dp_pic" oninput='savedp("dp_pic")'>

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
<div class="content fourth-content"  style="margin-left:-20%;background-color:#f5f5ed;">
                <div class="container-fluid" >
               
                    <div class="row">
                        <?php 

     $query="select * from photos  where p_id= $id";
    $res=mysqli_query($photographer->connection,$query);
    while($rows = mysqli_fetch_array($res)){
?>
                        <div class="col-md-4 col-sm-6" style="margin-top:40px;">
                            <div class="item">
                                <div class="thumb">
                                    <div class="image">
<p style="float:right;" id="<?php echo "c".$rows["id"] ;?>"><i class="fa fa-times-circle icons" onclick='delteimg("<?php echo $rows["id"];?>")'></i></p>
 <img src="img/<?php echo $rows["filename"];?>" style="height:100px;" id="<?php echo $rows["id"];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                 <?php }?>      
                   
                
                    </div>
                </div>
            </div>
                      </div>
                      

<form style="margin-top:30px;color:red;" action="" method="post">
                            <div class="row">
                                <div class="col-md-9" >
                                  <fieldset id="gallery">
                                    <input name="img[]" type="file" class="form-control" id="img" oninput='saveimg("img")' >
                                  </fieldset>
<h5 style="color:red;" id="add_more">ADD  IMAGES</h5>

                                </div>

<div class="col-md-9" style="float:left;">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Add</button>
                                  </fieldset>
                                </div></div></form>                                  <form action="photographer.php?id=<?php echo $id?>" method="post">

                                <div class="row">
                                <div class="col-md-8" style="margin-top:30px;" >
                                  Change Price
                                <input name="name" type="text" class="form-control" id="price" placeholder="<?php echo $data["price"] ?>"  oninput='saved("price")'>

    </div>
    <div class="col-md-8">
                                    <button type="submit" id="form-submit" class="btn" style="margin-top:10px;">Change</button>
                                </div>
    </div></form>
                                <div class="row">
                                <div class="col-md-9" >
                                  <?php 
                                  	$v="select * from photographer  where id= $id";
                                    $resv=mysqli_query($photographer->connection,$v);
                                    $rowv = mysqli_fetch_array($resv);
                                    if(isset($_SESSION["admin"])){
                                    if($rowv["isVerified"]=="0"){
                                  ?>
                                  <form action="photographer.php?id=<?php echo $id;?>" method="post">
         <button style="padding:30px;margin-top:30px; background:black;color:white;" class="approve" name="appr"> Approve</button></form>
    <?php }else{?>
           <button style="padding:30px;margin-top:30px; background:black;color:white;" class="approve" name="appr">Approved</button>

 <?php   
}}?>
                                </div></div>

                     </div>
</div>
                </div>
            </div>
          </div>
          <div class="slide" id="3">
            <div class="content third-content" style="background-color:#f5f5ed;">
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
    <th>ON</th>
    <th>Customer Name </th>
    <th>Customer Contact</th>
    <th>Status</th>
  </tr>
                                                  <?php
                                                               	$pb="select * from bookings  where photographer_id= $id";
                                                         $repb=mysqli_query($photographer->connection,$pb);
                                                         $i=1;
                                                     while(    $ropb = mysqli_fetch_array($repb)){
                                                  
                                                  ?>

  <tr>
    <td><?php  echo $i;?></td>
    <td><?php  echo $ropb["booking_id"];?></td>
    <td><?php  echo $ropb["pfrom"];?></td>
    <td><?php  echo $ropb["fullname"];?></td>
    <td><?php  echo $ropb["phone"];?></td>
    <td><?php  echo $ropb["status"];?></td>
  </tr>
  
<?php $i++;
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
  
function saved(row) {
  var xmlhttp = new XMLHttpRequest();
  var text = document.getElementById(row).value;

      var url = "save.php";

     var row="row="+row;
     var value="value="+text;
       var id=  "id="+<?php echo $id;?>;

    var str=value+"&"+row+"&"+id;

    xmlhttp.open("GET","save.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}
function camerae() {
  var xmlhttp = new XMLHttpRequest();
  var text = document.getElementById("camera").value;

      var url = "save.php";

     var row="row=camera";
     var value="value="+text;
       var id=  "id="+<?php echo $id;?>;
    var str=value+"&"+row+"&"+id;

    xmlhttp.open("GET","save.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}

function saveimg(row) {
    var formData = new FormData();
formData.append("img", document.getElementById(row).files[0]);
formData.append("id",<?php echo $_GET["id"]; ?>);
formData.append("value","Addgallery");

      var xr = new XMLHttpRequest();

      var url = "save.php";
      xr.open ("POST",url,true);
      xr.send(formData);
  
}
function savedp(row) {
    var formData = new FormData();
formData.append("img", document.getElementById(row).files[0]);
formData.append("id",<?php echo $_GET["id"]; ?>);
formData.append("value","changeprofile");

      var xr = new XMLHttpRequest();
      var url = "save.php";
      xr.open ("POST",url,true);
      xr.send(formData);
  
}
function delteimg(row) {
  var xmlhttp = new XMLHttpRequest();

      var url = "save.php";
     var id="id="+row;
     var value="value=delteimgphotographer";

    var str=value+"&"+id;
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(row).style.display = "none";
        document.getElementById("c"+row).style.display = "none";

      }
    };


    xmlhttp.open("GET","save.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
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