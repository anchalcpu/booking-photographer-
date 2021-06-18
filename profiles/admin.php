<?php
include("../class.php");

include("../conn.php");

//header("location:hotel.php?id={$id}");
$flag=0;
$q="select * from hotel";
$result=mysqli_query($hotel->connection,$q);
if(isset($_POST["go"])){
  $country=$_POST["Country"];
  $state=$_POST["State"];
  $name=$_POST["find_hotel"];
  $query="select * from hotel where country= '$country' AND state='$state' And name='$name' ";
  $res=mysqli_query($hotel->connection,$query);
  $flag=1;
  }
  $b="select * from bookings";
$bres=mysqli_query($hotel->connection,$b);



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
.remv{
  height:70%;
  width:85%;
  overflow:hidden;
}
.add_new{
  width:80%;
  padding:10px;
  background:black;
  color:white;
}
#b_not{
  z-index:9;
  position:fixed;
  background-color:red;
  margin-left:60%;
  width:150px;
  margin-top:50px;
  padding:10px;
  display:none;
}
.thumb{
  width:100px;
  height:80px;
}
td{
font-size:12px;
}
.cancel {
  height:0%;
  display:none;
  margin-bottom:50px;
  transition:2s;
}


</style>
    </head>

<body>
        <nav style="box-shadow: 5px 10px 5px #8a8f91;background:url(../img/brick-wall-texture_1194-6421.jpg);">
          <div class="logo">
              <img src="../img/logo.png" alt="">
          </div>
          <div class="mini-logo">
              <img src="img/mini_logo.png" alt="">
          </div>
          <ul>
            <li><a href="#1"><i class="fa fa-camera"></i> <em>Unverified Photographers</em></a></li>
            <li><a href="#2"><i class="fa fa-pencil"></i> <em> Hotels</em></a></li>
            <li class="extra"><a href="#3"><i class="fa fa-pencil"></i> <em> Bookings</em></a>
</li>

 <li><a href="#4"><i class="fa fa-clipboard"></i> <em>Blogs</em></a></li>
 <li><a href="#5"><i class="fa fa-clipboard"></i> <em>Add new Blog</em></a></li>
 <li><a href="#6"><i class="fa fa-clipboard"></i> <em>Coupens</em></a></li>


          </ul>
        </nav>
                                            <div  id="b_not" style="">
                                            <b style="color:white;" id="message">    </b><span style="color:white;float:right;" onClick="dis()">&times;</span>
                                        </div>

        
        <div class="slides">
          <div class="slide" id="1">
            <div class="content first-content" >
              <div class="container-fluid">
              <div class="row">
                  
                 
    <div class="col-md-12" >
    <h2>Unverified Photographers</h2>
    <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>location</th>
        <th>Phone</th>
        <th>Profile</th>

      </tr>
    </thead>
    <tbody>
    <?php    $query1="select *  from photographer  where isVerified= 0";
  $res1=mysqli_query($photographer->connection,$query1);
 while( $data = mysqli_fetch_array($res1)){
?>
     
     <tr class="success">
        <td><?php echo $data["fullname"];?></td>
        <td><?php echo $data["location"];?></td>
        <td><?php echo $data["phone"];?></td>
        <td> <a href="photographer.php?id=<?php echo $data["id"];?>" target="_blank">View Profile</a></td>

      </tr>
      <?php }?>
      
      
    </tbody>
  </table>
</div>
</div>


              </div>

            </div>

          </div>

       
          <div class="slide" id="2">
            <div class="content third-content" >
                <div class="container-fluid">
                        <div class="row">
                                  <a class="add_new" href="../hotelregister.php" style="color:white;">Add New  Hotel</a>

                                            <div class="left-content">
                                            <div class="col-md-12" style="left:2%;margin-top:30px;">

                                                <h2>Update Hotel</h2>
                                                <form action="admin.php" method="post">
                                                <div class="row form-group">
                <div class="col-md-9" style="margin-left:10px;">
                  <label class="text-black" for="Room Size">Hotel Name </label>
                  <select class="form-control" name="find_hotel">
<?php
while($p=mysqli_fetch_array($result)){
Echo "<option>".$p['name']."</option>";
}
?></select>
                </div></div>
                <div class="row form-group">
                <div class="col-md-12">

