<?php

// this is the page where i will write php our_clients data add php code 

// including config file 
// clients_name
// staff_designation
// client_image
// client_review
                                

include "../includes/config.php";
if(isset($_POST["our_clients-save"])){
    $clients_name = mysqli_real_escape_string($conn,$_POST["clients_name"]);
    $our_clients_designation = mysqli_real_escape_string($conn,$_POST["our_clients_designation"]);
    // $client_image = mysqli_real_escape_string($conn,$_POST["client_image"]);
    $client_review = mysqli_real_escape_string($conn,$_POST["client_review"]);
    $upload_status = false;

    if(isset($_FILES["image"])){
        $image = $_FILES["image"];
        
        $imageName = $_FILES["image"] ["name"];
        
        $imageTmp_name = $_FILES["image"] ["tmp_name"];
        $imageSize =$_FILES["image"]  ["size"];
        $imageExtensionArray =["jpg","png","jpeg"];
        $imageEx = explode(".",$imageName);
        $imageExactExtension = strtolower(end($imageEx));
        $imageUniqueName = time().".".$imageName;
    
        if($imageSize > 2097152){
            $msg = "Image should not be more than 2 mb";
        }elseif(in_array($imageExactExtension,$imageExtensionArray)){
            move_uploaded_file($imageTmp_name,"../assets/images/clients/".$imageUniqueName);
            $upload_status = true;
        }else{
            $message = "image should be jpg,png,jpeg";
        }
        }else{
            $message = "Image not found";
        }

    if(empty($clients_name) || empty($our_clients_designation) || empty($client_review) || $upload_status == false){
    $mes= "All field are required.";
    }else{
        $our_clientsInsertQuery = "INSERT INTO our_clients(clients_name,designation_id,image,client_review) values 
        ('{$clients_name}','{$our_clients_designation}','{$imageUniqueName}','{$client_review}')";

        $our_clientsInsertQueryResult = mysqli_query($conn,$our_clientsInsertQuery);
        if($our_clientsInsertQueryResult){
            
            $mes= "Data Inserted Successfully";
        }else{

            echo "Data insertion failed";
        }
    }

    header("Location: our_clientsList.php?message= '{$mes}'" );
}
