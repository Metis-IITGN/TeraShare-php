<?php
session_start();


$db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to database".mysql_error());

/*function error_found(){
  header("Location: signuprush.php");
}
set_error_handler('error_found');*/
if ($_SESSION["loggedin"] === "no")
{
    echo "You are not logged in";
}
else
{
	$file_name = $_POST["file_name"];
		
	$course_rows = "SELECT * FROM files WHERE file_name = ".$file_name;
	$result = $db->query($course_rows);
	$folder = $result["folder"];
	$target_dir = "uploads/".$folder."/";
	$target_file=$target_dir.$file_name;
	$uploadOk = 1;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	header("content-Disposition: attachment; filename = ".$target_file."");
	header("content-type:application/octent-strem");
	header("content-length=".filesize($target_file));
	readfile($target_file);

}

?>