<?php

include_once('../class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$username = $_GET["username"];
$password = $_GET["password"];
$firstName = $_GET["firstName"];
$middleName = $_GET["middleName"];
$lastName = $_GET["lastName"];
$mobileNumber = $_GET["mobileNumber"];

session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials', 'Content-Type');
header('Content-Type: application/json');

$loginCheck = $users->LoginUser($username,$password);

if($loginCheck == 1){

	$data = (object) array('register' => 0,'message' => 'Username already in use');
	echo json_encode($data);
}else{

	$register = $users->registerUsers($username,$password,$firstName,$middleName,$lastName,$mobileNumber);
	$data = (object) array('register' => 1);
	echo json_encode($data);

	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;

	
}
?>