<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php require('header.php'); ?>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  <?php require('left_menu.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php require('top_navbar.php'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Users<button type="button" class="btn btn-success" style="float:right;" onclick = "addButtonEffect()"> Add + </button></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="usersTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>State</th>    
                      <!-- <th>Country</th> -->
                      <th>Registred On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $serialNo = 1;
                    foreach($users as $user){ 
                      $imagesUrl = ($user['image'] != '') ? $user['image'] : 'assets/img/user_image.png';
                    
                    ?>
                    <tr id="<?php echo $user['id'] ?>">
                        <td><?php echo $serialNo++; ?></td>
                        <td><img src="<?php echo $imagesUrl; ?>" class="avatar avatar-sm me-3" alt="user1"></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['mobile'] ?></td>
                        <td><?php echo $user['address'] ?></td>
                        <td><?php echo $user['state'] ?></td>
                        <td><?php echo $user['created'] ?></td>
                        <!-- <td><?php echo $user['country'] ?></td> -->
                        <td>
                          <button class="btn btn-success" type="button" onclick="editUser(<?php echo $user['id'] ?>)"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger" type="button" onclick="deleteUser(<?php echo $user['id'] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <?php require('footer.php'); ?>
      <?php include('model.php'); ?>
      <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="assets/js/users.js"></script>
      <script>
        $(document).ready( function () {
          $('#usersTable').DataTable();
      } );

      </script>
</body>

</html>