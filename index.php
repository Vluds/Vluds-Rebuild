<?php
	session_start();

	// GET URL SITE
	$siteProtocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),"https") === FALSE ? "http" : "https";
	$siteHost = $_SERVER['HTTP_HOST'];
	$siteUrl = $siteProtocol."://".$siteHost;
	define('URL', $siteUrl, true);

	// Define directory.
	define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']), true);
	define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']), true);

	define('IMG', WEBROOT.'img/', true);

	// Define social media url.
	define('TWITTER', 'https://www.twitter.com/vluds_', true);
	define('FACEBOOK', 'https://www.facebook.com/vluds', true);

	// Initialization.
	require("src/php/class/bdd.php");
	$newStaticBdd = new BDD();

	require("src/php/class/Engine.php");
	require("src/php/class/User.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="language" content="french">
		<meta name="google" content="notranslate">

		<title>Vluds - Be more social.</title>
		<meta name="author" content="vluds.eu">
		<meta name="description" content="Réseau social pour les personnes créatives. Venez découvrir des créations, rencontrez des personnes, discutez avec elles et partagez !" />
		<meta name="keywords" content="vluds, réseau, social, créatives, création, partarger, découvrir, tags, ..." />

		<link rel="stylesheet" type="text/css" href="css/default_style.css">
		<link rel="icon" href="img/favicon.ico" />

		<base href="" >


		<meta name="apple-mobile-web-app-title" content="Vluds - Be more social.">

		<!-- Open Graph data -->
		<meta property="og:locale" content="fr_FR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Vluds - Be more social." />
		<meta property="og:description" content="Réseau social pour les personnes créatives. Venez découvrir des créations, rencontrez des personnes, discutez avec elles et partagez !" />
		<meta property="og:url" content="<?php echo URL;?>" />
		<meta property="og:site_name" content="vluds" />
		<meta property="og:image" content="<?php echo URL.IMG;?>preview.jpg" />

		<!-- Facebook spec -->
		<meta property="article:publisher" content="<?php echo FACEBOOK;?>" />

		<!-- Twitter data -->
		<meta property="twitter:card" content="summary_large_image" />
		<meta property="twitter:site" content="@vluds_" />
		<meta property="twitter:domain" content="vluds" />
		<meta property="twitter:creator" content="@vluds_" />
		<meta property="twitter:image" content="<?php echo URL.IMG;?>preview.jpg" />
		<meta property="twitter:title" content="Vluds - Be more social." />
		<meta property="twitter:description" content="Réseau social pour les personnes créatives. Venez découvrir des créations, rencontrez des personnes, discutez avec elles et partagez !" />
		<meta property="twitter:url" content="<?php echo TWITTER;?>" />


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
			<?php include('includes/comfirmLogout-box.php');?>
		</div>

		<!--JQuery Scripts-->
		<script src="src/js/JAnimate.js"></script>
		<script src="src/js/JEngine.js"></script>

	</body>
</html>