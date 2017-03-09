<?php
session_start();

$_SESSION["message"];
$db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to database".mysql_error());

function error_found(){
  header("Location: signuprush.php");
}
set_error_handler('error_found');
if ($_SESSION["loggedin"] === "no")
{
    $_SESSION["message"] = "Login to proceed!";
	header("Location: login.php");
}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">

	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<title>TeraShare</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/upload.css">
	
</head>
    <body>
		<?php
		include "header.php";
		
		?>
		<div id="main-body" class="container-fluid" style="background-color: #44B9EF;">
			<div id="content-body" class="container" align="center">
				
				
					<form align="left" id="form" action="upload.php" method="post" enctype="multipart/form-data">
					
					<div class="form-content">
						<div align="center" style="margin-bottom: 30px;">
							<span class="glyphicon glyphicon-upload"></span> 
							<h1>Upload</h1>
						</div>
						<div class="form-group">
                		<label>Choose Course Initials:</label> <select name="course_initials">
						<?php
							
						$course_rows = "SELECT initials FROM course_initials";
						$result = $db->query($course_rows);
						while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row["initials"].'">'.$row["initials"].'</option>';
						}

						?>
	
			
	</select>
					</div>
					<div class="form-group">
                		<label>Enter Course Code Number:</label> <input class="form-control" type="text" name="course_code" placeholder="Eg: 221" required>
					</div>
						
						<div class="form-group">	
                <label>Enter File Description:</label> <input class="form-control" type="textbox" name="description" placeholder="Eg: Ebook to read in year 2016" required>
					</div>
						
    <div class="form-group">
						<label>Choose file:</label>
						<input type="file" name="fileToUpload" id="fileToUpload" required>
						<!--<a id="red-link" href="">Choose File</a>-->	
					</div>
								
					<div class="form-group">	
                <input  class="btn btn-md" type="submit" name="submit_btn" value="Upload">
					</div>
					</div>
				</form>
				<?php if (isset($_SESSION["message"]))
{
	echo "<h5>".$_SESSION["message"]."</h5>";
	$_SESSION["message"] = NULL;
}
				?>
				
			</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
			/*$(function(){
    $("#red-link").on('click', function(e){
        e.preventDefault();
        $("#fileToUpload:hidden").trigger('click');
    });
});*/
		
		</script>
		
	</body>
</html>
