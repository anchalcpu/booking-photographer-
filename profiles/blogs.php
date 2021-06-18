<?php
Include"../conn.php";
$value = $_POST["value"];

if ($value=="addBlog"){
  date_default_timezone_set('Asia/Kolkata');

	$image = $_FILES["img"]["name"];
  $title = $_POST["title"];
  $content = $_POST["content"];
  $writer = $_POST["writer"];
$category=$_POST["category"];
$file_tem=$_FILES["img"]["tmp_name"];
$path_parts = pathinfo($_FILES["img"]["name"]);
$extension = $path_parts['extension'];
$nam= date("Ymd").date("his");  
$name=$nam.".".$extension;
$store = "img/blog/".$name;
$day = date('d M Y');
$time=date("H:i:s");
  $sql="insert into  blogs(title,content,writtenBy,date,time,status,img,category)values('$title','$content','$writer','$day','$time','1','$name','$category')";
  $conn->query($sql);
  move_uploaded_file($file_tem,$store);

  mysqli_close($conn);

}
$value=$_GET["value"];

if ($value=="active"){
  $v=$_GET["id"];

  $table=$_GET["table"];
  $sql="UPDATE $table SET status = 0 WHERE id=$v";
  $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));

}
if ($value=="inactive"){
  $v=$_GET["id"];
  $table=$_GET["table"];

  $sql="UPDATE $table SET status = 1 WHERE id=$v";
  $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
}
if ($value=="category"){
  $v=$_GET["id"];
  $cat=$_GET["cat"];
echo $cat;
  $sql="UPDATE blogs SET category='$cat' WHERE id=$v";
  $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
}
$value=$_POST["value"];

if ($value=="thumbnail"){
  $v=$_POST["id"];
  $image = $_FILES["img"]["name"];
  $file_tem=$_FILES["img"]["tmp_name"];
  $path_parts = pathinfo($_FILES["img"]["name"]);
  $extension = $path_parts['extension'];
  $nam= date("Ymd").date("his");  
  $name=$nam.".".$extension;
  $store = "img/blog/".$name;
  move_uploaded_file($file_tem,$store);

    $query="select * from blogs  where id= $v";
      $res=mysqli_query($conn,$query);
      $rows = mysqli_fetch_array($res);
       $vi= "img/photographer/". $rows["img"];
     unlink($vi);
     $sql="UPDATE blogs SET img='$name' WHERE id=$v";
     $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
     echo $name;
}
$value=$_GET["value"];

if ($value=="coupen"){
  $code=$_GET["code"];
  $min_amount=$_GET["min_amount"];
  $discount=$_GET["discount"];
  $discount_value=$_GET["discount_value"];


  $sql="insert into hmiq_coupens (code,min_amount,discount_value,discount_in)values('$code','$min_amount','$discount_value','$discount')";
  $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));

}
?>