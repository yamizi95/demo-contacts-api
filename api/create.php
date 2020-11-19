<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../peoples.php';
$database = new Database();
$db = $database->getConnection();
$item = new People($db);


$item->name = $_GET['name'];
$item->age = $_GET['age'];
$item->height = $_GET['height'];
$item->email = $_GET['email'];
$item->numbers = $_GET['numbers'];
if($item->createPeople()){
echo 'People created successfully.';
} else{
echo 'People could not be created.';
}
?>