<?php  
    session_start();
    if(isset($_SESSION['userdata'])){
        header("location: dashboard.php");
        die();
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            .error {
                color: red;
            }
        </style>
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
                <h2 class="text-center mb-4 text-primary">Registration Form</h2>
                <?php echo (isset($_SESSION['error'])) ? $_SESSION['error'] : ''; ?>
                <?php echo (isset($_SESSION['success'])) ? $_SESSION['success'] : ''; ?>
                <?php unset($_SESSION['error']); ?>
                <?php unset($_SESSION['success']); ?>
                <form action="loginprocess.php" method="post" name="Myform">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-primary" id="name" aria-describedby="emailHelp" />
                        <?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : ''; ?>
                        <?php unset($_SESSION['name']); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control border border-primary" id="email" aria-describedby="emailHelp" onblur="checkEmailId(this.value)" />
                        <?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?>
                        <?php unset($_SESSION['email']); ?>
                        <div id="emailError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control border border-primary" id="mobile" aria-describedby="emailHelp" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                        <?php echo (isset($_SESSION['mobile'])) ? $_SESSION['mobile'] : ''; ?>
                        <?php unset($_SESSION['mobile']); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" name="password" id="password" />
                    </div>
                    <?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; ?>
                    <?php unset($_SESSION['password']); ?>
                    <div class="d-grid">
                        <button class="btn btn-primary" id="registerbtn" name="register" type="submit">Submit</button>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0 text-center">Already an account? <a href="index.php" class="text-primary fw-bold">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>

        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/query.validate.min.js"></script>
        <script src="assets/js/validation.js"></script>
        <script src="assets/js/myajax.js"></script>
    </body>
</html>
