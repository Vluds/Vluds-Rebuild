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
			<script type="text/javascript">
				loadHeader();
			</script>
		</header>

		<nav id="navbar">
			<script type="text/javascript">
		<?php
			if(User::isLogged())
			{
		?>
				loadNavBar();
		<?php
			}
		?>
			</script>
		</nav>

		<section id="ajax-container">
			<script type="text/javascript">
		<?php
			if(isset($_GET['page']) AND !empty($_GET['page']))
			{
				$modelName = $_GET['page'];

				if($modelName == 'validation')
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
					loadModel('<?php echo $modelName;?>');
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