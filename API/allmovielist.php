<?php

include_once('../class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$startLimit = $_GET["startLimit"];
$endLimit = 10;
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');

$data = $users->allMovieList($startLimit,$endLimit);
	
$data = (object) array('data' => $data);
echo json_encode($data);

?>