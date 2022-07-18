<?php

// this is the page where i will write php categoriesdata add php code 

// including config file 
include "../includes/config.php";
if(isset($_POST["categories-save"])){
    $categories_name = mysqli_real_escape_string($conn,$_POST["categories_name"]);



    if(empty($categories_name)){
        $mes= "All field are required.";
    }else{
        $categoriesInsertQuery = "insert into categories(categories_name) values ('{$categories_name}')";
        $categoriesInsertQueryResult = mysqli_query($conn,$categoriesInsertQuery) ;
        if($categoriesInsertQueryResult){
    
            $mes= "Data Inserted Successfully";
        }else{
    
            $mes= "Data insertion Failed";
        }
    }

    header("Location: categoriesList.php?message= '{$mes}'" );
}
