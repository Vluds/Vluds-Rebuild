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

	<div id="info-container">
		<div id="error-container">
			<p>Erreur ...</p>
		</div>
		<div id="message-container">
			<p>Info ...</p>
		</div>
	</div>

	<form id="login-form">
		<ul>
			<li><input id="username-input" name="username" type="text" placeholder="Nom d'utilisateur ou Email"></li>
			<span class="info-form-input"><span class="left-arrow"></span><p></p></span>
		</ul>
		<ul>
			<li><input id="password-input" name="password" type="password" placeholder="Mot de passe"></li>
			<span class="info-form-input"><span class="left-arrow"></span><p></p></span>
		</ul>
		<ul id="submit-container">
			<div onClick="logUser()" class="button">
				<p>Connexion</p>
			</div>
		</ul>
		<div id="link-container">
			<span class="a" onClick="loadModel('home')"><p>Retour</p></span>
		</div>
	</form>
</div>