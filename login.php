<?php 
Include "class.php";
Include "conn.php";

$message="";
if($_GET["p"]=="user"){
$phone=$_GET["phone"];
$user-> does_user_exist($phone);

}
if($_GET["p"]=="verify"){
$otp=$_GET['otp'];
$phone=$_GET['phone'];
$user-> verify($phone,$otp);
}

if($_GET["p"]=="photographer"){
$email=$_GET["email"];
$pass=$_GET["password"];
$id=$photographer->login($email,$pass);
#Echo $id;
if($id)
echo $id."|"."1";
else 
echo $id."|"."0";
}
if($_GET["p"]=="set"){
    $_SESSION["checkin"]=$_GET["checkin"];
    $_SESSION["checkout"]=$_GET["checkout"];
    $_SESSION["room_type"]=$_GET["room_type"];
    $_SESSION["couple"]=$_GET["couple"];

}
if($_GET["p"]=="coupen"){
    $code=$_GET["code"];
    $amount=$_GET["amount"];

    $c="select * from hmiq_coupens where code='$code' AND status=1";
    $rcs=mysqli_query($conn,$c);
    $pc=mysqli_fetch_array($rcs);
    if(is_array($pc)) {
        if($pc["min_amount"]>$amount){
            echo"Invalid Coupen";

        }
        else{
    if($pc["discount_in"]=="percent")  {
        $amount=$amount-($amount*($pc["discount_value"]/100));
        echo $amount;

    }
    else{
    
        $amount=$amount-$pc["discount_value"];
         echo $amount;
    }
}
  }
    else{
        echo"Invalid Coupen";

    }


}

if($_GET["p"]=="admin"){
    $email=$_GET["email"];
    $pass=$_GET["password"];
    $id=$hotel->login($email,$pass);
    #Echo $id;
   if($id==1){
    echo $id."|"."1";
}
   else
   echo $id."|"."0";

    }
?>
