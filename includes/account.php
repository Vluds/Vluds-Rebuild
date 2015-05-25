<div class="mini-avatar" id="<?php echo $getUserInfo['username'];?>">
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