<script type="text/javascript">
	document.title = "Vluds - Créer un compte";
</script>

<div class="align-middle"></div>

<div id="register-container">
	<div id="accounts-container">
		<div class="account">
			<div class="avatar">
				<img src="img/avatar.png">
			</div>
		</div>
	</div>

	<div id="text-container">
		<h2>C'est parti !</h2>
		<h3>Complétez ce formulaire</h3>
	</div>

	<form id="register-form">
		<ul>
			<li><input type="email" placeholder="Email"></li>
		</ul>
		<ul>
			<li><input type="text" placeholder="Nom d'utilisateur"></li>
		</ul>
		<ul>
			<li><input type="password" placeholder="Mot de passe"></li>
		</ul>
		<ul id="submit-container">
			<div onClick="loadModel('register')" class="button">
				<p>Créer mon compte</p>
			</div>
		</ul>
	</form>
</div>