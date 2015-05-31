<div class="mini-avatar" id="<?php echo $getUserInfo['username'];?>" style="background-color: <?php echo Engine::getRefColor($getUserInfo['color']);?>;border: 3px solid <?php echo Engine::getRefColor($getUserInfo['color']);?>;">
	<div class="user-description">
		<div class="username"><p><?php echo $getUserInfo['username'];?></p></div>
	</div>
<?php
		if(isset($getUserInfo['avatar']) AND !empty($getUserInfo['avatar']))
		{
?>
			<div class="avatar" style="background-image: url('users/<?php echo $getUserInfo['id'];?>/avatar/300_<?php echo $getUserInfo['avatar'];?>.png');background-position: center center;">
						
			</div>

<?php
		}
		else
		{
?>
			<img src="img/avatar.png">
<?php
		}
?>
</div>