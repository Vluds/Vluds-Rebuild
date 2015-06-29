<script type="text/javascript">
	document.title = "Vluds - Mon profil";
</script>

<div class="align-middle"></div>

<div id="user-profil-container">

	<div id="banner-profil">
		<div id="banner-hover">
			<div id="accounts-container">
				<div class="account">
	<?php
					if(User::getAvatar())
					{
	?>
						<div class="avatar" style="background-image: url('users/<?php echo User::getId();?>/avatar/300_<?php echo User::getAvatar();?>.png');background-position: center center;background-color: <?php echo User::getColor();?>;border: 3px solid <?php echo User::getColor();?>;">
							<div id="hover-avatar" onClick="selectAvatar()">
							</div>
						</div>
	<?php
					}
					else
					{
	?>
						<div class="avatar">
							<div id="hover-avatar" onClick="selectAvatar()">
							</div>

							<img src="img/avatar.png">
						</div>
	<?php				
					}
	?>		
					<div class="username">
						<h3><?php echo User::getUsername();?></h3>
					</div>

					<div id="user-tags-container">
						<?php echo User::getUserTags();?>
					</div>
				</div>
			</div>

			<div id="options-container">
				<!--<div onClick="selectAvatar()" class="button">
					<p>Sélectionner un avatar</p>
				</div>-->
				<input id="avatar-upload" name="avatar-upload" accept="image/*" type="file">
			</div>

			<div id="upload-message" class="message-container">
				<h5>Upload terminé !</h5>
				<p>Le telechargement de ton avatar s'est bien déroulé.</p>
			</div>
			<div id="upload-error" class="error-container">
				<h5>Upload annulé !</h5>
				<p>Le type fichier n'est pas pris en charge.<br/>Vérifiez que le fichier est bien une image.</p>
			</div>
		</div>
	</div>
</div>