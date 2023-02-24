<?php 
require('Class/Product.php'); 
$productObject = new Product();

// add user
if(isset($_POST['addprdocut'])){

     /* File upload start */
     if (!empty($_FILES['image']['name'])) {
        $folderName = "assets/uploads";
        $imagesResults = imageUploads($_FILES, $folderName);
        if ($imagesResults['status'] == false) {
            echo json_encode(['message' => $imagesResults['msg'], 'status' => false]); die();
        } else {
            $_POST['image'] = $imagesResults['imageName'];
        }
    }
    /* File upload end */

    /* Unset empty array keys */
    foreach($_POST as $k => $v){
        if(trim($v) == null) { unset($_POST[$k]); }
    }
    $data = array();
     /* Update User Data */
    if(isset($_POST['id']) && $_POST['id'] != ''){
        $result = $productObject->updateProduct($_POST);
        if($result == true){
            $data = array('message' => 'Record Updated Successfully', 'status' => true);
        }
        else{
            $data = array('message' => 'Record Not Updated', 'status' => false);
        }
    }
    else{
         /* Insert data */
        $result = $productObject->addProduct($_POST);
        if($result == true){
            $data = array('message' => 'Product Added Successfully', 'status' => true);
        }
        else{
            $data = array('message' => 'Product Not Added', 'status' => false);
        }
    }
    echo json_encode($data);
}

if(isset($_POST['id']) && isset($_POST['editajaxRequest'])){
    $result = $productObject->getProduct($_POST['id']);
    echo json_encode($result);
}

//  email address check..
if (isset($_POST['email'])) {
    $result = $productObject->checkEmailId($_POST['email']);
    echo ($result == true) ? true : false;
}

//  Delete users
if(isset($_POST['id']) && isset($_POST['ajaxRequest'])){
    $result = $productObject->deleteProduct($_POST['id']);
    echo ($result == true) ? true : false;
}

//  Delete users
if(isset($_POST['id']) && isset($_POST['status'])){
    $result = $productObject->changeStatus($_POST['id'], $_POST['status']);
    echo ($result == true) ? true : false;
}

if(isset($_GET['category'])){
    $result = $productObject->getCategory('');
    while($result)
    echo json_encode($result);
}


// Image uploads function
function imageUploads($imageData, $folderName){
    $fileName = $imageData["image"]["name"];
    $fileSize = $imageData["image"]["size"];
    $fileType = $imageData["image"]["type"];
    $fileTemp = $imageData["image"]["tmp_name"];
    $file_Ext = explode('.', strtolower($fileName));
    $file_Ext = end($file_Ext);
    $newFileName = date("Ymd") . time() . "." . $file_Ext;
    $extensions = ["jpeg", "jpg", "png"];
    if (in_array($file_Ext, $extensions) === false) {
        return ["status" => false, "msg" => "Please choose a JPEG or PNG file."];
    } elseif ($fileSize > 2097152) {
        return ["status" => false, "msg" => "File size must be less or equal 2 MB"];
    } else {
        move_uploaded_file($fileTemp, $folderName . "/" . $newFileName);
        return ["status" => true, "imageName" => $folderName . "/" . $newFileName];
    }
}
?>