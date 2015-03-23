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
		<link rel="stylesheet" type="text/css" href="css/index_style.css">

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
			<div class="align-middle"></div>

			<div id="index-container">
				<div id="accounts-container">
					<div class="account">
						<div class="avatar">
							<img src="img/avatar.png">
						</div>

						<div id="egg_jump"><p>Hé, stop ! Je suis crevé là ...</div>
					</div>
				</div>

				<div id="text-container">
					<h2>Bienvenue sur Vluds</h2>
					<h3>Possèdez-vous déjà un compte ?</h3>
				</div>

				<div id="options-container">
					<div onClick="loadModel('register')" class="button">
						<p>Créer un compte</p>
					</div>

					<div id="link-container">
						<span class="a" onClick="loadModel('login')"><p>Je possède déjà un compte</p></span>
					</div>
				</div>
			</div>
		</section>

		<!--JQuery Scripts-->
		<script src="src/js/JAnimate.js"></script>
		<script src="src/js/JEngine.js"></script>

	</body>
</html>