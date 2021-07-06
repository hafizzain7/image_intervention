<?php

$con = mysqli_connect("localhost", "root", "", "image_upload");

 if(isset($_POST['submit'])){
   /* echo "<pre>";
   print_r($_FILES); */
    $name=$_POST['name'];
    $email=$_POST['email'];
    $file_name=$_FILES['img']['name'];
    $file_size=$_FILES['img']['size'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_type=$_FILES['img']['type'];
    $dest_file='media/'.$file_name;
   move_uploaded_file($file_tmp,$dest_file);

   $sql = "INSERT INTO `image`(`name`, `email`, `pic`) VALUES ('$name','$email','$dest_file')";

   mysqli_query($con, $sql);
  





 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
  <input type="test" name="name" placeholder="Enter name">
  <input type="test" name="email" placeholder="Enter Email">
  <input type="file" name="img">
  <a href="show.php"><button name="submit" class="btn btn-success">Add it</buuton></a>
</form>
</body>
</html>