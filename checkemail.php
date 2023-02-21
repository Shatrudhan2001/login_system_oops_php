<?php
$conn =  mysqli_connect('localhost','root','','my_db') or die('Connection is failed '. mysqli_connect_error());

//  email address check..
if (isset($_POST['email'])) {
    $query = $conn->query("SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");
    if ($query->num_rows > 0) {
        echo true;
    } else {
        echo false;
    }
}
?>