<script type="text/javascript">
	document.title = "Vluds - Mon profil";
</script>

<div class="align-middle"></div>

<div id="profil-container">
	<div id="accounts-container">
		<div class="account">
<?php
			if(User::getAvatar())
			{
?>
				<div class="avatar" style="background-image: url('users/<?php echo User::getId();?>/avatar/300_<?php echo User::getAvatar();?>.png');background-position: center center;background-color: <?php echo User::getColor();?>;border: 3px solid <?php echo User::getColor();?>;">
						
				</div>
<?php
			}
			else
			{
?>
				<div class="avatar">
					<img src="img/avatar.png">
				</div>
<?php				
			}
?>
		</div>
	</div>

	<div id="options-container">
		<div onClick="selectAvatar()" class="button">
			<p>Sélectionner un avatar</p>
		</div>
		<input id="avatar-upload" name="avatar-upload" accept="image/*" type="file">
	</div>

	<div id="upload-message" class="message-container">
		<h5>Upload terminé !</h5>
		<p>Le telechargement de ton avatar s'est bien déroulé.</p>
	</div>

</div>