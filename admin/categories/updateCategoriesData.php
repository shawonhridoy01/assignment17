<?php 

// <!-- this is the where i am writing categories update query  -->
// including config file 
include "../includes/config.php";

if(isset($_POST["categories-update"])){
    
    
    $categories_id = mysqli_real_escape_string($conn,$_POST["id"]);
    $categories_name = mysqli_real_escape_string($conn,$_POST["categories_name"]);

    if(empty($categories_name)){
    $mes= "All field are required.";
    }else{
    
        $categoriesupdateQuery = "UPDATE categories SET categories_name ='{$categories_name}' where id = '{$categories_id}' ";
        $categoriesUpdateQueryResult = mysqli_query($conn,$categoriesupdateQuery)  ;
        if($categoriesUpdateQueryResult){
    
            $mes= "Data updateed Successfully";
    
        }else{
            $mes= "Data update Failed";
            
        }

}

header("Location: categoriesList.php?message= '{$mes}'" );

}


?>

