<?php

//we need functions for dealing with session

require_once("functions.php");


	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: homepage.php");
		
	}
	
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: homepage.php");
	}

?>



<style>
.btn{
  margin:0px center;
  display: inline-block;
  padding: 3px 25px;
  font-size: 20px;
}
</style>

	<div class="container">
	
		<section id="Welcome">
			
			<table align="center" border="0">
				<form>
					<tr>
						<td width="225" align="center">
							<h2> <strong><?=$_SESSION["username"];?></strong> </h2>
						</td>
						
						<td width="225" align="center">
							<h2> <strong><?=$_SESSION["First_Name"];?> <?=$_SESSION["Last_Name"];?></strong> </h2>
						</td>
						
						<td width="185" align="center">
							<!-- <h3><a href="#" >Edit Profile</a></h3> -->
							<h3><a class='btn btn-info' href="#">Edit Profile</a></h3>
						</td>
					</tr>
					<tr>
						<td width="225" align="center">
							<a class='btn btn-success' href="./app_storage.php">Add to Storage</a>
						</td>
						
						<td width="225" align="center">
							<h3> User ID: (<?=$_SESSION["user_id"];?>) </h3>
						</td>
						
						<td width="185" align="center">
							<!-- <h2><a href="?logout=1" >Log Out</a></h2> -->
							<h2><a class='btn btn-danger' href="?logout=1">Log Out</a></h2>
						</td>
					</tr>
				</form>
				<br>
			</table>
				
		</section>
		
	</div>