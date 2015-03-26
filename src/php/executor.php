<?php
	session_start();

	require("class/bdd.php");
	require("class/Engine.php");

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

		if($action == "sendConfirmationMail")
		{
			if(isset($_POST['username']) AND isset($_POST['email']))
			{
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['username']));
				$email = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['email']));

				$returnModel = array();
				$returnModel = Engine::sendConfirmationMail($username, $email);
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
	}
	else
	{
		$dataArray['result'] = "error: POST NOT SET";
	}

	echo json_encode($dataArray);
?>