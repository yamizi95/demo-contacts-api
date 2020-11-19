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

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->name = $_GET['name'];
$item->age = $_GET['age'];
$item->height = $_GET['height'];
$item->email = $_GET['email'];
$item->numbers = $_GET['numbers'];
if($item->updatePeople()){
echo json_encode("People data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>