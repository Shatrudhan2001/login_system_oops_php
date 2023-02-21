<?php 
session_start(); 
if(!isset($_SESSION['userdata'])){
    header("location: index.php");
    die();
}

$userId = $_SESSION['userdata']['id'];
require 'Functions.php';
$userObj = new Functions();
$user = $userObj->GetUser($userId);
$state = $userObj->getState('');
// echo '<pre>';
// print_r($state);die;
if($user['image'] != ''){
    $images = $user['image'];
}
else{
    $images = "assets/images/user_image.png";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Profile</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style>
            body{
                background: lightgray;
            }
            .profile-menu {
                .dropdown-menu {
                right: 0;
                left: unset;
                }
                .fa-fw {
                margin-right: 10px;
                }
            }
            .toggle-change {
                &::after {
                border-top: 0;
                border-bottom: 0.3em solid;
                }
            }
            .error{
                color: red;
            }
            .image-upload > input
            {
                display: none;
            }

            .image-upload img
            {
                cursor: pointer;
            }

  
        </style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span style="color: #ffff;"><?= $_SESSION['userdata']['name']; ?></span>
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sliders-h fa-fw"></i> My Account </a></li>
                            <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li> -->
                            <li>
                            <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                        </ul>
                        </li>
                    </ul>
                    </div>
                </div>
        </nav>

            <div class="container rounded bg-white mt-5">
                <form action="loginprocess.php" method="post" enctype="multipart/form-data" name="Myform">
                    <input type="hidden" value="<?php echo $user['id']; ?>" name="userId" ?>
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">                
                                <div class="image-upload">
                                    <label for="file-input">
                                        <img class="rounded-circle mt-5" src="<?php echo $images; ?>" width="90" /><br>
                                        <span class="font-weight-bold"><?php echo $user['name']; ?></span><br>
                                        <span class="text-black-50"><?php echo $user['email']; ?></span><br>
                                        <span><?php echo $user['country']; ?></span>
                                    </label>

                                    <input id="file-input" type="file" name="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back">
                                        <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                        <h6><a href="dashboard.php">Back to Dashboard</a></h6>
                                    </div>
                                    <h6 class="text-right">Edit Profile</h6>
                                </div>
                                <?php echo (isset($_SESSION['error'])) ? $_SESSION['error'] : ''; ?>
                                <?php echo (isset($_SESSION['success'])) ? $_SESSION['success'] : ''; ?>
                                <?php unset($_SESSION['error']); ?>
                                <?php unset($_SESSION['success']); ?>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="your name" value="<?php echo $user['name']; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="mobile">Mobile no.</label>
                                        <input type="text" class="form-control" name="mobile" value="<?php echo $user['mobile']; ?>" placeholder="Phone number" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="address" value="<?php echo $user['address']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="state">State</label>
                                        <select name="state" id="state" class="form-control form-select">
                                            <option value=""> Select </option>
                                            <?php 
                                            if($state != ''){
                                                foreach($state as $row){ ?>
                                                    <option value="<?php echo $row[0]; ?>" <?php if($user['state'] != ''){ echo ($user['state'] == $row[0]) ? 'selected' : '';} ?> > <?php echo $row[1]; ?>  </option>            
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name ="country" value="<?php echo $user['country']; ?>" placeholder="Country" />
                                        </div>
                                </div>
                            
                            
                                <div class="mt-5 text-right">
                                    <button class="btn btn-dark profile-button" name="editprofile" type="submit">Save Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<script>
    document.querySelectorAll(".dropdown-toggle").forEach((item) => {
        item.addEventListener("click", (event) => {
            if (event.target.classList.contains("dropdown-toggle")) {
            event.target.classList.toggle("toggle-change");
            } else if (
            event.target.parentElement.classList.contains("dropdown-toggle")
            ) {
            event.target.parentElement.classList.toggle("toggle-change");
            }
        });
    });

</script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/query.validate.min.js"></script>
<script src="assets/js/validation.js"></script>
