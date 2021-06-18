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
if(isset($_POST["search"])){
  $id1=$_POST["search_id"];
  $b="select * from bookings where booking_id='$id1' ";
  $bres=mysqli_query($hotel->connection,$b);
  echo"<script> document.getElementById('3').style. = '350px';</script>";
  
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
</style>
    </head>

<body  style="background:#f5f5ed;">
<div class="slide" id="3">
          <div class="content first-content"  style="background:#f5f5ed; ">
            <div class="container-fluid">

            <div class="row">

               
  <div class="col-md-12" >


                                                <h2>Cancel Requests</h2><br>

                                            <!--    <div class="col-md-4" >

                                                <form action="admin.php" method="post">
                                                <input name="search_id" id="search_id" type="text" placeholder="Search.."/>
                                                <button style="padding:10px;background :transparent;border:transparent;" name="search"><i class="fa fa-search"></i></button>
</form></div>--->


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
          

</body>
</html>