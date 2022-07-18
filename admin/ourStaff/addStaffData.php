<?php

// this is the page where i will write php staff data add php code 

// including config file 
// <!-- Full texts
// id 	staff_designation
//                                         id 	staff_name 	designation_id 	staff_image 	twitter 	facebook 	linkedin 	instagram  -->
// staff_name
// staff_designation

// twitter
// facebook
// linkedin
// instagram

include "../includes/config.php";
if(isset($_POST["staff-save"])){
    $staff_name = mysqli_real_escape_string($conn,$_POST["staff_name"]);
    $staff_designation = mysqli_real_escape_string($conn,$_POST["staff_designation"]);
    // $staff_image = mysqli_real_escape_string($conn,$_POST["staff_image"]);
    $twitter =$_POST["twitter"];
    $facebook = $_POST["facebook"];
    $linkedin =$_POST["linkedin"];
    $instagram = $_POST["instagram"];

    $upload_status = false;

    if(isset($_FILES["image"])){
        $image = $_FILES["image"];
        
        $imageName = $_FILES["image"] ["name"];
        
        $imageTmp_name = $_FILES["image"] ["tmp_name"];
        $imageSize =$_FILES["image"] ["size"];
        $imageExtensionArray =["jpg","png","jpeg"];
        $imageEx = explode(".",$imageName);
        $imageExactExtension = strtolower(end($imageEx));
        $imageUniqueName = time().".".$imageName;
    
        if($imageSize > 2097152){
            $message = "Image should not be more than 2 mb";
        }elseif(in_array($imageExactExtension,$imageExtensionArray)){
            move_uploaded_file($imageTmp_name,"../assets/images/ourStaff/".$imageUniqueName);
            $upload_status = true;
        }else{
            $mes = "image should be jpg,png,jpeg";
        }
        }else{
            $mes = "Image not found";
        }




    if(empty($staff_name) || empty($staff_designation) || $upload_status == false || empty($twitter) || empty($facebook) || empty($linkedin) || empty($instagram) ){
    $mes= "All field are required.";
    }else{
        $staffInsertQuery = "INSERT INTO staff(staff_name,designation_id,image, twitter, facebook, linkedin,instagram) values 
        ('{$staff_name}','{$staff_designation}','{$imageUniqueName}','{$twitter}','{$facebook}','{$linkedin}','{$instagram}')";

        $staffInsertQueryResult = mysqli_query($conn,$staffInsertQuery);
        if($staffInsertQueryResult){
            
            $mes= "Data Inserted Successfully";
        }else{

            echo "Data insertion failed";
        }
    }

    header("Location: staffList.php?message= '{$mes}'" );
}
