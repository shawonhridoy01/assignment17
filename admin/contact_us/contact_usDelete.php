<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["contact_us_id"])){
    $contact_us_id = $_GET["contact_us_id"];
}
$deleteQuery = "delete from contact_us where id ='{$contact_us_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);
if($deleteQueryResult){
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:contact_usList.php?message={$msg}");


?>