<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body style="text-align: center;">
		<table cellspacing="0" cellpadding="0" style="width: 730px;background-color: rgb(245, 245, 245);border-radius: 8px;border: 1px solid rgba(0, 0, 0, 0.1);padding: 0px 0px 20px 0px;">
			<thead style="border-radius: 8px 8px 0px 0px;background-color: rgb(255, 255, 255);">
				<tr>
					<td class="margin-mail" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);"></td>
					<td style="height: 100px;border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
						<img src="../img/logo.png" alt="vluds-logo">
					</td>
					<td class="margin-mail" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);"></td>
				</tr>
			</thead>
			<tbody style="">
				<tr>
					<td class="margin-mail"></td>
					<td style="height: 330px;">
						<h1 style="font-family: 'OpenSans-Light', Arial;color: rgba(30, 30, 30, 1);font-weight: normal;margin: 0;">Bienvenue sur <span style="color: rgb(37, 199, 125);">Vluds</span> <?php echo $username;?> !</h1>
						<p style="font-family: 'OpenSans-Light', Arial;font-size: 18px;color: rgba(30, 30, 30, 1);">
							Afin de pouvoir valider votre email, veuillez cliquez sur le bouton "Valider" ci-dessous.<br/>
							Nous vous enverrons un e-mail de confirmation de votre inscription.
						</p>
						<a href="http://rebuild.vluds.eu/validation" style="text-decoration: none;">
							<div class="button" style="width: 160px;height: 45px;border-radius: 15px;background-color: transparent;border: 1px solid rgba(37, 199, 125, 1);line-height: 10px;box-sizing: border-box;margin: auto;cursor: pointer;overflow: hidden;">
								<p style="font-family: 'OpenSans-Light', Arial;color: rgb(37, 199, 125);font-size: 18px;">Valider</p>
							</div>
						</a>
					</td>
					<td class="margin-mail"></td>
				</tr>

				<tr>
					<td class="margin-mail"></td>
					<td>
						<h3><i style="font-family: 'OpenSans-Light', Arial;font-size: 12px;color: rgba(30, 30, 30, 1);">Cet e-mail est envoyé automatiquement, merci de ne pas envoyer de mails à cette adresse.</i></h3>
					</td>
					<td class="margin-mail"></td>
				</tr>
			</tbody>
		</table>
	</body>
	<style type="text/css">
		.margin-mail
		{
			width: 20px;
		}
	</style>
</html>