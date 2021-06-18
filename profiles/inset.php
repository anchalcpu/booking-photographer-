<?php
include("../conn.php");
//header("location:hotel.php?id={$id}");
if (isset($_POST["import"])) {
    
  $fileName = $_FILES["file"]["tmp_name"];
  
  if ($_FILES["file"]["size"] > 0) {
      
      $file = fopen($fileName,"r");
      
      while (($column = fgetcsv($file,10000, ",")) !== FALSE) {
          
          $code = "";
          if (isset($column[0])) {
              $code = mysqli_real_escape_string($conn,$column[0]);
              echo $code."<br>";
  }
          
        $sql="insert into  coupens(code) values('$code')";
        $insertId=$conn->query($sql);
      

          if (! empty($insertId)) {
              $type = "success";
              $message = "CSV Data Imported into the Database";
          } else {
              $type = "error";
              $message = "Problem in Importing CSV Data";
          }
      }
      $sql="DELETE FROM coupens where id=1";
      $result = mysqli_query($conn,$sql);

  }
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

</style>
    </head>

<body  style="background:#f5f5ed;margin-top:200px;">
<form class="form-horizontal" action="inset.php" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

</body>
</html>