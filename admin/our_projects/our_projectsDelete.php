<?php 
// die();
// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["our_projects_id"])){
    $our_projects_id = $_GET["our_projects_id"];
}

$selectQuery = "select image from our_projects where id='{$our_projects_id}'" or die("hello sir");
$selectQueryResult = mysqli_query($conn,$selectQuery);
while($row = mysqli_fetch_assoc($selectQueryResult)){
    $upload_status = $row['image'];

};


$deleteQuery = "delete from our_projects where id ='{$our_projects_id}'";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);

$file = "../assets/images/projectThumb/".$upload_status;

if($deleteQueryResult){
    if(file_exists($file)){
        unlink($file);
    }
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:our_projectsList.php?message={$msg}");


?>