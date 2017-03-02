<?php
    session_start();
    //connecting to database
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());

$_SESSION["email"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["emailexists"] = NULL;
$_SESSION["loggedin"] = "no";
$_SESSION["message"] = NULL;

if (isset($_POST["submit_btn"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;        
        
    
        $rows = mysqli_query($db,"SELECT * FROM registered_users WHERE email='$email' and password='$password'");
        $num = mysqli_num_rows($rows);
        if (!($num > 0))
        {
            $_SESSION["emailexists"] = "NO";
		$_SESSION["loggedin"] = "no";
        }
        else
        {
			$_SESSION["emailexists"] = "YES";    
        $_SESSION["loggedin"] = "yes";
        header("Location: download_form.php");
        }
  
             
    }

    
       
?>




<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<title>TeraShare</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	
</head>
    <body>
		<?php
		include "header.php";
		
		?>

<div id="main-body" class="container-fluid" style="background-color: #44B9EF;">
			<div id="content-body" class="container" align="center">

	<form align="left" id="form" method="post" action="login.php">
            <div class="form-content">
					<div class="form-group">
                		<label>Email id</label> <input class="form-control" type="text" name="email" default="email" placeholder="email" required value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>">
					</div>
				
					<div class="form-group">	
					<label>Password</label> <input class="form-control" type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>">
					</div>
				
                
                 <?php                
                if ($_SESSION["emailexists"] == "NO")
                {                   
                   
                        echo "<p class='alert' >Incorrect email id or password</p> <br>";                                
                    
                }
                ?> 
                
				<div class="form-group" align="right">	
                <input  class="btn btn-lg" type="submit" name="submit_btn" value="Login">
					</div>
				
				<?php echo $_SESSION["message"];
				$_SESSION["message"] = NULL;
				?>
                
      </div>
				</form>
				
			</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</body>
</html>
