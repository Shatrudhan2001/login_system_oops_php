<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'my_db');
class Category
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
	public function totalUsers(){
        return $this->db->query("SELECT id FROM users")->num_rows;
	}

	//add category
	public function addCategory($posted){
        $data = array();
        foreach($posted as $key => $val){
            $data[$key] = $this->db->real_escape_string($val);
        }
        $data['slug']       = str_replace([' ','-',"'"],['_','_',''],strtolower($data['name']));
        $tableColumn        = array_keys($data);
        $tableValues        = array_values($data);
        $sql = "INSERT INTO `tbl_category` ( ".implode(' , ', $tableColumn).") VALUES ('".implode("' , '", $tableValues)."')";
        return $this->db->query($sql);
	}

    // Update profile 
    public function updateCategory($posted){
        $id = $posted['id'];
        unset($posted['id']);
        $data = array();
        $posted['slug']       = str_replace([' ','-',"'"],['_','_',''],strtolower($posted['name']));
        foreach($posted as $key => $val){
            $value = $this->db->real_escape_string($val);
            $data[] =  "$key = '$value'";
        }
        $sql = "UPDATE `tbl_category` set " . implode(', ', $data) . " WHERE id = '" . $id . "'";
        return $this->db->query($sql);
    }

    // get All Users
    public function getCategory($id = ''){
        if($id != ""){
            $query = $this->db->query("SELECT * FROM `tbl_category` WHERE id = '".$id."'");
        }
        else{
            $query = $this->db->query("SELECT * FROM `tbl_category` ORDER BY id DESC");
        }
        
        if($query->num_rows > 0){
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    // delete users
    public function deleteCategory($id){
        return $this->db->query("DELETE FROM tbl_category WHERE id = '".$id."'");
    }

    // Change Category status
    public function changeCategoryStatus($id, $status){
        $posted = array();
        $posted = ($status == 1) ? ['status' => 0] : ['status' => 1];
        $data = array();
        foreach($posted as $key => $val){
            $value = $this->db->real_escape_string($val);
            $data[] =  "$key = '$value'";
        }
        $sql = "UPDATE `tbl_category` set " . implode(', ', $data) . " WHERE id = '" . $id . "'";
        return $this->db->query($sql);
    }
}

?>