<?php 

// <!-- this is the where i am writing service update query  -->
// including config file 

// clients_name
// our_projects_designation
// client_image
// client_review
                                        

include "../includes/config.php";
if(isset($_POST["our_projects-save"])){
    $our_projects_id = mysqli_real_escape_string($conn,$_POST["our_projects_id"]);
    $category_id = mysqli_real_escape_string($conn,$_POST["category_id"]);
    $project_name = mysqli_real_escape_string($conn,$_POST["project_name"]);
    $project_link = mysqli_real_escape_string($conn,$_POST["project_link"]);
    // $client_review = mysqli_real_escape_string($conn,$_POST["client_review"]);

    // fetching old image from database 
    $dataFetch = "SELECT * from our_projects where id ='{$our_projects_id}'";
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
        
        $file = "../assets/images/projectThumb/".$oldImage;

        if($imageUniqueName != $oldImage){
            if(file_exists($file)){
                unlink($file);
        }
            if($imageSize > 2097152){
                $message = "Image should not be more than 2 mb";
                // echo "Image should not be more than 2 mb";
            }elseif(in_array($imageExactExtension,$imageExtensionArray)){
                move_uploaded_file($imageTmp_name,"../assets/images/projectThumb/".$imageUniqueName);
                $upload_status = true;
            }else{
                $message = "Image not found";
                // echo "Image not found";
            
            }
                
            }else{
            
        }
    
        }


    if(empty($category_id) || empty($project_name) || empty($project_link) || $upload_status == false){
    $mes= "All field are required.";
    }else{
        $our_projectsupdateQuery = "UPDATE our_projects SET category_id='{$category_id}', project_name='{$project_name}', project_link='{$project_link}',image = '{$imageUniqueName}' WHERE id = '{$our_projects_id}'";
        $our_projectsupdateQueryResult = mysqli_query($conn,$our_projectsupdateQuery)  ;
        if($our_projectsupdateQueryResult){
    
            $mes= "Data updateed Successfully";
            // echo "Data updateed Successfully";
        }else{
            $mes= "Data update Failed";
            // echo  "Data update Failed";
        }

}

header("Location: our_projectsList.php?message= '{$mes}'" );

}


?>

