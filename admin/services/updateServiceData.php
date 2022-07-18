<?php 

// <!-- this is the where i am writing service update query  -->
// including config file 
include "../includes/config.php";
if(isset($_POST["service-update"])){
    $services_id = mysqli_real_escape_string($conn,$_POST["services_id"]);
    $service_name = mysqli_real_escape_string($conn,$_POST["service_name"]);
    $service_details = mysqli_real_escape_string($conn,$_POST["service_details"]);
    $icon_name = mysqli_real_escape_string($conn,$_POST["icon_name"]);

    if(empty($service_details) || empty($service_details) || empty($icon_name)){
    $mes= "All field are required.";
    }else{
        $serviceupdateQuery = "UPDATE services SET service_name='{$service_name}',service_details='{$service_details}',icon_name='{$icon_name}' WHERE id = '{$services_id}';  ";
        $serviceupdateQueryResult = mysqli_query($conn,$serviceupdateQuery)  ;
        if($serviceupdateQueryResult){
    
            $mes= "Data updateed Successfully";
        }else{
            $mes= "Data update Failed";
        }

}

header("Location: serviceList.php?message= '{$mes}'" );

}


?>

