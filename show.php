<!doctype html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Responsive Website</title>
</head>

<body>
<?php 
$con = mysqli_connect("localhost", "root", "", "image_upload");

$sql = "SELECT * FROM `image` order by id asc";

$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

if ($num > 0) {
    while ($product = mysqli_fetch_assoc($result)) {
        ?>
        <img src="<?php echo $product['pic']; ?>" alt="Shoes1" class="img-fluid mb-2">
        <?php 
    }
}
?>

</body>
</html>