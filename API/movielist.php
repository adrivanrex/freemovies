<?php

include_once('../class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$title = $_GET["title"];
$startLimit = $_GET["startLimit"];
$endLimit = $_GET["endLimit"];

session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');

$data = $users->movieList($title,$startLimit,$endLimit);
	
$data = (object) array('data' => $data);
echo json_encode($data);

?>