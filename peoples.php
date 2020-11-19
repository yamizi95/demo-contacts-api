<?php
class People{
// dbection
private $db;
// Table
private $db_table = "people";
// Columns
public $id;
public $name;
public $age;
public $height;
public $email;
public $numbers;
public $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getPeoples(){
$sqlQuery = "SELECT id, name, age, height, email, numbers FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createPeople(){
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->age=htmlspecialchars(strip_tags($this->age));
    $this->height=htmlspecialchars(strip_tags($this->height));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->numbers=htmlspecialchars(strip_tags($this->numbers));
    $sqlQuery = "INSERT INTO
    ". $this->db_table ." 
    SET 
        name = '".$this->name."',
        age = '".$this->age."', 
        height = '".$this->height."', 
        email = '".$this->email."', 
        numbers = '".$this->numbers."'";

    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
        return true;
    }
    return false;
}

// UPDATE
public function getSinglePeople(){
$sqlQuery = "SELECT id, name, age, height, email, numbers FROM ". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->name = $dataRow['name'];
$this->age = $dataRow['age'];
$this->height = $dataRow['height'];
$this->email = $dataRow['email'];
$this->numbers = $dataRow['numbers'];
}

// UPDATE
public function updatePeople(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->age=htmlspecialchars(strip_tags($this->age));
$this->height=htmlspecialchars(strip_tags($this->height));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->numbers=htmlspecialchars(strip_tags($this->numbers));
$this->id=htmlspecialchars(strip_tags($this->id));

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."', age = '".$this->age."',height = '".$this->height."', email = '".$this->email."',numbers = '".$this->numbers."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deletePeople(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>