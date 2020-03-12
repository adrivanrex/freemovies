<?php
include_once('../class.manageUsers.php');
session_start();
//upload.php
$title = $_POST["title"];
$logo = $_POST['logo'];
$description = $_POST["description"];
$category = $_POST["category"];

$users = new ManageUsers();



if(!empty($_FILES))
{
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];

	
		$file_type = $_FILES['uploadFile']['type']; //returns the mimetype

		$allowed = array("image/jpeg", "image/gif", "application/pdf");
		if(!in_array($file_type, $allowed)) {
		  $error_message = 'Only jpg, gif, and pdf files are allowed.';
		  $error = 'yes';
		}

		$target_path = '../upload/'.$newfilename = round(microtime(true)) .'' . $_FILES['uploadFile']['name'];
		if(move_uploaded_file($source_path, $target_path))
		{
			//echo '<img src="'.$target_path.'" class="img-thumbnail" width="300" height="250" />';
			echo "Success";
		}
	}

	if($_SESSION["username"]){
	$user = $_SESSION["username"];
	$users->addMovie($title,$logo,$description,$category,$user,$newfilename);
}


}

?>