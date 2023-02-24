<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'my_db');
class Admin
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
	public function adminLogin($posted){
        $email      = $this->db->real_escape_string($posted['email']);
        $password   = $this->db->real_escape_string($posted['password']);
        $query = $this->db->query("SELECT * FROM users WHERE email = '".$email."' and password = '".md5($password)."'");
        if($query->num_rows > 0){
            $_SESSION['isAdmin'] = $query->fetch_assoc();
            return true;
        }
	}

    //Login
	public function totalUsers(){
        return $this->db->query("SELECT id FROM users")->num_rows;
	}

	//add New user
	public function addUsers($posted){
        $data = array();
        foreach($posted as $key => $val){
            $data[$key] = $this->db->real_escape_string($val);
        }
        $data['password_view']  = $data['password'];
        $data['password']       = md5($data['password']);
        $tableColumn            = array_keys($data);
        $tableValues            = array_values($data);
        $sql = "INSERT INTO `users` ( ".implode(' , ', $tableColumn).") VALUES ('".implode("' , '", $tableValues)."')";
        return $this->db->query($sql);
	}

    // Update profile 
    public function udateUsers($posted){
        $userId = $posted['userId'];
        unset($posted['userId']);
        $data = array();
        foreach($posted as $key => $val){
            $value = $this->db->real_escape_string($val);
            $data[] =  "$key = '$value'";
        }
        $sql = "UPDATE `users` set " . implode(', ', $data) . " WHERE id = '" . $userId . "'";
        return $this->db->query($sql);
    }

    //Reset Password
	public function resetPassword($email, $password){
        $email      = $this->db->real_escape_string($email);
        $password   = $this->db->real_escape_string($password); 
		$query = $this->db->query("UPDATE users SET password = '".md5($password)."', password_view = '".$password."' WHERE email = '".$email."'");
        if($query == true){
            return true;
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


    // get All Users
    public function getUsers($userId = ''){
        if($userId != ""){
            $query = $this->db->query("SELECT users.*, s.state_name FROM `users` LEFT JOIN states as s ON s.id = users.state WHERE users.id = '".$userId."'");
        }
        else{
            $query = $this->db->query("SELECT users.*, s.state_name FROM `users` LEFT JOIN states as s ON s.id = users.state ORDER BY users.id DESC");
        }
        
        if($query->num_rows > 0){
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }


    // delete users
    public function deleteUsers($userId){
        return $this->db->query("DELETE FROM users WHERE id = '".$userId."'");
    }

    //  check user email id exist or not.
    public function checkEmailId($email){
      return $this->db->query("SELECT * FROM users WHERE email = '".$email."'")->num_rows;
    }
    
}

?>
