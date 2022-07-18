<?php 
// die();
// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["our_clients_id"])){
    $our_clients_id = $_GET["our_clients_id"];
}

$selectQuery = "select image from our_clients where id='{$our_clients_id}'" or die("hello sir");
$selectQueryResult = mysqli_query($conn,$selectQuery);
while($row = mysqli_fetch_assoc($selectQueryResult)){
    $upload_status = $row['image'];

};


$deleteQuery = "delete from our_clients where id ='{$our_clients_id}'";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);

$file = "../assets/images/clients/".$upload_status;

if($deleteQueryResult){
    if(file_exists($file)){
        unlink($file);
    }
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:our_clientsList.php?message={$msg}");


?>