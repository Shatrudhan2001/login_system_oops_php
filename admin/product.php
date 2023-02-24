
<?php 
require('Class/Product.php'); 

$productObject = new Product();
$products = $productObject->getProduct('');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Products </title>
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
              <h6>Products<button type="button" class="btn btn-success" style="float:right;" onclick = "addButtonEffect()"> Add + </button></h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="usersTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Images</th>
                      <th>Product name</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Price</th>
                      <th>created on</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $serialNo = 1;
                    foreach($products as $row){ 
                      $imagesUrl = ($row['image'] != '') ? $row['image'] : 'assets/img/user_image.png';

                    $productStatus = '';
                    if($row['status'] == 1){
                      $productStatus = '<button class="btn btn-success" onclick="changeStatus('.$row['status'].','.$row['id'].')">Active</button>';
                    }
                    else{
                      $productStatus = '<button class="btn btn-warning" onclick="changeStatus('.$row['status'].','.$row['id'].')">In Active</button>';
                    }
                    
                    ?>
                    <tr id="<?php echo $row['id'] ?>">
                        <td><?php echo $serialNo++; ?></td>
                        <td><img src="<?php echo $imagesUrl; ?>" class="avatar avatar-sm me-3" alt="user1"></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $productStatus; ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['craeted_on'] ?></td>
                        <td>
                          <button class="btn btn-success" type="button" onclick="editProduct(<?php echo $row['id'] ?>)"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger" type="button" onclick="deleteProduct(<?php echo $row['id'] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
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

      <div class="modal fade" id="productmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHeading"></h5>
                    <button type="button" class="btn-close btn-danger active" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="productajax.php" method="post" name="myForm" id="myForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control border border-primary" id="name" aria-describedby="emailHelp" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control border border-primary" id="price" aria-describedby="emailHelp" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category</label>
                            <select name="category" class="form-control border border-primary" id="category" aria-describedby="emailHelp" ></select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control border border-primary"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Photo</label>
                          <input type="file" name="image" class="form-control border border-primary" id="image"/>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="addprdocut" id="addproductbtn" class="btn btn-success">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


      <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="assets/js/product.js"></script>
      <script>
        $(document).ready( function () {
          $('#usersTable').DataTable();
      } );

      </script>
</body>

</html>