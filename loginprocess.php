<?php
session_start();

require 'Functions.php';

// Object creation
$userObj = new Functions();

//  Login
if (isset($_POST['login'])) {
    if ($_POST['email'] == '') {
        $_SESSION['email'] = '<span style="color: red">Email address is Required!</span>';
    }
    if ($_POST['password'] == '') {
        $_SESSION['password'] = '<span style="color: red">Password is Required!</span>';
    }

    if (!empty($_SESSION)) {
        header("location: index.php");
        die();
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $userObj->LoginUser($email, $password); // calling login fun
        if ($result == true) {
            header('location: dashboard.php');
            die();
        } else {
            $_SESSION['not_found'] = '<div class="alert alert-danger text-center">Wrong Crendential!</div>';
            header("location: index.php");
            die();
        }
    }
}

// Register
if (isset($_POST['register'])) {
    if ($_POST['name'] == '') {
        $_SESSION['name'] = '<span style="color: red">Name is Required!</span>'; // echo $sql;
    }
    if ($_POST['mobile'] == '') {
        $_SESSION['mobile'] = '<span style="color: red">Mobile is Required!</span>';
    }
    if ($_POST['email'] == '') {
        $_SESSION['email'] = '<span style="color: red">Email address is Required!</span>';
    }
    if ($_POST['password'] == '') {
        $_SESSION['password'] = '<span style="color: red">Password is Required!</span>';
    }
    if (!empty($_SESSION)) {
        header("location: register.php");
        die();
    } else {
        $result = $userObj->Registration($_POST); // calling Registraion fun
        if ($result == true) {
            $_SESSION['success'] = '<div class="alert alert-success">Registration successfully! <a href="index.php">login here</a></div>';
            header('location: register.php');
            die();
        } else {
            $_SESSION['error'] = '<div class="alert alert-danger">Failed!</div>';
            header("location: register.php");
            die();
        }
    }
}

//  Reset password
if (isset($_POST['resetpassword'])) {
    if ($_POST['email'] == '') {
        $_SESSION['email'] = '<span style="color: red">Email address is Required!</span>';
    }
    if ($_POST['password'] == '') {
        $_SESSION['password'] = '<span style="color: red">Password is Required!</span>';
    }
    if ($_POST['cpassword'] == '') {
        $_SESSION['cpassword'] = '<span style="color: red">Confirm Password is Required!</span>';
    }

    if ($_POST['password'] != $_POST['cpassword']) {
        $_SESSION['error'] = '<div class="alert alert-danger text-center">Password not matched</div>';
    }

    if (!empty($_SESSION)) {
        header("location: foregetpassword.php");
        die();
    } else {
        $result = $userObj->ResetPassword($_POST['email'], $_POST['password']); // Calling reset password fun
        if ($result == true) {
            $_SESSION['success'] = '<div class="alert alert-success">Password reset successfully! <a href="index.php"> Login here</a></div>';
            header('location: foregetpassword.php');
            die();
        } else {
            $_SESSION['error'] = '<div class="alert alert-danger text-center">Failed.</div>';
            header("location: foregetpassword.php");
            die();
        }
    }
}

//  Edit profile
if (isset($_POST['editprofile'])) {
    unset($_POST['editprofile']);

    if (!empty($_FILES['image']['name'])) {
        $folderName = "assets/uploads";
        $imagesResults = imageUploads($_FILES, $folderName); // image uploading fun
        if ($imagesResults['status'] == false) {
            $_SESSION['error'] = '<div class="alert alert-danger text-center">' . $imagesResults['msg'] . ' </div>';
            header('location: editprofile.php');
            die();
        } else {
            $_POST['image'] = $imagesResults['imageName'];
        }
    }

    $result = $userObj->UpdateProfile($_POST); // Calling update profile

    if ($result == true) {
        $_SESSION['success'] = '<div class="alert alert-success text-center"><b>Profile updated successfully!</b></div>';
        header('location: editprofile.php');
        die();
    } else {
        $_SESSION['error'] = '<div class="alert alert-danger text-center"> Failed .</div>';
        header("location: editprofile.php");
        die();
    }
}

// Image uploads function
function imageUploads($imageData, $folderName)
{
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
        die();
    } elseif ($fileSize > 2097152) {
        return ["status" => false, "msg" => "File size must be less or equal 2 MB"];
        die();
    } else {
        move_uploaded_file($fileTemp, $folderName . "/" . $newFileName);
        return ["status" => true, "imageName" => $folderName . "/" . $newFileName];
    }
}

header("location: index.php");
?>
