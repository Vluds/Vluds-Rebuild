<nav>
	<ul id="left-container">
		<li id="logo" onClick="loadModel('home')"><h1>Vluds</h1></li>
	</ul>

	<ul id="right-container">
<?php
	if(User::isLogged())
	{
?>
		<li id="username" onClick="logOut()"><h3><?php echo User::getUsername();?></h3></li>
		<li id="navbar-button"></li>
<?php
	}
?>
	</ul>
</nav>