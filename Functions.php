<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'my_db');
class Functions
{
    function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->db = $con;
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to Database: " . mysqli_connect_error();
        }
    }

    //Login
	public function LoginUser($email, $password){
        $email      = $this->db->real_escape_string($email);
        $password   = $this->db->real_escape_string($password);
		$query = $this->db->query("SELECT * FROM users WHERE email = '".$email."' and password = '".md5($password)."'");
        if($query->num_rows > 0){
            $_SESSION['userdata'] = $query->fetch_assoc();
            return true;
        }
	}

	//Registration
	public function Registration($posted){
		$name           = $this->db->real_escape_string($posted['name']);
        $email          = $this->db->real_escape_string($posted['email']);
        $mobile         = $this->db->real_escape_string($posted['mobile']);
        $password       = $this->db->real_escape_string($posted['password']);
        $sql = "INSERT INTO users(name, email, mobile, password, password_view) VALUES('".$name."', '".$email."', '".$mobile."', '".md5($password)."', '".($password)."')";
        // echo $sql;
        $query = $this->db->query($sql);
        if($query == true){
            return true;
        }
	}

    //Reset Password
	public function ResetPassword($email, $password){
        $email      = $this->db->real_escape_string($email);
        $password   = $this->db->real_escape_string($password); 
		$query = $this->db->query("UPDATE users SET password = '".md5($password)."', password_view = '".$password."' WHERE email = '".$email."'");
        if($query == true){
            return true;
        }
	}

    // Get User profile
    public function GetUser($userId){
        $query = $this->db->query("SELECT * FROM users WHERE id = '".$userId."'");
        if($query->num_rows > 0){
            return $query->fetch_assoc();
        }
    }


    // Get State
    public function getState($stateId = ''){
        $query = '';
        if($stateId != ''){
            $query .= " WHERE id = '".$stateId."'";
        }
        $query = $this->db->query("SELECT * FROM states".$query);
        if($query->num_rows > 0){
            return $query->fetch_all();
        }
    }

    // Update profile 
    public function UpdateProfile($posted){
        $name    =  $this->db->real_escape_string($posted['name']);
        $email   =  $this->db->real_escape_string($posted['email']);
        $mobile  =  $this->db->real_escape_string($posted['mobile']);
        $address =  $this->db->real_escape_string($posted['address']);
        $state   =  $this->db->real_escape_string($posted['state']);
        $country =  $this->db->real_escape_string($posted['country']);

        $sql = "UPDATE users SET name = '".$name."', email = '".$email."', mobile = '".$mobile."', address = '".$address."', state = '".$state."', country = '".$country."'";
        
        if(isset($posted['image'])){
            $sql .= ", image = '".$posted['image']."'";
        }

        $query = $this->db->query($sql. " WHERE id = '".$posted['userId']."'");
        if($query == true){
            return true;
        }
    }
}

?>
