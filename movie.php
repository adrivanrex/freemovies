<?php

$id = $_GET['id'];

$filetypes = ["mkv","mp4"];

foreach ($filetypes as $v) {

$filename = "movies/".$id."/play.".$v."";

if (file_exists($filename)) {
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
		  <source src="<?php echo $filename;?>" type="video/mp4">
		  	


		  Your browser does not support HTML5 video.
		</video>

		</body> 
		</html>
    <?php
} else {
   
}
}


?>

