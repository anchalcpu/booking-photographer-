<?php
Include"../class.php";
Include"../conn.php";

$row = $_GET["row"];
$id=$_GET["id"];
$value=$_GET["value"];
//$hotel = new Hotel();

if ($value!=""){
$hotel->updatep($value,$row,$id);
}
$id=$_POST["id"];
$value=$_POST["value"];

$image = $_FILES["img"]["name"];
$file_tem=$_FILES["img"]["tmp_name"];
$path_parts = pathinfo($_FILES["img"]["name"]);
$extension = $path_parts['extension'];
$nam= date("Ymd").date("his");  
$name=$nam.".".$extension;
$store = "img/hotelimages/".$name;

if ($value=="Addgallery"){
$hotel->updateimg($id,$file_tem,$store,$name);
}
$id=$_GET["id"];
$value=$_GET["value"];
$hotel=new hotel();
if ($value=="delteimghotel"){
	$query="select * from hotel_photos where id='$id'";
    $res=mysqli_query($hotel->connection,$query);
    $rows = mysqli_fetch_array($res);
     $v= "img/hotelimages/". $rows["name"];
    $sql="DELETE FROM hotel_photos where id='$id' ";
    $result = mysqli_query($hotel->connection,$sql);
    unlink($v);
#$photographer->deleteim($id);

	}
    $id=$_POST["id"];

$video = $_FILES["vid"]["name"];
$file_tem=$_FILES["vid"]["tmp_name"];
$path_parts = pathinfo($_FILES["vid"]["name"]);
$extension = $path_parts['extension'];
$nam= date("Ymd").date("his");  
$name=$nam.".".$extension;
$store = "img/videos/".$name;

if ($video!=""){
    $query="select * from hotel  where id= $id";
    $res=mysqli_query($hotel->connection,$query);
    $rows = mysqli_fetch_array($res);
     $v= "img/videos/". $rows["video"];
	$sql="UPDATE hotel SET video = '$name' WHERE id=$id ";
    $result = mysqli_query($hotel->connection,$sql);
    unlink($v);
    move_uploaded_file($file_tem,$store);
    mysqli_close($hotel->connection);
	//$photographer->updateimg($id,$file_tem,$store,$name,$row);
}


?>