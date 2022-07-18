<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["banner_id"])){
    $id = $_GET["banner_id"];
}
$selectImage = "select image from banner";
$selectImageResult = mysqli_query($conn,$selectImage);
while($row = mysqli_fetch_assoc($selectImageResult)){
    $deleteableImage =  $row["image"];
}


$deleteQuery = "delete from banner where id ='{$id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);
$file = "../assets/images/banner/".$deleteableImage;

// die("stop query");
if($deleteQueryResult){
    if(file_exists($file)){
        unlink($file);
    }
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:http://localhost/php/project/admin/banner/banners.php?message={$msg}");


?>