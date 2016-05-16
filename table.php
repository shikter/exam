<?php require_once("header.php");?>


	<?php
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s');
					   //.date("d.m.Y H:i:s");

	?>
	  
<?php

if(isset($_GET["watch_more_tb1"])){
	$_SESSION["watch_more_tb1"] = true;
}

if(isset($_GET["watch_less_tb1"])){
	$_SESSION["watch_more_tb1"] = false;
}

?>

<?php

if(isset($_GET["watch_more_tb2"])){
	$_SESSION["watch_more_tb2"] = true;
}

if(isset($_GET["watch_less_tb2"])){
	$_SESSION["watch_more_tb2"] = false;
}

?>

<link rel="stylesheet" type="text/css" href="tablestyle.css">


	<div class="container">
			<section id="Tables">
			
				<h1>This is the Tables page</h1>
					<p><i>(You can see only last 10 rows)</i></p>
						<br>
			
<?php

	//table.php

	//getting our config
	require_once("../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_shikter");
	
	
	// IF THERE IS ?DELITE=ROW_ID in the url
	if(isset($_GET["delete"]) && isset($_SESSION["user_id"])){
		
		$error_delete1 = "Deleting \"TB1\" row with id:".$_GET["delete"]."<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE Restaurant_storage SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete"]);
		
		if($stmt->execute()){
			$error_delete1.= "<span style='color: red;'>deleted successfully</span><br>";
		}else{
			$error_delete1.=$stmt->error;
		}
		
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
		if(isset($_GET["delete_o"]) && isset($_SESSION["user_id"])){
		
		$error_delete2 = "Deleting \"TB2\" row with id:".$_GET["delete_o"]."<br>";
		
		// NOW() = current date-time
		$stmt = $mysql->prepare("UPDATE Reservation SET deleted=NOW() WHERE id = ?");
		
		echo $mysql->error;
		
		//replace the ?
		$stmt->bind_param("i", $_GET["delete_o"]);
		
		if($stmt->execute()){
			$error_delete2.= "<span style='color: red;'>deleted successfully</span><br>";
		}else{
			$error_delete2.=$stmt->error;
		}
		//closes the statement, so others can use connection
		$stmt->close();
		
	}
	
	//SQL sentens
	$stmt = $mysql->prepare("SELECT id, product, amount, description, created FROM Restaurant_storage WHERE deleted IS NULL ORDER BY created DESC");
	//WHERE deleted is NULL show only those that are not deleted
	
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt->bind_result($id, $product, $amount, $description, $created);

	//query
	$stmt->execute();
	
	$table_html = "";
	
	//add smth to string .=
	$table_html .="<table style='text-align: center;' class='table table-striped'>";
		$table_html .="<tr>";//start new row
		
			$table_html .="<th><center>ID / Row</center></th>";
			$table_html .="<th><center>Product</center></th>";
			$table_html .="<th><center>Description</center></th>";
			$table_html .="<th><center>Amount</center></th>";
			$table_html .="<th><center>Created</center></th>";
			if(isset($_SESSION["user_id"])){
				$table_html .="<th><center>Edit</center></th>";
				$table_html .="<th><center>Delete</center></th>";
			}
			
		
		$table_html .="</tr>"; //end row
	
	// GET RESULT
	// we have multiple rows
	
	// ---------------------------------------------------------------------
	
	$rows_count = 0;
	$max_count = 10;
	
	if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){
		$max_count = 1000000;
	}
	
	
	while($stmt->fetch()){
		
		$rows_count++;
		
		if($rows_count >= $max_count){
			break;
		}
		
		// Don't forget about - $stmt->close(); - to see other tables...
	// ----------------------------------------------------------------------
			
			
		// DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .="<tr>";//start new row
		
			$table_html .="<td>".$id."</td>";	//add colums
			$table_html .="<td>".$product."</td>";
			$table_html .="<td>".$description."</td>";
			$table_html .="<td>".$amount."</td>";
			
			
			$table_html .="<td>";
			$table_html .=date_format( date_create($created) , "d/m/Y - H:i:s");
			$table_html .="</td>";
			if(isset($_SESSION["user_id"])){
				$table_html .="<td><a class='btn btn-warning' href='edit_storage.php?edit=".$id."'>Edit</a></td>";
				$table_html .="<td><a class='btn btn-danger' onclick='confirmDelete(event)' href='?delete=".$id."'>X</a></td>";
				
			}
			
		$table_html .="</tr>"; //end row
	}
	
	$stmt->close();
	
	$table_html .="</table>";
	//echo $table_html;
?>

	<!-- -------------------------------------------------------------------------------------- -->

		<?php if(isset($error_delete1)){
		echo $error_delete1;
		}?>
		
		<h3 id="tb1">Table of "Message APP"</h3>
		
			<?php if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){ ?>
				<a href="?watch_less_tb1#tb1">Watch last 10 senders</a>
			<?php }else{ ?>
				<a href="?watch_more_tb1#tb1">Watch all Message</a>
			<?php } ?>
			
			<br><br>
			
			<?php echo $table_html; ?>
			
	<!-- -------------------------------------------------------------------------------------- -->
			
			<br>
			
			<?php if(isset($_SESSION["watch_more_tb1"]) && $_SESSION["watch_more_tb1"] == true){ ?>
				<div align="center"> <a href="?watch_less_tb1#tb1">Watch last 10 senders</a> </div>
			<?php }else{ ?>
				<div align="center"> <a href="?watch_more_tb1#tb1">Watch full list - "Table of Message APP" </a> </div>
			<?php } ?>
			
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