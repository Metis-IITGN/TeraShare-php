<nav class="navbar navbar-inverse">
		  
			<div class="navbar-header" id="navbar">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="nav1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand" >TeraShare</div>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right" id="nav1">
				  <li><a class="menubars" href="index.php">Home</a></li> 
				  <!--<li><a class="menubars" href="faq.html">FAQ</a></li>-->
				  
				<?php	
										
					if (isset($_SESSION["email"]) != "YES")
					{
						echo "<li><a class='menubars' href='login.php'>Login</a></li> 
				  <li><a class='menubars' href='signuprush.php'>Sign Up</a></li>";
					}
					else
					{
						echo "<li><a class='menubars' href='download_form.php'>Download</a></li>
						<li><a class='menubars' href='upload_form.php'>Upload</a></li>
						<li><a class='menubars' href='upload_form.php'>Notify</a></li> 
				  <li><a class='menubars' href='logout.php'>Logout</a></li>";
						
					}
					
					
				  ?>
					<li><a class="menubars" href="contact.php">Contact Us</a></li>
					 
				</ul>

			</div>
</nav>