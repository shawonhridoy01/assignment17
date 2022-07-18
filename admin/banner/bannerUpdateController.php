<?php 
include "../includes/config.php";
if(isset($_POST["update_btn"])){



    $id = mysqli_real_escape_string($conn,$_POST["id"]);
    // fetching old image from database 
    $dataFetch = "SELECT * from banner where id ='{$id}'";
    $dataFetch_query = mysqli_query($conn, $dataFetch);
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
        
        $file = "../assets/images/banner/".$oldImage;

        if($imageUniqueName != $oldImage){
            if(file_exists($file)){
                unlink($file);
        }
            if($imageSize > 2097152){
                $message = "Image should not be more than 2 mb";
            }elseif(in_array($imageExactExtension,$imageExtensionArray)){
                move_uploaded_file($imageTmp_name,"../assets/images/banner/".$imageUniqueName);
                $upload_status = true;
            }else{
                $message = "Image not found";
            
            }
                
            }else{
            
        }
    
        }
    

    // $id = mysqli_real_escape_string($conn,$_POST["id"]);
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $sub_title = mysqli_real_escape_string($conn,$_POST["sub_title"]);
    $details = mysqli_real_escape_string($conn,$_POST["details"]);

    


    if(empty($title) || empty($sub_title) || empty($details) || $upload_status == false){
        $message= "All Field Are Required";
        
        
}else{

    $updateQuery = "UPDATE banner SET title='{$title}',sub_title='{$sub_title}',details='{$details}',image='{$imageUniqueName}' where id = '{$id}'" ;
    $updateQueryResult = mysqli_query($conn,$updateQuery);
        if($updateQueryResult){
            $message= "Data Has been updated Successful";
        
             
        }
    }
    header("location:http://localhost/php/project/admin/banner/banners.php?msg={$message}");

}
