<script type="text/javascript">
	document.title = "Vluds - Mon profil";
</script>

<div class="align-middle"></div>

<div id="profil-container">
	<div id="accounts-container">
		<div class="account">
			<div class="avatar">
				<img src="img/avatar.png">
			</div>
		</div>
	</div>

	<div id="text-container">
<?php 	
		if(empty(User::getFullname()))
		{
?>
			<h2><?php echo User::getUsername();?></h2>
<?php
		}
		else
		{
?>
			<h2><?php echo User::getFullname();?></h2>
<?php
		}

		if(empty(User::getAvatar()))
		{
?>
			<h3>Tu n'as pas encore d'avatar</h3>
<?php
		}
?>
	</div>

	<div id="options-container">
		<div onClick="editAvatar()" class="button">
			<p>Sélectionner un avatar</p>
		</div>

		<div id="link-container">
			<span class="a" onClick=""><p>Options</p></span>
		</div>
	</div>
</div>