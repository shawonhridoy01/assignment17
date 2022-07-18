<?php

// this is the page where i will write php designation data add php code 

// including config file 
include "../includes/config.php";
if(isset($_POST["designation-save"])){
    $designation_name = mysqli_real_escape_string($conn,$_POST["designation_name"]);



    if(empty($designation_name)){
        $mes= "All field are required.";
    }else{
        $designationInsertQuery = "insert into designations(designation_name) values ('{$designation_name}')";
        $designationInsertQueryResult = mysqli_query($conn,$designationInsertQuery) ;
        if($designationInsertQueryResult){
    
            $mes= "Data Inserted Successfully";
        }else{
    
            $mes= "Data insertion Failed";
        }
    }

    header("Location: designationList.php?message= '{$mes}'" );
}
