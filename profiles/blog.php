<?php
include("../class.php");
include("../conn.php");



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
</style>
    </head>

<body  style="background:#f5f5ed;">
        <nav style="box-shadow: 5px 10px 5px #8a8f91;background:url(../img/brick-wall-texture_1194-6421.jpg);">
          <div class="logo">
              <img src="../img/logo.png" alt="">
          </div>
          <div class="mini-logo">
              <img src="img/mini_logo.png" alt="">
          </div>
          <ul>

            <li><a href="#1"><i class="fa fa-camera"></i> <em>Blogs</em></a></li>
            <li><a href="#2"><i class="fa fa-pencil"></i> <em> New Blog</em></a></li>

 <li onClick="home()"><a href="#2"><i class="fa fa-home"></i> <em>home</em></a></li>

          </ul>
        </nav>
        <div class="slides">
        
          <div class="slide" id="3">
            <div class="content first-content"  style="background:#f5f5ed; ">
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
        <th>Time</th>
        <th>status</th>
 <th>Operation</th>
      </tr>
    </thead>
    <tbody>
    <?php    $query1="select *  from blogs";
  $res1=mysqli_query($conn,$query1);
 while( $data = mysqli_fetch_array($res1)){
?>
     
     <tr class="success">
        <td><?php echo $data["title"];?></td>
        <td><?php echo $data["writtenBy"];?></td>
        <td><?php echo $data["date"];?></td>
        <td><?php echo $data["time"];?></td>
        <td><?php echo $data["status"];?></td>
<?php   if($data["status"]==1){?>
         <td style='color:blue;' onclick='act("active","<?php echo $data["id"]?>")'  id="<?php echo "active".$data["id"];?>">Inactive</td>

     <?php  }else {?>
       <td style='color:red;' onclick='act("inactive","<?php echo $data["id"]?>")' id="<?php echo "inactive".$data["id"];?>" >Active</td>
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

       
          <div class="slide" id="2">
            <div class="content third-content"  style="background:#f5f5ed; ">
                <div class="container-fluid">

                                            <div class="left-content">
                                            <div class="col-md-12" style="left:2%;margin-top:30px;">
                                            <div  id="b_not" style="background-color:red;margin-left:60%;width:150px;padding:10px;display:none;">
                                            <b style="color:white;">   Blog added  </b><span style="color:white;float:right;" onClick="dis()">&times;</span>
                                        </div>
                                        </div>
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
                <div class="col-md-12">
                  <input type="submit" name="add_b" value="Add" onclick="addBlog()" class="btn btn-primary btn-md text-white">
                </div>
              </div>

              
                                            </div>
                                           
                                        
                                    </div>
                                </div>
                            </div>
                 

               
                            <div class="slide" id="3">
            <div class="content third-content"  style="background:#f5f5ed; ">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                                
                                                <h2>Bookings</h2>
                                                <form action="admin.php" method="post">
                                                <input name="search_id" id="search_id" type="text"/>
                                                <button style="padding:10px;background :transparent;border:transparent;" name="search"><i class="fa fa-search"></i></button>
</form>
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
         
          
        
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type= "text/javascript" src = "../js/countries.js"></script>
    <script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>

    <script src="js/datepicker.js"></script>
    <script src="js/main.js"></script>
<script>
 

  </script>
  <script>
    function home(){
      window.location.replace('admin.php') ;
    }
    function addBlog() {
      var formData = new FormData();
formData.append("img",document.getElementById("imgb").files[0]);
formData.append("title",document.getElementById("title").value);
formData.append("writer",document.getElementById("writer").value);
formData.append("content",document.getElementById("content").value);
formData.append("value","addBlog");

var xr = new XMLHttpRequest();
      
      var url = "blogs.php";
      xr.open ("POST",url,true);
      xr.send(formData);
      xr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("b_not").style.display = "block";


      }
    };
  
}  
function act(val,i) {  
var xr = new XMLHttpRequest();
     var value="value="+val;
     var id="id="+i;
     var str=value+"&"+id;
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
function dis(){
  document.getElementById("b_not").style.display = "none";

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