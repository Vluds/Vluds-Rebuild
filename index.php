<?php
	session_start();

	require("src/php/class/bdd.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Vluds - More Social</title>
		<link rel="stylesheet" type="text/css" href="css/default_style.css">
		<link rel="stylesheet" type="text/css" href="css/home_style.css">
		<link rel="stylesheet" type="text/css" href="css/register_style.css">
		<link rel="stylesheet" type="text/css" href="css/login_style.css">

		<link rel="icon" href="img/favicon.ico" />

		<!-- Script -->
		<script src="src/js/lib/jquery.min-1.11.1.js"></script>
		<script src="src/js/lib/jquery-ui.min.js"></script>
		<script src="src/js/lib/JLight.js"></script>

		<script src="src/js/JAjax.js"></script>
	</head>

	<body>
		<header>
			<nav>
				<ul>
					<li id="logo" onClick="loadModel('home')"><h1>Vluds</h1></li>
				</ul>
			</nav>
		</header>

		<section id="ajax-container">
		<?php
			if(isset($_GET['page']) AND !empty($_GET['page']))
			{
		?>
				<script type="text/javascript">
		<?php
					if($_GET['page'] == 'home')
					{
		?>
						loadModel('home');
		<?php
					}
					else if ($_GET['page'] == 'register') 
					{
		?>
						loadModel('register');
		<?php
					}
					else if ($_GET['page'] == 'login') 
					{
		?>
						loadModel('login');
		<?php
					}
		?>
				</script>
		<?php
			}
		?>
		</section>

		<footer>
			<h4>Vluds - 2015</h4>
		</footer>

		<!--JQuery Scripts-->
		<script src="src/js/JAnimate.js"></script>
		<script src="src/js/JEngine.js"></script>

	</body>
</html>