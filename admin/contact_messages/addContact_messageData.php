<?php

// this is the page where i will write php contact_messagesdata add php code 

// including config file 
include "../includes/config.php";
if(isset($_POST["contact_messages-save"])){
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $subject = mysqli_real_escape_string($conn,$_POST["subject"]);
    $message = mysqli_real_escape_string($conn,$_POST["message"]);



    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        $mes= "All field are required.";
    }else{
        $contact_messagesInsertQuery = "insert into contact_messages(name,email,subject,message) values 
        ('{$name}','{$email}','{$subject}','{$message}')";
        $contact_messagesInsertQueryResult = mysqli_query($conn,$contact_messagesInsertQuery) ;
        if($contact_messagesInsertQueryResult){
    
            $mes= "Data Inserted Successfully";
        }else{
    
            $mes= "Data insertion Failed";
        }
    }

    header("Location: contact_messagesList.php?message= '{$mes}'" );
}
