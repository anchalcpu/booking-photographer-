<?php 
session_start();

define('hostname','localhost');
define('user','root');
define('password','');
define('db_name','honeymoo_honeymooniq');
class Connection{
   private $connect;
   function __construct(){
   $this->connect=mysqli_connect(hostname,user,password,db_name) or die("DB Connection error.");
   }
   public function get_connection()
   {
       return $this->connect;
    }
}

class User
{
private $db;
private $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function does_user_exist($phone){
$query = "SELECT * FROM customer WHERE phone ='$phone'";
$otp=rand()%1000000;
$result=mysqli_query($this->connection,$query);
if(mysqli_num_rows($result)>0){
$sql="UPDATE customer SET otp = '$otp' WHERE phone= '$phone' ";
	$result = mysqli_query($this->connection,$sql);
				
$message="OTP SEND";
mysqli_close($this->connection);
}else { 
 $query ="insert into customer(phone, otp ) values('$phone','$otp')";
  mysqli_query($this->connection,$query);
$message="OTP SEND";
mysqli_close($this->connection);
}
$senderId = "HONEMQ";
$messag = urlencode("Hi Your OTP for HoeymoonIQ is ".$otp);
$route = 4;

$postData = array( 'mobiles' => $phone, 'message' => $messag, 'sender' => $senderId, 'route' => $route );
$url="https://control.msg91.com/api/v2/sendsms";

$curl = curl_init();
curl_setopt_array($curl, array( CURLOPT_URL => "$url", CURLOPT_RETURNTRANSFER => true, CURLOPT_CUSTOMREQUEST => "POST", CURLOPT_POSTFIELDS => $postData,
    CURLOPT_HTTPHEADER => array( "authkey: 174770A7FhCIoyBwg5ed1093dP1", "content-type: multipart/form-data"),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
echo $message;
}
public function verify($phone,$otp){
$query = "SELECT * FROM customer WHERE phone ='$phone'";
$res=mysqli_query($this->connection,$query);
$rows = mysqli_fetch_array($res);
if($rows["otp"]==$_GET["otp"])
{$sql="UPDATE customer SET otp =1 WHERE phone= '$phone' ";
	$result = mysqli_query($this->connection,$sql);
$_SESSION['phone']=$phone;
$_SESSION['id']=$rows['id'];
$_SESSION['user']="user";

$message="Phone Number verified!";
mysqli_close($this->connection);
}Else{
$message="Invalid OTP";
}

echo $message;

}
}
$user = new User();

class Photographer
{
private $db;
public $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function login($email,$password){
$query = "SELECT * FROM photographer WHERE email ='$email' AND password= '$password' ";
$result=mysqli_query($this->connection,$query);
$rows = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
$message="LOGIN SUCCESS";
$_SESSION["id"]=$rows['id'];
$_SESSION['photo']="photo";

mysqli_close($this->connection);
}
Else{
$message ="Wrong Email or Password";
}
return $rows['id'];

}
public function check($phone,$email){
  $query="select *  from photographer where phone= $phone";
  $res=mysqli_query($this->connection,$query);
  $rows = mysqli_fetch_array($res);
  if(is_array($rows)){
  return("Phone number is already registered");
  }
  $query1="select *  from photographer  where email= $email";
  $res1=mysqli_query($this->connection,$query1);
  $rows1 = mysqli_fetch_array($res1);
  if(is_array($rows1)){
  return("Email Id is already registered ");
  }
  return("1");
  }
public function register($name,$email,$type,$country,$state,$phone,$pass,$about,$otp){

  $sql="insert into  photographer(fullname, email, type, location ,state , password ,phone ,otp,about) values('$name','$email','$type','$country','$state','$pass','$phone','$otp','$about')";
  $this->connection->query($sql);
  mysqli_close($this->connection);
  return("Photographer Added Enter otp"); 
}
public function verify_otp($v,$otp){
  $query="select * from photographer  where phone= $v";
  $res=mysqli_query($this->connection,$query);
  $rows = mysqli_fetch_array($res);
  if($otp==$rows["otp"]){
  $sql="UPDATE photographer SET otp = 1 WHERE phone=$v ";
    $result = mysqli_query($this->connection,$sql);
    mysqli_close($this->connection);
    $_SESSION["id"]=$rows["id"];
  return(1);
  }
  else
  return "Invalid OTP";
  }
  public function get_info($id){
    $query="select * from photographer  where id= $id";
    $res=mysqli_query($this->connection,$query);
    $rows = mysqli_fetch_array($res);
    mysqli_close($this->connection);
    return $rows;
    }
  public function updatep($value,$row,$id){
    $sql="UPDATE photographer SET $row = '$value' WHERE id=$id ";
    $result = mysqli_query($this->connection,$sql);
    mysqli_close($this->connection);
  }
  public function deleteim($id){
    $query="select * from photos  where id= $id";
    $res=mysqli_query($this->connection,$query);
    $rows = mysqli_fetch_array($res);
     $v=  $rows["filename"];
    $sql="DELETE FROM photos where id=$id ";
    $result = mysqli_query($this->connection,$sql);
    unlink($v);
      mysqli_close($this->connection);
    }

  public function updateimg($id,$file_tem,$store,$image){
    $sql="insert into photos (p_id,filename)values('$id','$image')";
    $this->connection->query($sql);
    move_uploaded_file($file_tem,$store);
    mysqli_close($this->connection);
    }
    public function savep($id,$file_tem,$store,$image){
      $sql="UPDATE  photographer SET dp_pic = '$image' where  id= '$id'";
      $result = mysqli_query($this->connection,$sql);
      move_uploaded_file($file_tem,$store);
      mysqli_close($this->connection);
      }
  function fcheck($email){
    $query1="select *  from photographer  where email= $email";
    $res1=mysqli_query($this->connection,$query1);
    $rows1 = mysqli_fetch_array($res1);
    mysqli_close($this->connection);
    if(is_array($rows1)){
    return $rows1;  
  }
  
  return 0;}
}
$photographer = new Photographer();
class Hotel
{
private $db;
public $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function login($email,$password){
  $query = "SELECT * FROM admin WHERE username ='$email' AND password= '$password' ";
  $result=mysqli_query($this->connection,$query);
  $rows = mysqli_fetch_array($result);
  if(mysqli_num_rows($result)>0){
  $message=1;
  $_SESSION["admin"]="admin";
  mysqli_close($this->connection);
  }
  else{
    $message =0;
  
  }
  return  $message;

  }
  

public function register($name, $country, $state, $address, $email,$contact_person,$phone,$google_map,$about,$rating){

$sql="insert into  hotel(name, country ,state, address ,email ,contact_person ,phone ,google_map ,about,rating) values('$name', '$country', '$state', '$address', '$email', '$contact_person' ,'$phone','$google_map' ,'$about','$rating')";
$this->connection->query($sql);

$query="select * from hotel where name='$name' AND address='$address' ";
$res=mysqli_query($this->connection,$query);
$p=mysqli_fetch_array($res);

$_SESSION["f_id"]=$p["id"];

return $p["id"];
//function close
}
public function fac($v, $room_service, $breakfast, $dinner, $airport_transfers ,$wifi ,$bar,$gym,$tv , $swimming_pool, $ac ,$kids_play, $restaurant, $cctv, $fire, $emergency ,$parking ,$library, $lawn ){
  $query="select * from hotel where id='$v' ";
$res=mysqli_query($this->connection,$query);
$p=mysqli_fetch_array($res);
$state=$p["state"];
$id=$p["id"];
  $sql = "INSERT INTO hotel_fac(id,state,room_service,breakfast, dinner, airport_transfer ,wifi,bar,gym,tv, swimming_pool, ac ,kids_play, restaurant, cctv, fire, emergency ,parking ,library, lawn ) VALUES ('$id','$state','$room_service', '$breakfast', '$dinner', '$airport_transfers' ,'$wifi' ,'$bar','$gym','$tv','$swimming_pool','$ac','$kids_play', '$restaurant', '$cctv', '$fire','$emergency' ,'$parking','$library', '$lawn')";

  $this->connection->query($sql);
  
  mysqli_close($this->connection);
  return($p["id"]);
  //function close
  }
  public function updateimg($id,$file_tem,$store,$image){
    $sql="insert into hotel_photos (h_id,name)values('$id','$image')";
    $this->connection->query($sql);
    move_uploaded_file($file_tem,$store);
    mysqli_close($this->connection);
    }
    public function deleteim($id){
      $query="select * from hotel_photos  where id= $id";
      $res=mysqli_query($this->connection,$query);
      $rows = mysqli_fetch_array($res);
       $v=  $rows["name"];
      $sql="DELETE FROM hotel_photos where id=$id ";
      $result = mysqli_query($this->connection,$sql);
      unlink($v);
        mysqli_close($this->connection);
      }
public function room_type($id,$room_type,$price){
  $sq="INSERT into rooms(hotel_id,room_type,price)values('$id','$room_type','$price')";
  $this->connection->query($sq);
  
  mysqli_close($this->connection);

}
public function check($phone,$email){
$query="select *  from hotel  where phone= $phone";
$res=mysqli_query($this->connection,$query);
$rows = mysqli_fetch_array($res);
if(is_array($rows)){
Return("Phone number is already registered");
}
$query1="select *  from hotel  where email= '$email'";
$res1=mysqli_query($this->connection,$query1);
$rows1 = mysqli_fetch_array($res1);
if(is_array($rows1)){
Return("Email Id is already registered ");
}
Return("1");
}
public function get_info($id){
  $query="select * from hotel  where id= $id";
  $res=mysqli_query($this->connection,$query);
  $rows = mysqli_fetch_array($res);
  mysqli_close($this->connection);
  return $rows;
  }
  public function updatep($value,$row,$id){
    $sql="UPDATE hotel SET $row = '$value' WHERE id=$id ";
    $result = mysqli_query($this->connection,$sql);
    mysqli_close($this->connection);
  }


}

$hotel = new Hotel();
class Bookings
{
private $db;
public $connection;
function __construct()
{
$this->db = new Connection();
$this->connection=$this->db->get_connection();
}
public function bookmessage($phone,$book_id){
  $senderId = "HONEMQ";
  $messag = urlencode("Dear Customer, Your Booking has been confirmed, your Booking number For HoneymoonIQ is HQ".$book_id);
  $route = 4;
  
  $postData = array( 'mobiles' => $phone, 'message' => $messag, 'sender' => $senderId, 'route' => $route );
  $url="https://control.msg91.com/api/v2/sendsms";
  
  $curl = curl_init();
  curl_setopt_array($curl, array( CURLOPT_URL => "$url", CURLOPT_RETURNTRANSFER => true, CURLOPT_CUSTOMREQUEST => "POST", CURLOPT_POSTFIELDS => $postData,
      CURLOPT_HTTPHEADER => array( "authkey: 174770A7FhCIoyBwg5ed1093dP1", "content-type: multipart/form-data"),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
$sql="UPDATE bookings SET status = 1 WHERE booking_id='$book_id'";
$result = mysqli_query($this->connection,$sql)or die("Error: " . mysqli_error($this->connection));
mysqli_close($this->connection);

}
public function cancelmessage($phone,$book_id){
  
$sql="UPDATE bookings SET status = 2 WHERE booking_id='$book_id'";
$result = mysqli_query($this->connection,$sql);
mysqli_close($this->connection);

}
public function setStatus($book_id,$i){
  
  $sql="UPDATE bookings SET status ={$i} WHERE booking_id='$book_id'";
  $result = mysqli_query($this->connection,$sql);
  mysqli_close($this->connection);
  
  }

  }
  $bookings= new Bookings();


?>
