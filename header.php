<?php	

require_once("functions.php");


/*---------------------------------------------------------------------------------*/
	//login=smth is in the URL
	//login button clocked
	
	if(isset($_POST["login"])){
		
		//login
		//echo "logging in...";
		
			//the fields are not empty
			if( !empty($_POST["username"]) && !empty($_POST["password"]) ){
				
				//save to db
				
				login($_POST["username"], $_POST["password"]);
				
			}else{
				
				echo "<span style='color: red;'>Both fields are rquired!</span>";
				
			}
	}
/*---------------------------------------------------------------------------------*/
	
		//?logout is in the URL
	if(isset($_GET["logout"])){
		session_destroy();
		
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	
	$pages = array
	  (
	  array("homepage.php","Homepage","not restricted"),
	  array("app_storage.php","Storage APP","restricted"),
	  array("table.php","Table","not restricted"),
	  );
	  
	
	  foreach($pages as $page){
		  //var_dump($page[]);
		  
		  $active = "";
		  
		  if("/home/shikter/public_html/web/exam/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
			  if(!isset($_SESSION["user_id"]) && $page[2] == "restricted"){
					// 1 restricets
				header("Location: homepage.php");
				exit();
			  }
		  }
	  }
	  
?>


<!DOCTYPE html>
<meta charset="UTF-8">
<base target="_self"">
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Programming - Exam</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
		<!-- jQuery google -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<meta charset="UTF-8">
		<base target="_self"">



	  
		<?php 
			/*
			  
			  foreach($pages as $page){
				  //var_dump($page[]);
				  
				  $active = "";
				  
				  if("/home/shikter/public_html/web/groupwork/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
					  $active = "class='active'";
				  }
				  
				  if($page[2] != "restricted"){
					  echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
				  }elseif(isset($_SESSION["user_id"])){
					echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
					 
				  }
				  
			  }
			  
			  // logout
			 
		
		?>
		
      </ul>
	  
  <?php
		
		if(isset($_SESSION["user_id"])){
		 echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a>".$_SESSION["First_Name"]." ".$_SESSION["Last_Name"]."</a></li>
					<li><a href='?logout'>Log out</a></li>
				  </ul>
			  ";
		}else{
			echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a href='homepage.php'>Login</a></li>
				  </ul>
			  ";
		}
	  */
	?>
		
		
		 <script>
			function confirmDelete(event){
				
				var c = confirm("Do you want to delete?");
				
				if(!c){
					event.preventDefault();
				}
			}
		  
		 </script>
		  
		  
		  
				
		 <script type="text/javascript">

				
				console.log(date);
				
				document.getElementById('errors').innerHTML = error;
				if(formIsValid){
					var day1 = $("#datepicker").datepicker('getDate').getDate();                 
					var month1 = $("#datepicker").datepicker('getDate').getMonth() + 1;             
					var year1 = $("#datepicker").datepicker('getDate').getFullYear();
					
					document.getElementById('datepicker').value = year1+"-"+month1+"-"+day1;
					
				}
				
				
				return formIsValid;
				
				
			}
			
		</script>		
		

  </head>
  
 
  <body>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">"Welcome to Restaurant"</a>
    </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      <ul class="nav navbar-nav">
	  
		<?php 
			
			
			  foreach($pages as $page){
				  //var_dump($page[]);
				  
				  $active = "";
				  
				  if("/home/shikter/public_html/web/exam/".$page[0] == $_SERVER['SCRIPT_FILENAME']){
					  $active = "class='active'";
				  }
				  
				  if($page[2] != "restricted"){
					  echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
				  }elseif(isset($_SESSION["user_id"])){
					echo "<li ".$active." ><a href='".$page[0]."'>".$page[1]."</a></li>";
					 
				  }
				  
			  }
			  
			  // logout
			 
		
		?>
		
      </ul>
	  
  <?php
		
		if(isset($_SESSION["user_id"])){
		 echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a>".$_SESSION["First_Name"]." ".$_SESSION["Last_Name"]."</a></li>
					<li><a href='?logout'>Log out</a></li>
				  </ul>
			  ";
		}else{
			echo "
				<ul class='nav navbar-nav navbar-right pull-right'>
					<li><a href='homepage.php'>Login</a></li>
				  </ul>
			  ";
		}
	  
	?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>