<?php 

// <!-- delete query  -->
require "../includes/config.php";
if(isset($_GET["contact_messages_id"])){
    $contact_messages_id = $_GET["contact_messages_id"];
}
$deleteQuery = "delete from contact_messages where id ='{$contact_messages_id}' ";
$deleteQueryResult = mysqli_query($conn,$deleteQuery);
if($deleteQueryResult){
    $msg = 'data deleted successfully';
}else{
    $msg = 'data delete failed';
}

header("location:contact_messagesList.php?message={$msg}");


?>