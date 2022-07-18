<?php

// this is the page where i will write php contact_usdata add php code 

// including config file 
include "../includes/config.php";
if(isset($_POST["contact_us-save"])){
    $contact_topic = mysqli_real_escape_string($conn,$_POST["contact_topic"]);
    $contact_details = mysqli_real_escape_string($conn,$_POST["contact_details"]);
    $icon_name = mysqli_real_escape_string($conn,$_POST["icon_name"]);



    if(empty($contact_topic) || empty($contact_details) || empty($icon_name)){
        $mes= "All field are required.";
    }else{
        $contact_usInsertQuery = "insert into contact_us(contact_topic,contact_details,icon_name) values 
        ('{$contact_topic}','{$contact_details}','{$icon_name}')";
        $contact_usInsertQueryResult = mysqli_query($conn,$contact_usInsertQuery) ;
        if($contact_usInsertQueryResult){
    
            $mes= "Data Inserted Successfully";
        }else{
    
            $mes= "Data insertion Failed";
        }
    }

    header("Location: contact_usList.php?message= '{$mes}'" );
}
