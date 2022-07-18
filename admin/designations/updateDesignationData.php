<?php 

// <!-- this is the where i am writing designation update query  -->
// including config file 
include "../includes/config.php";

if(isset($_POST["designation-update"])){
    
    
    $designation_id = mysqli_real_escape_string($conn,$_POST["id"]);
    $designation_name = mysqli_real_escape_string($conn,$_POST["designation_name"]);

    if(empty($designation_name)){
    $mes= "All field are required.";
    }else{
    
        $designationupdateQuery = "UPDATE designations SET designation_name ='{$designation_name}' where id = '{$designation_id}' ";
        $designationUpdateQueryResult = mysqli_query($conn,$designationupdateQuery)  ;
        if($designationUpdateQueryResult){
    
            $mes= "Data updateed Successfully";
    
        }else{
            $mes= "Data update Failed";
            
        }

}

header("Location: designationList.php?message= '{$mes}'" );

}


?>

