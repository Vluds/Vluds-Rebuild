<script type="text/javascript">
	document.title = "Vluds - Flux";
</script>

<div id="flux-container">
	<div class="align-middle"></div>

	<div id="tutorial-container">
<?php
		if(User::getNumberUserTags() >= 10)
		{
			if(!User::getAccountState())
			{
?>
				<div id="user-network" class="message-container">
					<h5>Un peu seul ?</h5>
					<p>C'est normal, tu es nouveau !<br/>Sélectionne les personnes que tu pourrais apprécier parmis celles-ci :</p><br/>
					<div onClick="" class="button">
						<p>Continuer ►</p>
					</div>
				</div>
<?php
			}
		}
		else
		{
?>
			<div id="user-tags-information" class="message-container">
				<h5>Hé attends !</h5>
				<p>Avant de commencer, ajoute quelques mot-clé à ton profil.<br/>Cela permetra de te liér à des personnes ayant les memes centres d'interet que toi. 
<?php
			if(User::getNumberUserTags() >= 7)
			{
				echo "C'est bientôt la fin ! Plus que";
			}
			elseif(User::getNumberUserTags() >= 5)
			{
				echo 'Aller, plus que';
			}
			elseif (User::getNumberUserTags() > 0) {

				echo 'Ajoute-en encore';
			}
			else
			{
				echo 'Ajoute-en au moins';
			}
?>
				<span id="tags-counter"><?php echo 10 - User::getNumberUserTags();?></span>.<br/><br/></p>
				<input id="tag-input" name="tag" class="white" type="text" placeholder="Appuie espace pour valider">
			</div>
<?php
		}
?>
	</div>

<?php
	if(User::getNumberUserTags() >= 10)
	{
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
<?php
	}
	else
	{
?>
		<div id="type_1" class="area">
			<div class="account">
				<div class="align-middle"></div>

				<div id="profil-container">
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
					<div id="user-tags-container">
						<?php echo User::getUserTags();?>
					</div>
				</div>
			</div>
		</div>
<?php
	}
?>
</div>