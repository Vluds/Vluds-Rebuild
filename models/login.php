<script type="text/javascript">
	document.title = "Vluds - Connexion";
</script>

<div class="align-middle"></div>

<div id="login-container">
	<div id="accounts-container">
		<div class="account">
			<div class="avatar">
				<img src="img/avatar.png">
			</div>
		</div>
	</div>

	<div id="text-container">
		<h2>Hey ! De retour ?</h2>
		<h3>Connecte-toi ...</h3>
	</div>

	<form id="login-form">
		<ul>
			<li><input type="text" placeholder="Nom d'utilisateur ou Email"></li>
		</ul>
		<ul>
			<li><input type="password" placeholder="Mot de passe"></li>
		</ul>
		<ul id="submit-container">
			<div onClick="loadModel('login')" class="button">
				<p>Connexion</p>
			</div>
		</ul>
	</form>
</div>