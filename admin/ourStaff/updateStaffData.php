<?php 

// <!-- this is the where i am writing service update query  -->
// including config file 
include "../includes/config.php";
if(isset($_POST["staff-update"])){
    $staff_id = mysqli_real_escape_string($conn,$_POST["id"]);
    $staff_name = mysqli_real_escape_string($conn,$_POST["staff_name"]);
    $staff_designation = mysqli_real_escape_string($conn,$_POST["staff_designation"]);
    $twitter = mysqli_real_escape_string($conn,$_POST["twitter"]);
    $facebook = mysqli_real_escape_string($conn,$_POST["facebook"]);
    $linkedin = mysqli_real_escape_string($conn,$_POST["linkedin"]);
    $instagram = mysqli_real_escape_string($conn,$_POST["instagram"]);
    
    // fetching old image from database 
    $dataFetch = "SELECT * from staff where id ='{$staff_id}'";
    $dataFetch_query = mysqli_query($conn,$dataFetch);
    $oldImage = " ";
    while ($row = mysqli_fetch_assoc($dataFetch_query)) {
         $oldImage = $row["image"];
    }

    $upload_status= false;
    if(isset($_FILES["image"])){
        $image = $_FILES["image"];
        $imageName = $image["name"];
        $imageTmp_name = $image["tmp_name"];
        $imageSize = $image["size"];
        $imageExtensionArray =["jpg","png","jpeg"];
        $imageEx = explode(".",$imageName);
        $imageExactExtension = strtolower(end($imageEx));
        $imageUniqueName = time().".".$imageName;
        
        $file = "../assets/images/ourStaff/".$oldImage;

        if($imageUniqueName != $oldImage){
            if(file_exists($file)){
                unlink($file);
        }
            if($imageSize > 2097152){
                $message = "Image should not be more than 2 mb";
            }elseif(in_array($imageExactExtension,$imageExtensionArray)){
                move_uploaded_file($imageTmp_name,"../assets/images/ourStaff/".$imageUniqueName);
                $upload_status = true;
            }else{
                $message = "Image not found";
            }
                
            }else{
            
        }
    
        }
//         staff_id
// staff_name
// staff_designation
// twitter
// facebook
// linkedin
// instagram
    
    if(empty($staff_name) || $upload_status == false || empty($twitter) || empty($facebook) || empty($linkedin) || empty($instagram)){
    $mes= "All field are required.";
    }else{
        $staffUpdateQuery = "UPDATE staff SET staff_name='{$staff_name}',image = '{$imageUniqueName}',twitter='{$twitter}',facebook='{$facebook}',linkedin='{$linkedin}',instagram = '{$instagram}' WHERE id = '{$staff_id}'";
        $staffUpdateQueryResult = mysqli_query($conn,$staffUpdateQuery)  ;
        if($staffUpdateQueryResult){
            $mes= "Data updateed Successfully";
        }else{
            $mes= "Data update Failed";
        }

}

header("Location: staffList.php?message= '{$mes}'" );

}


?>

