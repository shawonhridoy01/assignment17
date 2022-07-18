<?php

// this is the page where i will write php our_projects data add php code 

// including config file 
// clients_name
// staff_designation
// client_image
// client_review
                                

include "../includes/config.php";
if(isset($_POST["our_projects-save"])){
    $category_id = mysqli_real_escape_string($conn,$_POST["category_id"]);
    $project_name = mysqli_real_escape_string($conn,$_POST["project_name"]);
    $project_link = mysqli_real_escape_string($conn,$_POST["project_link"]);
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
            // echo "Image should not be more than 2 mb";
            
        }elseif(in_array($imageExactExtension,$imageExtensionArray)){
            move_uploaded_file($imageTmp_name,"../assets/images/projectThumb/".$imageUniqueName);
            $upload_status = true;
        }else{
            $mes = "image should be jpg,png,jpeg";
            // echo  "image should be jpg,png,jpeg";
        }
        }else{
            $mes = "Image not found";
            // echo "Image not found";
            
        }

    if(empty($category_id) || empty($project_name) || empty($project_link) || $upload_status == false){
    $mes= "All field are required.";
    // echo  "All field are required.";
    }else{
        $our_projectsInsertQuery = "INSERT INTO our_projects(category_id,project_name,project_link,image) values 
        ('{$category_id}','{$project_name}','{$project_link}','{$imageUniqueName}')";

        $our_projectsInsertQueryResult = mysqli_query($conn,$our_projectsInsertQuery) or die("stop query");
        if($our_projectsInsertQueryResult){
            
            $mes= "Data Inserted Successfully";
            // echo "Data Inserted Successfully";
        }else{

            // echo "Data insertion failed";
            $msg =  "Data insertion failed";
        }
    }

    header("Location: our_projectsList.php?message= '{$mes}'" );
}
