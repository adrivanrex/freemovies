<?php
include_once('class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');

$users = new ManageUsers();
$id = $_GET["id"];
$searchMovie = $users->searchMovie($id);
//var_dump($searchMovie);
$filename = $searchMovie[0]["filename"];
?>
<!DOCTYPE html> 
		<html> 
		<style>
		#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

</style>

<body> 

		<video width="400" controls autoplay id="myVideo">
		  <source src="upload/<?php echo $filename;?>" type="video/mp4">
		  	


		  Your browser does not support HTML5 video.
		</video>

		</body> 
</html>