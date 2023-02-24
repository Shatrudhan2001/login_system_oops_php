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
        <title>Login</title>
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
                <h2 class="text-center mb-4 text-primary">Login Form</h2>
                <?php echo (isset($_SESSION['not_found'])) ? $_SESSION['not_found'] : ''; ?>
                <?php unset($_SESSION['not_found']); ?>
                <form action="loginprocess.php" method="post" name="Myform">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        <?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?>
                        <?php unset($_SESSION['email']); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" name="password" id="exampleInputPassword1" />
                    </div>
                    <?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; ?>
                    <?php unset($_SESSION['password']); ?>
                    <div class="d-grid">
                        <button class="btn btn-primary" name="login" type="submit">Submit</button>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0 text-center">Don't have an account? <a href="register.php" class="text-primary fw-bold"> Sign Up</a></p>
                        <p class="mb-0 text-center">Forget Password <a href="foregetpassword.php" class="text-primary fw-bold"> click here </a></p>
                    </div>
                </form>
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/query.validate.min.js"></script>
        <script src="assets/js/validation.js"></script>
    </body>
</html>
