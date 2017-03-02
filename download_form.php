<?php
session_start();


$db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to database".mysql_error());

function error_found(){
  header("Location: signuprush.php");
}
set_error_handler('error_found');
if ($_SESSION["loggedin"] === "no")
{
	header("Location: login.php");
}
else
{
	$_SESSION["loggedin"] = "yes";
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
				
				
					<form align="left" id="form" action="download.php" method="post" enctype="multipart/form-data">
		<div class="form-content">
						<div align="center" style="margin-bottom: 30px;">
							<span class="glyphicon glyphicon-download"></span> 
							<h1>Download</h1>
						</div>
    
					<div class="form-group">
                		<label>Choose File to Download:</label>
						<select name="file_name">
						<?php
							
								$course_rows = "SELECT file_name FROM files";
			$result = $db->query($course_rows);
			while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["file_name"].'">'.$row["file_name"].'</option>';
			}

								?>
	
			
	</select>
					</div>
	
   <div class="form-group">	
                <input  class="btn btn-md" type="submit" name="submit" value="Download File">
					</div>
					</div>
				</form>
				
			</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
	</body>
</html>
