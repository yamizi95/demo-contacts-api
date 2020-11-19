<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../peoples.php';
$database = new Database();

$db = $database->getConnection();
$items = new People($db);
$records = $items->getPeoples();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$peopleArr = array();
$peopleArr["body"] = array();
$peopleArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($peopleArr["body"], $row);
}
echo json_encode($peopleArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>