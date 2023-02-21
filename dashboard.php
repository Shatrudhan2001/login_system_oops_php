<?php 
session_start(); 
if(!isset($_SESSION['userdata'])){
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
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
  
        </style>
    </head>
    <body>
        <div class="container">
            <!-- <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        Welcome,
                        <?= $_SESSION['userdata']['name']; ?>
                    </a>
                    <h3 class="text-center">Dashbaord</h3>
                    <form class="d-flex">
                        <a href="logout.php" class="btn btn-outline-danger" type="submit">Logout</a>
                    </form>
                </div>
            </nav> -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
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
                            <li><a class="dropdown-item" href="editprofile.php"><i class="fas fa-sliders-h fa-fw"></i> My Account </a></li>
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
