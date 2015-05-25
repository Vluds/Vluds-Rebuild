<div class="mini-avatar">
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