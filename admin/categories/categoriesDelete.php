<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["categories_id"])){
    $categories_id = $_GET["categories_id"];
}
$deleteQuery = "delete from categories where id ='{$categories_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);
if($deleteQueryResult){
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:categoriesList.php?message={$msg}");


?>