<div class="col-md-9">
                  <label class="text-black" for="Room Price">Country </label>
                  <select class=" form-control"  id="country" name="Country" required></select>
                </div>
<div class="col-md-9">
                  <label class="text-black" for="Room Price">State </label>
                  <select class=" form-control"  id="state" name="State" required></select>
                </div>
</div>
</div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="go" value="Go" class="btn btn-primary btn-md text-white">
                </div>
              </div></form>
              <div class="col-md-12">
<?php if($flag==1){?>
              <table class="table">
    <thead>
      <tr>
        <th>Id</th>
 <th>Hotel Name</th>
        <th>Address</th>
        <th>Contact Person</th>
        <th>Phone Number</th>
        <th></th>

      </tr>
    </thead>
  <tbody>

<?php 

while($rows=mysqli_fetch_array($res)){
Echo"      
             
  
      <tr>
        <td>".$rows["id"]."</td>
        <td>".$rows["name"]."</td>
        <td>".$rows["address"]."</td>
        <td>".$rows["contact_person"]."</td>
        <td>".$rows["phone"]."</td>
        <td><a href='hotel.php?id=".$rows["id"]."' target='_blank'>Update</a></td>

      </tr>
   ";

 }?>

</tbody>
  </table> <?php }?></div>
                                </div>
                 

                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide" id="3">
          <div class="content first-content" >
            <div class="container-fluid">

            <div class="row">

               
  <div class="col-md-12" >
  <p class="add_new" id="visit"  onclick='visit()' style="color:white;width:200px;float:right;margin-bottom:40px;"> Booking Cancel Requests</p><br>


                                                <h2>Bookings</h2><br>

                                            <!--    <div class="col-md-4" >

                                                <form action="admin.php" method="post">
                                                <input name="search_id" id="search_id" type="text" placeholder="Search.."/>
                                                <button style="padding:10px;background :transparent;border:transparent;" name="search"><i class="fa fa-search"></i></button>
</form></div>--->
<table class="cancel" id="cancel">
  <tr>
    <th>S.No</th>
    <th>Booking ID</th>
    <th>Customer Message </th>
    <th>Refund Status</th>



  </tr>
                                                <?php $bc="select * from cancel_requests";
$bresc=mysqli_query($hotel->connection,$bc);

                                                 while( $data2 = mysqli_fetch_array($bresc)){?>


  <tr>
    <td><?php echo $data2["id"];?></td>
    <td><?php echo $data2["booking_id"];?></td>
    <td><?php echo $data2["message"];?></td>
    <td><?php echo $data2["refund"];?></td>

  </tr>
  
  <?php }?>
</table>
                 


                                                <table>
  <tr>
    <th>S.No</th>
    <th>Booking ID</th>
    <th>Customer Name </th>
    <th>Customer Contact</th>
    <th>Hotel</th>
    <th>Check in</th>
    <th>Check Out</th>
    <th>Photographer</th>
    <th>Photographer Date</th>



  </tr>
                                                <?php  while( $data1 = mysqli_fetch_array($bres)){?>


  <tr>
    <td><?php echo $data1["id"];?></td>
    <td><?php echo $data1["booking_id"];?></td>
    <td><?php echo $data1["fullname"];?></td>
    <td><?php echo $data1["phone"];?></td>
    <td><?php echo $data1["hotel_name"];?></td>
    <td><?php echo $data1["check_in"];?></td>
    <td><?php echo $data1["check_out"];?></td>

    <td><?php echo $data1["photographer_name"];?></td>
    <td><?php echo $data1["pfrom"];?></td>
  </tr>
  
  <?php }?>
</table>
                 

                        </div>
                    </div>
                </div>
            </div>
          </div>
          

        <div class="slide" id="3">
          <div class="content first-content" >
            <div class="container-fluid">
            <div class="row">
                
               
  <div class="col-md-12" >
  <h2>Blogs</h2>
  <table class="table">
  <thead>
    <tr>
      <th>Blog title</th>
      <th>Written By</th>
      <th>Date</th>
      <th>Category</th>
      <th>Thumbnail</th>
