<?php 

// <!-- this is the where i am writing contact_messages update query  -->
// including config file 
include "../includes/config.php";

if(isset($_POST["contact_messages-update"])){
    // id contact_topic contact_details icon_name status
    
    $contact_messages_id = mysqli_real_escape_string($conn,$_POST["id"]);
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $subject = mysqli_real_escape_string($conn,$_POST["subject"]);
    $message = mysqli_real_escape_string($conn,$_POST["message"]);

    if(empty($name || empty($email) || empty($subject) || empty($message) )){
    $mes= "All field are required.";
    }else{
    
        $contact_messagesupdateQuery = "UPDATE contact_messages SET name ='{$name}',email ='{$email}',subject ='{$subject}', message ='{$message}' where id = '{$contact_messages_id}' ";
        $contact_messagesUpdateQueryResult = mysqli_query($conn,$contact_messagesupdateQuery)  ;
        if($contact_messagesUpdateQueryResult){
    
            $mes= "Data updateed Successfully";
    
        }else{
            $mes= "Data update Failed";
            
        }

}

header("Location: contact_messagesList.php?message= '{$mes}'" );

}


?>

