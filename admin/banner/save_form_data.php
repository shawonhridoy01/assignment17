<?php

require "../includes/config.php";

if(isset($_POST["save-data"])){
    $upload_status = false;
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $sub_title = mysqli_real_escape_string($conn,$_POST["sub_title"]);
    $details = mysqli_real_escape_string($conn,$_POST["details"]);

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
        move_uploaded_file($imageTmp_name,"../assets/images/banner/".$imageUniqueName);
        $upload_status = true;
    }else{
        $message = "image should be jpg,png,jpeg";
    }
    }else{
        $message = "Image not found";
    }

    if(empty($title) || empty($sub_title) || empty($details) || $upload_status == false){
            $message= "All Field Are Required";
            
    }else{
        
            $insertQuery = "Insert into banner (title,sub_title,details,image) values ('{$title}','{$sub_title}','{$details}','{$imageUniqueName}')";
            $insertQueryResult = mysqli_query($conn,$insertQuery);
            if($insertQueryResult){
                $message = "Data Inserted Successfully";
                
                
            }else{
                $message = "Data Insertion Failed";
                
            }
            header("location:banners.php?msg={$message}");
    }
    

}
