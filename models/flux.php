<script type="text/javascript">
	document.title = "Vluds - Flux";
</script>

<div id="flux-container">
	<div class="align-middle"></div>
	<div id="1" class="area">
		<div class="account">
			<div class="align-middle"></div>
<?php
			if(User::getAvatar())
			{
?>
				<div class="avatar" style="background-image: url('users/<?php echo User::getId();?>/avatar/300_<?php echo User::getAvatar();?>.png');">
						
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