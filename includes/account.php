<div class="mini-avatar" id="<?php echo $getUserInfo['username'];?>">
	<div class="user-description">
		<div class="username"><p><?php echo $getUserInfo['username'];?></p></div>
	</div>
<?php
		if(isset($getUserInfo['avatar']) AND !empty($getUserInfo['avatar']))
		{
?>
			<img src="<?php echo $getUserInfo['avatar'];?>">

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