<th>Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php    $query1="select *  from blogs Order By id DESC";
$res1=mysqli_query($conn,$query1);
while( $data = mysqli_fetch_array($res1)){
?>
   
   <tr class="success">
      <td><?php echo $data["title"];?></td>
      <td><?php echo $data["writtenBy"];?></td>
      <td><?php echo $data["date"];?></td>
      <td id="<?php echo "cat".$data["id"];?>" contenteditable="true" onblur='changes("<?php echo $data["id"];?>")'><?php echo $data["category"];?></td>
      <td><img src="img/blog/<?php echo $data["img"];?>" style="width:80px;" id="<?php echo "thumbimg".$data["id"];?>"><input type="file"  id="<?php echo "thumb".$data["id"];?>"  oninput='thumbn("<?php echo $data["id"];?>")'/></td>
<?php   if($data["status"]==1){?>
       <td style='color:blue;' onclick='act("active","<?php echo $data["id"]?>","blogs")'  id="<?php echo "active".$data["id"];?>">Inactive</td>

   <?php  }else {?>
     <td style='color:red;' onclick='act("inactive","<?php echo $data["id"]?>","blogs")' id="<?php echo "inactive".$data["id"];?>" >Active</td>
     <?php }?>

    </tr>
    <?php }?>
    
    
  </tbody>
</table>
</div>
</div>
   </div>

            </div>

          </div>
          <div class="slide" id="5">
            <div class="content third-content" >
                <div class="container-fluid">

                                            <div class="left-content">
                                            
                                                <h2>Add New Blog </h2>
                                                <div class="row form-group">
                <div class="col-md-9">
                  <label class="text-black" for="title">Blog Title </label>
                  <input type="text" class="form-control" name="b_title" id="title" required/>
                </div></div>
                <div class="row form-group">
                <div class="col-md-9">
                  <label class="text-black" for="content">Content </label>
                  <textarea type="text" class=" form-control"  style="height:300px;" name="b_content" id="content" required></textarea>

</div></div>
<div class="row form-group">

<div class="col-md-9">
                  <label class="text-black" for="content">ADD Image </label>
                  <input type="file" class="form-control" name="imgb" id="imgb">

</div>
</div>
<div class="row form-group">

<div class="col-md-9">
                  <label class="text-black" for="content">Written By </label>
                  <input type="text" class="form-control" name="b_writer" id="writer">

</div>
</div>
<div class="row form-group">

<div class="col-md-9">
                  <label class="text-black" for="category">Category </label>
                  <input type="text" class="form-control" name="category" id="category">

</div>
</div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="add_b" value="Add" onclick="addBlog()" class="btn btn-primary btn-md text-white">
                </div>
              </div>

              
                                            </div>
                                           
                                        
                                    </div>
                                </div>
                            </div>
                 

                            <div class="slide" id="6">
          <div class="content first-content">
            <div class="container-fluid">
            <div class="row">
              
  <div class="col-md-12" >
  <h2>Coupens</h2>
  <div class="row form-group">

<div class="col-md-3">
                  <label class="text-black" for="CODE">Code </label>
                  <input type="text" class="form-control" name="code" id="code">

</div>
<div class="col-md-3">
                  <label class="text-black" for="Min_Amount">Min_Amount </label>
                  <input type="text" class="form-control" name="min_amount" id="min_amount">

</div>
<div class="col-md-3">
                  <label class="text-black" for="Discount">Discount In</label>
                  <select class="form-control" name="discount" id="discount">
                    <option value="percent">Amount</option>
                    <option vaue="rs">Percentage</option>

   </select>

</div>
<div class="col-md-3">
                  <label class="text-black" for="discount_value">Discount Value</label>
                  <input type="text" class="form-control" name="discount_value" id="discount_value">

</div>



</div>
<div class="row form-group">
                <div class="col-md-12" >
                  <input type="submit" name="add_c" value="Add" onclick="addCoupen()" class="btn btn-primary btn-md text-white" style="float:right;">
                </div>
              </div>

  <table class="table">
  <thead>
    <tr>
      <th>Coupen Code</th>
      <th>MIN Amount</th>
      <th>Discount</th>
      <th>Status</th>
