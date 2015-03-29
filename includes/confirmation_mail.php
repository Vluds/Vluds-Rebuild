<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body style="text-align: center;">
		<section style="background-color: rgb(245, 245, 245);border-radius: 8px;padding: 20px;box-shadow: 0px 0px 3px 2px rgba(10, 10, 10, 0.1);">
			<img src="../img/logo.png" alt="vluds-logo">
			<h1 style="font-family: 'OpenSans-Light', Arial;color: rgba(255, 255, 255, 1);">Bienvenue sur <span style="color: rgb(37, 199, 125);">Vluds</span> <?php echo $username;?> !</h1>
			<p style="font-family: 'OpenSans-Light', Arial;font-size: 18px;color: rgba(255, 255, 255, 1);">
				Afin de pouvoir valider votre email, veuillez cliquez sur le bouton "Valider" ci-dessous.<br/>
				Nous vous enverrons un e-mail de confirmation de votre inscription.
			</p>
			<a href="http://rebuild.vluds.eu/validation" style="text-decoration: none;">
				<div class="button" style="width: 160px;height: 45px;border-radius: 15px;background-color: transparent;border: 1px solid rgba(37, 199, 125, 1);line-height: 10px;box-sizing: border-box;margin: auto;cursor: pointer;overflow: hidden;">
					<p style="font-family: 'OpenSans-Light', Arial;color: rgb(37, 199, 125);font-size: 18px;">Valider</p>
				</div>
			</a>
		</section>

		<footer>
			<h3><i style="font-family: 'OpenSans-Light', Arial;font-size: 12px;color: rgba(255, 255, 255, 1);">Cet e-mail est envoyé automatiquement, merci de ne pas envoyer de mails à cette adresse.</i></h3>
		</footer>
	</body>
</html>