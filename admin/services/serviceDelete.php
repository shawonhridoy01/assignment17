<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["service_id"])){
    $service_id = $_GET["service_id"];
}
$deleteQuery = "delete from services where id ='{$service_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery) or die("stop query");
if($deleteQueryResult){
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:serviceList.php?message={$msg}");


?>