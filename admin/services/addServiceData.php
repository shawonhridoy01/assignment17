<?php

// this is the page where i will write php service data add php code 

// including config file 
include "../includes/config.php";
if(isset($_POST["service-save"])){
    $service_name = mysqli_real_escape_string($conn,$_POST["service_name"]);
    $service_details = mysqli_real_escape_string($conn,$_POST["service_details"]);
    $icon_name = mysqli_real_escape_string($conn,$_POST["icon_name"]);


    if(empty($service_details) || empty($service_details) || empty($icon_name)){
    $mes= "All field are required.";
    }else{
        $serviceInsertQuery = "insert into services(service_name,service_details,icon_name) values ('{$service_name}','{$service_details}','{$icon_name}')";
        $serviceInsertQueryResult = mysqli_query($conn,$serviceInsertQuery) ;
        if($serviceInsertQueryResult){
    
            $mes= "Data Inserted Successfully";
        }else{
    
            $mes= "Data insertion Failed";
        }
    }

    header("Location: serviceList.php?message= '{$mes}'" );
}
