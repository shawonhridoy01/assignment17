<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["staff_id"])){
    $staff_id = $_GET["staff_id"];
}

$selectQuery = "select image from staff where id='{$staff_id}'" ;
$selectQueryResult = mysqli_query($conn,$selectQuery);
while($row = mysqli_fetch_assoc($selectQueryResult)){
    $upload_status = $row['image'];
};



$deleteQuery = "delete from staff where id ='{$staff_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);

$file = "../assets/images/ourStaff/".$upload_status;

if($deleteQueryResult){
    if(file_exists($file)){
        unlink($file);
    }
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:staffList.php?message={$msg}");


?>