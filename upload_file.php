<?php
/**
 * 
 * Generate Thumbnail using Imagick class
 *  
 * @param string $img
 * @param string $width
 * @param string $height
 * @param int $quality
 * @return boolean on true
 * @throws Exception
 * @throws ImagickException
 */
function generateThumbnail($img, $width, $height, $quality = 90)
{
    if (is_file($img)) {
        $imagick = new Imagick(realpath($img));
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
        $imagick->setImageCompressionQuality($quality);
        $imagick->thumbnailImage($width, $height, false, false);
       
      
        $filename_no_ext = explode('.', $img);
    
        if (file_put_contents($filename_no_ext[0] /* . '_thumb' */ . '.jpg', $imagick) === false) {
            throw new Exception("Could not put contents.");
        }
        return true;
    }
    else {
        throw new Exception("No valid image provided with {$img}.");
    }
}
$con = mysqli_connect("localhost", "root", "", "image_upload");
 if(isset($_POST['add'])){
   /*  echo "<pre>";
   print_r($_FILES);  */
    $name=$_POST['name'];
    $email=$_POST['email'];
    $file_name=$_FILES['img']['name'];
    $file_size=$_FILES['img']['size'];

    $file_tmp=$_FILES['img']['tmp_name'];
    $file_type=$_FILES['img']['type'];
    $date = date('Y_m_d-H-i-s');
    $dest_file='media/'.$date.$file_name;
  
    move_uploaded_file($file_tmp,$dest_file);
    try {
      generateThumbnail($dest_file, 100, 50, 65);
  }
  catch (ImagickException $e) {
      echo $e->getMessage();
  }
  catch (Exception $e) {
      echo $e->getMessage();
  }
   

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
  <button name="add">Add it</button>
  <a href="show.php" type="button">Show it</a>

</form>
</body>
</html>