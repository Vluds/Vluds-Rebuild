<?php
	session_start();

	require("src/php/class/bdd.php");
	$newStaticBdd = new BDD();

	require("src/php/class/Engine.php");
	require("src/php/class/User.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Vluds - Be more social.</title>
		<link rel="stylesheet" type="text/css" href="css/default_style.css">

		<link rel="icon" href="img/favicon.ico" />

		<base href="" >

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

				<ul>
		<?php
					if(User::isLogged())
					{

		?>
						<li><?php echo User::getUsername();?></li>
		<?php
					}
		?>
				</ul>
			</nav>
		</header>

		<section id="ajax-container">
			<script type="text/javascript">
		<?php
			if(isset($_GET['page']) AND !empty($_GET['page']))
			{
				if ($_GET['page'] == 'validation')
				{
					if(isset($_GET['username']) AND isset($_GET['activationKey']))
					{
		?>
						var username = "<?php echo $_GET['username'];?>";
						var activationKey = "<?php echo $_GET['activationKey'];?>";

						accountActivation(username, activationKey);
		<?php
					}
					else
					{
						echo "Lien éronné ...";
					}
				}
				else
				{
		?>
					var modelName = "<?php echo $_GET['page'];?>";
					loadModel(modelName);
		<?php
				}
			}
			else
			{
		?>
				loadModel('home');
		<?php
			}
		?>
				</script>
		</section>

		<footer>
			<h4>Vluds - 2015</h4>
		</footer>

		<div id="background-container">
			<div id="close-background"></div>
			<?php include('includes/cookiesPrivacy-box.php');?>
		</div>

		<!--JQuery Scripts-->
		<script src="src/js/JAnimate.js"></script>
		<script src="src/js/JEngine.js"></script>

	</body>
</html>