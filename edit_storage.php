<?php

	//require another php file
	// ../../../ means > 3 folders back
	require_once("../../config.php");
	
	//the variable does not exists in the URL
	if(!isset($_GET["edit"])){
		
		//redirect user
		echo "redirect";
		
		header("Location: table.php");
		exit(); //don't execute further
		
	}else{
		echo "<h4>"."> <strong>You want to edit row: "."<span style='color: red;'>".$_GET["edit"]."</span></strong>"."</h4>" ;
		
		//ask for latest data for single row
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
		
		// maybe user wants to update data after clicking the button
		//echo $_GET["Product_msg"];
		if(isset($_GET["Product_msg"]) && isset($_GET["amount_msg"]) && isset($_GET["Description_msg"] )){
			
			echo "<br>User modified data...";
			
			//should be validation
			
			$stmt = $mysql->prepare("UPDATE Restaurant_storage SET product=?, amount=?, description=? WHERE id=?");
			
			echo $mysql->error;
			
			$stmt->bind_param("sssi", $_GET["Product_msg"], $_GET["amount_msg"], $_GET["Description_msg"], $_GET["edit"]);
			
			if($stmt->execute()){
				
				echo "<br><h4><strong><span style='color:red'>Saved successfully</span></strong></h4>";
				
				// option one - redirect:
				
				//header("Location: tables.php");
				//exit();
				
				// option two - update variables:
				
				echo "<br><strong><span style='color:green'>Changed to:</span></strong><br>";
				
				
				echo "<br><strong>Name of product: </strong>".$product = $_GET["Product_msg"];
				echo "<br><strong>The amount name: </strong>".$amount = $_GET["amount_msg"];
				echo "<br><strong>Description: </strong>".$description = $_GET["Description_msg"];
				
				$id = $_GET["edit"];
				
				echo "<br>"."-------------------------------------";
				echo "<br> Go back to <a href='tables.php'>Tables Page</a>";
				
				

				
			}else{
				
				echo $stmt->error;
			}
			
			
		}else{
			
					//user did not click any buttons yet,
					//give user latest data from db
					
					$stmt = $mysql->prepare("SELECT id, product, amount, description,  created FROM Restaurant_storage WHERE id=?");
				
				echo $mysql->error;
				
				//replace the ? mark
				$stmt->bind_param("i", $_GET["edit"]);
				
				//bind result data
				$stmt->bind_result($id, $product, $amount, $description, $created);
				
				$stmt->execute();
				//we have only 1 row of data
				if($stmt->fetch()){
					
					//we had data
					echo "<h4>"."> <i>Filled field:</i> | "."<strong>".$product." ; ".$amount." ; ".$description." </strong>"." | <i>which was created:</i> "."<strong>".$created."</strong>"."</h4>";
					
				}else{
					
					//smth went wrong
					echo $stmt->error;
				}
		
			}
		
		
	}
?>

<?php require_once("header.php");?>


<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s");

?>

<div class="container">
<section id="application_storage">
	
	
		<h2>Restaurant Storage:</h2>
		<h4><span style='color: red;'>(Editing Mode)</span></h4>
		<br>
		
				<form method="get">
				<ul STYLE="list-style-image: url(http://www.tlu.ee/~shikter/ristmed2/images/bullet/tlu_bullet.png)">
				<!-- ../../../imgages/tlu_bullet.png -->

				
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<li><label for="Product_msg">Product<span style="color: red;">*</span>: </label></li>
								<input name="Product_msg" id="Product_msg" type="text" class="form-control" value="<?=$product;?>">
								
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<li><label for="amount_msg">Amount<span style="color: red;">*</span>: </label></li>
									<input name="amount_msg" id="amount_msg" type="text" class="form-control" value="<?=$amount;?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-3 col-sm-6">
								<li><label for="Description_msg">Description<span style="color: red;">*</span>: </label></li>
								<input name="Description_msg" id="Description_msg" type="text" class="form-control" style="height: 75px;" valign="top" value="<?=$description;?>">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3 col-sm-6">
						<!-- btn-lg   visible-xs-inline  hidden-xs-->
							<input class="btn btn-primary hidden-xs" type="submit" value="Submit">
							<input class="btn btn-primary btn-block visible-xs-inline" type="submit" value="E d i t">
							
						</div>
					</div>
				</ul>
				</form>
	
			</div>
	
	<br>
	
			<hr />
		
	</section>
</div>


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