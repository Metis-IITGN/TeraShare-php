<?php
    session_start();
    //connecting to database
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());
    

$_SESSION["user_loggedin"] = NULL;
$_SESSION["passwords_equal"] = NULL;

$_SESSION["email"] = NULL;
$_SESSION["name"] = NULL;
$_SESSION["roll"] = NULL;
$_SESSION["course"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["password2"] = NULL;
$_SESSION["loggedin"] = "no";
$_SESSION["emailexists"] = NULL;
$_SESSION["invalidemail"] = NULL;

/*$_SESSION["loggedin"] = NULL;*/

    
    if (isset($_POST["submit_btn"]))
    {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $course = $_POST["course"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        
        $_SESSION["email"] = $email;
        $_SESSION["roll"] = $roll;
        $_SESSION["name"] = $name;
        $_SESSION["course"] = $course;
        $_SESSION["password"] = $password;
        $_SESSION["password2"] = $password2;
        
        
    
    if (($password == $password2))
    {
        $rows = mysqli_query($db,"SELECT * FROM registered_users WHERE email='{$email}'");
        $num = mysqli_num_rows($rows);
        if ($num > 0)
        {
            $_SESSION["emailexists"] = "yes";
        }
        else
        {
        $_SESSION["passwords_equal"] = "YES";
    	if (endsWith($email,"@iitgn.ac.in"))
		{
        $new_user = "INSERT INTO registered_users(email,name,roll,course,password,status) VALUES('$email','$name','$roll','$course','$password','0') ";
        mysqli_query($db,$new_user) or die("Trouble signing up".mysql_error());
        $_SESSION["loggedin"] = "yes";
        header("Location: download_form.php");
		}
			else
			{
				$_SESSION["invalidemail"] = "yes";
			}
        }
    }
                else
                {
                    $_SESSION["passwords_equal"] = "NO";
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
		<link rel="stylesheet" type="text/css" href="css/signup.css">
	
</head>
    <body>
		<?php
		include "header.php";
		
		?>
		
		<div id="main-body" class="container-fluid" style="background-color: #44B9EF;">
			<div id="content-body" class="container" align="center">
				
        <form align="left" id="form" method="post" action="signuprush.php">
			<div id="red-box" align="center">SIGNUP</div>
					<div class="form-content">
					<div class="form-group">
                		<label>EMAIL</label> 
						
						<input class="form-control" type="text" name="email" default="email" placeholder="email" required value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>">
					</div>
						
						 
                
                <?php                
                if ((isset($_POST["submit_btn"])))
                {
					if ($_SESSION["invalidemail"] == "yes")
					{
						echo "<p class='alert'>Email id must be iitgn's email id</p> <br>"; 
						$_SESSION["invalidemail"] = NULL;
					}
                   if ($_SESSION["emailexists"] == "yes")
               
                        echo "<p class='alert'>Email id already exists</p> <br>";             
                    
                    
                }
                ?>      
					<div class="form-group">
                <label>Name</label>
						<input class="form-control" type="text" name="name" placeholder="Team TeraShare"  required value="<?php if ($_SESSION["name"]){echo $_SESSION["name"];} ?>">
					</div>
					
					<div class="form-group">
                <label>Roll no</label> <input class="form-control" type="text" name="roll" default="11111111" placeholder="11111111" required value="<?php if ($_SESSION["roll"]){echo $_SESSION["roll"];}  ?>">
					</div>
					
				
				
				
                <div class="form-group">	
                <label>Programme</label><select class="form-control" name="course">
                    <option value="btech">BTECH</option>
                    <option value="mtech">MTECH</option>
                    <option value="msc">MSC</option>
                    <option value="ma">MA</option>
                    <option value="phd">PHD</option>
                    <option value="alumni">ALUMNI</option>
                </select>     
					</div>
                
               <div class="form-group">	
                <label>Password</label> <input class="form-control" type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>" required>
				</div>
						
                <div class="form-group">	
                <label >Reenter password</label> <input class="form-control" type="password" name="password2" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>" required>
					</div>
                
                            
                
                <?php
                
                
                    if ($_SESSION["passwords_equal"] == "NO")
                    {
                        echo "<span class='alert'>Passwords not same. Please reenter password </span><br>";
                    }
                ?>
						
						<div class="form-group" align="right">	
                <input  class="btn btn-lg" type="submit" name="submit_btn" value="SIGNUP">
					</div>
					</div>
				</form>
				
			</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script>
			//making form gradually appear
			menu_appear();
			function menu_appear() {
				var elem1 = document.getElementById("navbar");
				var elem2 = document.getElementById("myNavbar");
				var op = 0;
				var id = setInterval(frame, 5);
				function frame() {
					if (op >= 1) {
						clearInterval(id);
						form_appear();
					} else {
						op = op + 0.005; 						
						elem1.style.opacity = op;
						elem2.style.opacity = op;
					}
				}
			}
			
			function form_appear() {
				var elem = document.getElementById("form");				
				var op = 0;
				var id = setInterval(frame, 5);
				function frame() {
					if (op >= 1) {
						clearInterval(id);						
					} else {
						op = op + 0.005; 
						elem.style.opacity = op;
					}
				}
			}
		
		</script>
		
	</body>
</html>