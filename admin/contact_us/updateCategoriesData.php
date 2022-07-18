<?php 

// <!-- this is the where i am writing contact_us update query  -->
// including config file 
include "../includes/config.php";

if(isset($_POST["contact_us-update"])){
    // id contact_topic contact_details icon_name status
    
    $contact_us_id = mysqli_real_escape_string($conn,$_POST["id"]);
    $contact_topic = mysqli_real_escape_string($conn,$_POST["contact_topic"]);
    $contact_details = mysqli_real_escape_string($conn,$_POST["contact_details"]);
    $icon_name = mysqli_real_escape_string($conn,$_POST["icon_name"]);

    if(empty($contact_topic || empty($contact_topic) || empty($contact_details) || empty($icon_name) )){
    $mes= "All field are required.";
    }else{
    
        $contact_usupdateQuery = "UPDATE contact_us SET contact_topic ='{$contact_topic}',contact_details ='{$contact_details}',icon_name ='{$icon_name}' where id = '{$contact_us_id}' ";
        $contact_usUpdateQueryResult = mysqli_query($conn,$contact_usupdateQuery)  ;
        if($contact_usUpdateQueryResult){
    
            $mes= "Data updateed Successfully";
    
        }else{
            $mes= "Data update Failed";
            
        }

}

header("Location: contact_usList.php?message= '{$mes}'" );

}


?>

