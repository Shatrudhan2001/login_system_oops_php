<?php 
require('Class/Category.php'); 
$cateObject = new Category();

// add user
if(isset($_POST['addcategory'])){
    /* Unset empty array keys */
    foreach($_POST as $k => $v){
        if(trim($v) == null) { unset($_POST[$k]); }
    }
    $data = array();
     /* Update User Data */
    if(isset($_POST['id']) && $_POST['id'] != ''){
        $result = $cateObject->updateCategory($_POST);
        if($result == true){
            $data = array('message' => 'Record Updated Successfully', 'status' => true);
        }
        else{
            $data = array('message' => 'Record Not Updated', 'status' => false);
        }
    }
    else{
         /* Insert data */
        $result = $cateObject->addCategory($_POST);
        if($result == true){
            $data = array('message' => 'Category Added Successfully', 'status' => true);
        }
        else{
            $data = array('message' => 'Category Not Added', 'status' => false);
        }
    }
    echo json_encode($data);
}

if(isset($_POST['id']) && isset($_POST['editajaxRequest'])){
    $result = $cateObject->getCategory($_POST['id']);
    echo json_encode($result);
}

//  email address check..
if (isset($_POST['email'])) {
    $result = $cateObject->checkEmailId($_POST['email']);
    echo ($result == true) ? true : false;
}

//  Delete users
if(isset($_POST['id']) && isset($_POST['ajaxRequest'])){
    $result = $cateObject->deleteCategory($_POST['id']);
    echo ($result == true) ? true : false;
}

//  Delete users
if(isset($_POST['id']) && isset($_POST['status'])){
    $result = $cateObject->changeCategoryStatus($_POST['id'], $_POST['status']);
    echo ($result == true) ? true : false;
}

?>