<th>Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php    $coup="select *  from hmiq_coupens ";
  $coupr=mysqli_query($conn,$coup);
 while( $coupen = mysqli_fetch_array($coupr)){
?>
            
   
   <tr class="success">
      <td><?php echo $coupen["code"];?></td>
      <td><?php echo $coupen["min_amount"];?></td>
      <?php if($coupen["discount_in"]=="percent"){ ?>
      <td><?php echo $coupen["min_amount"];?>%</td>
<?php }else{?>
        <td><?php echo $coupen["min_amount"];?>Rs</td>

<?php }?>
<td><?php echo $coupen["status"];?></td>

<?php   if($coupen["status"]==1){?>
       <td style='color:blue;' onclick='act("active","<?php echo $coupen["id"]?>","hmiq_coupens")'  id="<?php echo "active".$coupen["id"];?>">Inactive</td>

   <?php  }else {?>
     <td style='color:red;' onclick='act("inactive","<?php echo $coupen["id"]?>","hmiq_coupens")' id="<?php echo "inactive".$coupen["id"];?>" >Active</td>
     <?php }?>

    </tr>
    <?php }?>
    
    
  </tbody>
</table>
</div>
</div>
   </div>

            </div>

          </div>
 
        
          



                                                </div>

         
          
        <script>
        var cells = document.getElementsByTagName('tr'),
    colors = ['a9deb7','edb9d5','abd5db','b6b0eb','f5c9bf','dff5bf','f2f0bd','daf3f5'];

for(var i = 0; i < cells.length; i++) {
    cells[i].style.backgroundColor = '#' + colors[Math.floor(Math.random() * colors.length)];
}

          function visit(){
            document.getElementById("cancel").style.display = "block";
            document.getElementById("cancel").style.height = "auto";
          }
           function addBlog() {
      var formData = new FormData();
formData.append("img",document.getElementById("imgb").files[0]);
formData.append("title",document.getElementById("title").value);
formData.append("writer",document.getElementById("writer").value);
formData.append("content",document.getElementById("content").value);
formData.append("category",document.getElementById("category").value);

formData.append("value","addBlog");

var xr = new XMLHttpRequest();
      
      var url = "blogs.php";
      xr.open ("POST",url,true);
      xr.send(formData);
      xr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("message").innerHTML = "Blog Added";

         document.getElementById("b_not").style.display = "block";


      }
    };
  
}  
function thumbn(i) {
      var formData = new FormData();
      var c="thumb"+i;
var demo="thumbimg"+i;
      formData.append("img", document.getElementById(c).files[0]);
formData.append("value","thumbnail");
formData.append("id",i);


var xr = new XMLHttpRequest();
demo.src=URL.createObjectURL(event.target.files[0]);


      var url = "blogs.php";
      xr.open ("POST",url,true);

      xr.send(formData);
    
}  

          function act(val,i,table) {  
var xr = new XMLHttpRequest();
     var value="value="+val;
     var id="id="+i;
      table="table="+table;

     var str=value+"&"+id+"&"+table;

     var url = "blogs.php?"+str;
  var demo=val+i;
      xr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(demo).style.color="orange";
        document.getElementById(demo).innerHTML="Status Changed";

      }
    };
      xr.open ("POST",url,true);
      xr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    xr.send();

} 
function addCoupen() {  
var xr = new XMLHttpRequest();
     var value="value=coupen";
    var code="code="+ document.getElementById("code").value;
    var min_amount="min_amount="+ document.getElementById("min_amount").value;
    var discount="discount="+ document.getElementById("discount").value;
    var discount_value="discount_value="+ document.getElementById("discount_value").value;

     var str=value+"&"+code+"&"+min_amount+"&"+discount+"&"+discount_value;
     var url = "blogs.php?"+str;
      xr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("message").innerHTML = "Coupen Added";

         document.getElementById("b_not").style.display = "block";

      }
    };
      xr.open ("POST",url,true);
      xr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    xr.send();

} 
function changes(i) {  
var xr = new XMLHttpRequest();
     var value="value=category";
     var id="id="+i;
     var demo="cat"+i;
     var cat="cat="+document.getElementById(demo).innerHTML;
     var str=value+"&"+id+"&"+cat;
     var url = "blogs.php?"+str;
      xr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(demo).style.color="orange";
      }
    };
      xr.open ("POST",url,true);
      xr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    xr.send();

} 
function dis(){
  document.getElementById("b_not").style.display = "none";

}

          </script>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type= "text/javascript" src = "../js/countries.js"></script>
    <script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>

    <script src="js/datepicker.js"></script>
    <script src="js/main.js"></script>
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