<?php
		

	//signup button clocked
	 if(isset($_POST["signup"])){
		
		//signup
		echo "signing up...";
		
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["First_Name"]) && !empty($_POST["Last_Name"]) ){
				
				//save to db
				
				signup($_POST["username"], $_POST["password"], $_POST["First_Name"], $_POST["Last_Name"]);
				
			}else{
				
				echo " All fields are rquired!";
				
		}
		
		
	}
	
//---------------------------------------------------------------------------------//
?>
  


<!-- here field for input -->
<div align="center">

       <h1>Log in</h1>
	<br>
	<form method="POST">

		<input type="text" placeholder="Username" name="username">
		<br><br>
		<input type="password" placeholder="Password" name="password">
		<br><br>
		<input class="btn btn-primary" type="submit" name="login" value="Log in">		
		<br><br>
		
		<hr />
	
	</form>
     
         <h1>Create User Name</h1>
	<br>
	<form align="center" method="POST">
	
		<input type="text" placeholder="Username" name="username">
		<br><br>
		<input type="password" placeholder="Password" name="password">
		<br><br><br>
		<input type="First_Name" placeholder="First Name" name="First_Name">
		<br><br>
		<input type="Last_Name" placeholder="Last Name" name="Last_Name">
		<br><br>
		<input class="btn btn-warning" type="submit" name="signup" value="Sign up">
		<br><br>
	
	</form>

       
</div>

<!-- filed ends -->



