<?php

session_start();
	$db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());
function errorThere()
{
	
}
set_error_handler("errorThere");
	
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
		<link rel="stylesheet" type="text/css" href="css/contact.css">
	
</head>
    <body>
		<?php
		include "header.php";
		
		?>
		<div id="main-body" class="container-fluid">
			<div id="content-body" class="container">
				<div class="big-header">contact</div>
				<div class="contact-description">Face any issues? Wish to contact our team? It is time to <b>connect</b>!!!</div>
				
				<div class="container" id="contact-container">
					<div class="col-sm-6">
						<h4><i>Our Team</i></h4>
						<b>Karthik Subramanya</b><br>
						<b>Rushali Saxena</b><br>
						<b>Greeshma</b><br>						
						<b>Gowtham Chitipolu</b><br>
						<b>Sai Praneeth Maddi</b><br>
						<br>
						
						
					
					</div>
					<div class="col-sm-6">
						<form id="form" method="GET" action="contact.php">
							
							
							<input class="text-box" type="text" name="name" value="name">
							
							<input class="text-box" type="text" name="email" value="email">
							<input class="text-box" type="text" name="subject" value="subject">
							<input id="message-box" class="text-box" type="textbox" name="message" value="message">	
							<input  class="btn btn-sm" type="submit" name="submit_btn" value="SUBMIT">
							<input  class="btn btn-sm" type="submit" name="submit_btn" value="RESET">
							
							
						
						
						</form>
						<h1>
							<?php
							
							if ($_GET["submit_btn"] == "SUBMIT")
							{
								$name = $_GET["name"];
								$email = $_GET["email"];
								$subject = $_GET["subject"];
								$message = $_GET["message"];
								$new_message = "INSERT INTO contactus(name,subject,email,message) VALUES('$name','$subject','$email','$message') ";
        mysqli_query($db,$new_message) or die("Trouble sending message".mysql_error());
								$_GET["submit_btn"] = NULL;
								echo "Your response has been recorded!";
							}
							
							
							
							?></h1>
					
					
					</div>
					<div class="clearfix"></div>				
				
				
				</div>
				
				
			</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
	</body>
</html>
