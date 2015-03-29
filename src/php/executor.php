<?php
	session_start();

	require("class/bdd.php");
	require("class/Engine.php");
	require("class/User.php");

	$dataArray = array();

	if(isset($_POST['action']) AND !empty($_POST['action']))
	{
		$newStaticBdd = new BDD();

		$action = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['action']));

		if($action == "loadModel")
		{
			if(isset($_POST['modelName']))
			{
				$modelName = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['modelName']));

				$returnModel = array();
				$returnModel = Engine::loadModel($modelName);
				$dataArray['error'] = $returnModel['error'];

				if($returnModel['result'] == true)	
				{
					$dataArray['reply'] = $returnModel['reply'];
					$dataArray['result'] = $returnModel['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "regUser")
		{
			if(isset($_POST['emailInput']) AND isset($_POST['usernameInput']) AND isset($_POST['passwordInput']))
			{
				$email = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['emailInput']));
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['usernameInput']));
				$password = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['passwordInput']));

				$returnFunction = array();
				$returnFunction = User::regUser($username, $password, $email);
				$dataArray['error'] = $returnFunction['error'];

				if($returnFunction['result'] == true)	
				{
					$dataArray['reply'] = $returnFunction['reply'];
					$dataArray['result'] = $returnFunction['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "logUser")
		{
			if(isset($_POST['usernameInput']) AND isset($_POST['passwordInput']))
			{
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['usernameInput']));
				$password = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['passwordInput']));

				$returnFunction = array();
				$returnFunction = User::logUser($username, $password);
				$dataArray['error'] = $returnFunction['error'];

				if($returnFunction['result'] == true)
				{
					$dataArray['result'] = $returnFunction['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}
	}
	else
	{
		$dataArray['result'] = "error: POST NOT SET";
	}

	echo json_encode($dataArray);
?>