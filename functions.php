<?php

require_once("../../config.php");
	
	session_start();
	
	function login($user, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_shikter");
		
		$stmt = $mysql->prepare("SELECT id, First_Name, Last_Name from users_database_exam WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id, $First_Name, $Last_Name);
		
		$stmt->execute();
		
		//get the data
		if($stmt->fetch()){
			echo " User with id ".$id." - Logged in!";	
			
			
		//----------------------------------//	
			//create session variables
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["First_Name"] = $First_Name;
			$_SESSION["Last_Name"] = $Last_Name;
			$_SESSION["username"] = $user;
			
			header("Location: homepage.php");
			
		//----------------------------------//	
			
		}else{
			// username was wrong or password was wrong or both.
			echo $stmt->error;
			echo "<h4><span style='color: red;'><strong>Wrong credentials</strong></span></h4>";
		}
		
	}
	
	
	function signup($user, $pass, $first_name, $last_name){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		
		//GLOBALS - access outside variable in function
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_shikter");
		
		$stmt = $mysql->prepare("INSERT INTO users_database_exam(username, password, First_name, Last_Name) VALUES(?, ?, ?, ?)");
		
		echo $mysql->error;
		
		$stmt->bind_param("ssss", $user, $pass, $first_name, $last_name);
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
	}
	
	
	?>