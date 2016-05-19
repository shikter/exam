

<?php require_once("header.php");?>


<?php
	$current_time_with_fix = time() + (10 * 60 + 58);
		echo "<p />Today is " .date('l, jS \of F Y - H:i:s', $current_time_with_fix);
					   //.date("d.m.Y H:i:s"); 
?>

<div class="container">


	<section id="Login_Form">

<?php		
	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect user to restricted page
		//header("Location: homepage.php"); ??? ??? ???
			require_once("login.php");
		}else if(isset($_SESSION["user_id"])){
			require_once("restrict.php");
		}
 
 ?>
	<br><br>
	</section>
</div>

<hr/>


	<div class="container">
		<section id="CopyRights">

			<br>
			<dl class="dl-horizontal">
				<dt>Beta Version 2.0</dt>
				<dd>© Vadim Kozlov and Dmitri Kabluchko</dd>
				<dt>Directory:</dt>
				<dd><div class="bkt"><a href="http://localhost:5555/~shikter/web/exam" target="_blank">Web Folders</a></div>
			</dl>
			<br>

		</section>
		
	</div>

	</body>
</html>