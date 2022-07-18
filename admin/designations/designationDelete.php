<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["designation_id"])){
    $designation_id = $_GET["designation_id"];
}
$deleteQuery = "delete from designations where id ='{$designation_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery) or die("stop query");
if($deleteQueryResult){
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:designationList.php?message={$msg}");


?>