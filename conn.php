<?php
$servername="localhost";
$username="root";
$password="";
$db="honeymoo_honeymooniq";
$conn=new MySQLi($servername,$username,$password,$db);
if($conn->connect_error)
{die("connection failed:".$conn->connect_error);
}

?>