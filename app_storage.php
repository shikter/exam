<?php require_once("header.php");?>

<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../config.php");
	
	$everything_was_okay = true;

	//********************
	//To field validation
	//********************
	
// -------------------------------------------------------------------

	if(isset($_GET["Product_msg"])){ 
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty ($_GET["Product_msg"])){
			//its empty
			$everything_was_okay = false;
			echo "<span style='color: red;'>Please enter the name of Product</span><br>"; 
		}else{
			//its not empty
			echo "The Product: ".$_GET["Product_msg"]."<br>";
		}
	}else{
		//echo "there is no such thing as Description_msg";
		$everything_was_okay = false;
		
	}	
	
// -------------------------------------------------------------------
	
			if(isset($_GET["amount_msg"])){
		//if its empty
		if(empty ($_GET["amount_msg"])){
			//its empty
		$everything_was_okay = false;
			echo "<span style='color: red;'>Please type Amount </span><br>";
		}else{
			//its not empty
			echo "Amount: ".$_GET["amount_msg"]."<br>";
		}
	}else{
		//echo "there is no such thing as message";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------
	
		if(isset($_GET["Description_msg"])){
		
		//if its empty
		if(empty ($_GET["Description_msg"])){
			//its empty
			$everything_was_okay = false;
			echo "<span style='color: red;'>Please enter the Description </span><br>";	
		}else{
			//its not empty
			echo "The Description: ".$_GET["Description_msg"]."<br>";
		}
	}else{
		//echo "there is no such thing as Description_msg";
		$everything_was_okay = false;
	}
	
// -------------------------------------------------------------------



	
	/****************************
	*********SAVE TO DB**********
	*****************************/

	// ? was everthing okay
	
	if($everything_was_okay == true){
		
		echo "<br>Sent to database ... ";
		
		
		/**	connection with the username and password
			access username from config
		
			echo $db_username;
		
		1 servername	2 username	3 password	4 database	**/
		
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		$stmt = $mysql->prepare("INSERT INTO Restaurant_storage(product, amount, description) VALUES(?,?,?)");
		
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s -string, date or smth that is based on characters and numbers.
		// i - integer, number
		// d - decimal, floatval
		
		// for each question mark its type with one letter
		$stmt->bind_param("sss", $_GET["Product_msg"], $_GET["amount_msg"], $_GET["Description_msg"]);
		
		//save
		if($stmt->execute()){
			echo "<span style='color: red;'>saved sucessfully</span>";
			//$_SESSION["msg"] = "<span style='color: red;'>saved sucessfully</span>";
			
			//header('Location: app_message.php?msg=Saved sucessfully');
			
		}else{
			echo $stmt->error;
		}
		
	}
?>



<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>

<div class="container">
<section id="application_storage">
	
	
		<h2>Restaurant Storage:</h2>
		
		<br>
		
				<form method="get">
				<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">
				<!-- ../../../imgages/tlu_bullet.png -->

				
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<li><label for="Product_msg">Product<span style="color: red;">*</span>: </label></li>
								<input name="Product_msg" id="Product_msg" type="text" class="form-control">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<li><label for="amount_msg">Amount<span style="color: red;">*</span>: </label></li>
									<input name="amount_msg" id="amount_msg" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<li><label for="Description_msg">Description<span style="color: red;">*</span>: </label></li>
								<textarea name="Description_msg" id="Description_msg" class="form-control" style="height: 75px; width: 100%;" valign="top"></textarea>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="Submit">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="Submit">
							
						</div>
					</div>
				</ul>
				</form>
	
			</div>
	

	
		<br>
		
	</section>
</div>

<hr />

	<div class="container">
		<section id="CopyRights">

			<br>
			<dl class="dl-horizontal">
				<dt>Web Programming</dt>
				<dd>© Vadim Kozlov</dd>
				<dt>Directory:</dt>
				<dd><div class="bkt"><a href="http://localhost:5555/~shikter/web/exam" target="_blank">PHP Exam</a></div>
			</dl>
			<br>

		</section>
	</div>

	</body>
</html>