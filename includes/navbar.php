<div id="navbar-top">
	<h3>MENU</h3>
</div>

<div id="navbar-profil">
	<div class="account">
<?php
		if(User::getAvatar())
		{
?>
			<div class="avatar" style="background-image: url('users/<?php echo User::getId();?>/avatar/300_<?php echo User::getAvatar();?>.png');background-color: <?php echo User::getColor();?>;border: 3px solid <?php echo User::getColor();?>;">
						
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
	<div id="username">
		<h3><?php echo User::getUsername();?></h3>
	</div>
</div>

<div class="navbar-separator"></div>

<div id="navbar-middle">
	<li onClick="loadModel('flux')"><div class="navbar-icon"><img src="img/flux.png"></div><div class="navbar-text"><p>Flux</p></div></li>
	<li onClick="loadModel('profil')"><div class="navbar-icon"><img src="img/icon.png"></div><div class="navbar-text"><p>Profil</p></div></li>
</div>

<div id="navbar-bottom">
	<div class="navbar-separator"></div>
	<li onClick="logOut()"><p>Déconnexion</p></li>
</div>