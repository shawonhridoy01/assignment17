<?php 

// <!-- this is the where i am writing service update query  -->
// including config file 

// clients_name
// our_clients_designation
// client_image
// client_review
                                        

include "../includes/config.php";
if(isset($_POST["our_clients-update"])){
    $our_clients_id = mysqli_real_escape_string($conn,$_POST["our_clients_id"]);
    $clients_name = mysqli_real_escape_string($conn,$_POST["clients_name"]);
    $our_clients_designation = mysqli_real_escape_string($conn,$_POST["our_clients_designation"]);
    $client_review = mysqli_real_escape_string($conn,$_POST["client_review"]);

    // fetching old image from database 
    $dataFetch = "SELECT * from our_clients where id ='{$our_clients_id}'";
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
        
        $file = "../assets/images/clients/".$oldImage;

        if($imageUniqueName != $oldImage){
            if(file_exists($file)){
                unlink($file);
        }
            if($imageSize > 2097152){
                $message = "Image should not be more than 2 mb";
            }elseif(in_array($imageExactExtension,$imageExtensionArray)){
                move_uploaded_file($imageTmp_name,"../assets/images/clients/".$imageUniqueName);
                $upload_status = true;
            }else{
                $message = "Image not found";
            
            }
                
            }else{
            
        }
    
        }


    if(empty($clients_name) || empty($our_clients_designation) || empty($client_review) || $upload_status == false){
    $mes= "All field are required.";
    }else{
        $our_clientsupdateQuery = "UPDATE our_clients SET clients_name='{$clients_name}',image = '{$imageUniqueName}',client_review='{$client_review}' WHERE id = '{$our_clients_id}'";
        $our_clientsupdateQueryResult = mysqli_query($conn,$our_clientsupdateQuery)  ;
        if($our_clientsupdateQueryResult){
    
            $mes= "Data updateed Successfully";
            // echo "Data updateed Successfully";
        }else{
            $mes= "Data update Failed";
            // echo  "Data update Failed";
        }

}

header("Location: our_clientsList.php?message= '{$mes}'" );

}


?>

