<script type="text/javascript">
	document.title = "Vluds - Flux";
</script>

<div id="flux-container">
	<div class="align-middle"></div>
<?php
	if(!User::getAccountState())
	{
?>
		<div id="tutorial-container">
			<div id="user-network" class="message-container">
				<h5>Un peu seul ?</h5>
				<p>C'est normal, tu es nouveau !<br/>Sélectionne les personnes que tu pourrais apprécier parmis celles-ci :</p><br/>
				<div onClick="" class="button">
					<p>Continuer ►</p>
				</div>
			</div>
		</div>
<?php
	}
?>
	<div id="type_1" class="area">
		<div class="account">
			<div class="align-middle"></div>
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
		<?php echo User::getPersonalAccounts();?>
	</div>
</div>