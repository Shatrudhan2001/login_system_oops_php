<?php  
    session_start();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password </title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .error{ color: red;}
  </style>
</head>

<body>
  <div class="vh-100 d-flex justify-content-center align-items-center ">
    <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
      <h2 class="text-center mb-4 text-primary">Reset Password</h2>
      <?php echo (isset($_SESSION['error'])) ? $_SESSION['error'] : ''; ?>
      <?php echo (isset($_SESSION['success'])) ? $_SESSION['success'] : ''; ?>
      <?php unset($_SESSION['error']); ?>
      <?php unset($_SESSION['success']); ?>
      <form action="loginprocess.php" method="post" name="Myform" onSubmit="return validate()"> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp" onblur="checkEmailId(this.value)">
          <?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?>
          <?php unset($_SESSION['email']); ?>
          <div id="emailEr"></div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Create Password</label>
          <input type="password" class="form-control border border-primary" name="password" id="password">
           <?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; ?>
           <?php unset($_SESSION['password']); ?>
        </div>
        <div class="mb-3">
          <label for="cpassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control border border-primary" name="cpassword" id="cpassword">
          <?php echo (isset($_SESSION['cpassword'])) ? $_SESSION['cpassword'] : ''; ?>
        <?php unset($_SESSION['cpassword']); ?>
        </div>
        <div id="passErr"></div>
        
        <div class="d-grid">
          <button class="btn btn-primary" id="regbutton2" name="resetpassword" type="submit">Submit</button>
        </div>
        <div class="mt-3">
        <a href="index.php" class="text-primary fw-bold"> Login </a>
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