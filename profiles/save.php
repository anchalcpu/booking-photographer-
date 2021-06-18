<?php
Include"../class.php";

$row = $_GET["row"];
$id=$_GET["id"];
$value=$_GET["value"];
if ($value!=""){
$photographer->updatep($value,$row,$id);
}
$id=$_POST["id"];
$value=$_POST["value"];

$image = $_FILES["img"]["name"];
$file_tem=$_FILES["img"]["tmp_name"];
$path_parts = pathinfo($_FILES["img"]["name"]);
$extension = $path_parts['extension'];
$nam= date("Ymd").date("his");  
$name=$nam.".".$extension;
$store = "img/".$name;


if ($value=="Addgallery"){
	$photographer->updateimg($id,$file_tem,$store,$name);
}
$id=$_GET["id"];
$value=$_GET["value"];
$photographer = new Photographer();
if ($row=="camera"){
  $sql="insert into  camera(p_id,name)values('$id','$value')";
  $photographer->connection->query($sql);
  mysqli_close($photographer->connection);

}
if ($value=="delteimgphotographer"){
	$query="select * from photos  where id= $id";
    $res=mysqli_query($photographer->connection,$query);
    $rows = mysqli_fetch_array($res);
     $v= "img/". $rows["filename"];
    $sql="DELETE FROM photos where id=$id ";
    $result = mysqli_query($photographer->connection,$sql);
    unlink($v);
      mysqli_close($photographer->connection);
#$photographer->deleteim($id);

	}
	$id=$_POST["id"];
	$value=$_POST["value"];

	$name=$id.".".$extension;
$store = "img/photographer/".$name;


	$photographer = new Photographer();

if ($value=="changeprofile"){
	$query="select * from photographer  where id= $id";
    $res=mysqli_query($photographer->connection,$query);
    $rows = mysqli_fetch_array($res);
     $v= "img/photographer/". $rows["dp_pic"];
	 unlink($v);
$photographer->savep($id,$file_tem,$store,$name);
}
$row=$_GET["row"];
$value=$_GET["value"];

/*
if(isset($_FILES["video"]["name"])){
$video = $_FILES["video"]["name"];
       $target_dir = "videos/";
       $target_file = $target_dir . $video;

if($video!=""){
$sql="UPDATE hotel SET $v = '$video' WHERE id= '$id' ";
	$result = mysqli_query($conn,$sql);
 move_uploaded_file($_FILES['video']['tmp_name'],$target_file);}
}*/

?>