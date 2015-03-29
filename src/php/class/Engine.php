<?php

class Engine
{

	public $newbdd;

	public function __construct()
	{
		$this->newbdd = new BDD();
	}

	public static function loadModel($modelName)
	{
		$modelFilename = '../../models/'.$modelName.'.php';

		if(file_exists($modelFilename)) 
		{
			$newStaticBdd = new BDD();
			$dataArray['reply'] = "";
			$dataArray['error'] = null;

		    ob_start();
			include($modelFilename);
			$dataArray['reply'] .= ob_get_contents();
			ob_end_clean();

			$dataArray['result'] = true;
		} 
		else 
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "Le modele n'existe pas !";
		}

		return $dataArray; 
	}

	public static function sendConfirmationMail($username, $email)
	{

		$to = $email;

		$subject = 'Hey, Bienvenue sur Vluds '.$username.' !';

		ob_start();
		include('../../includes/confirmation_mail.php');
		$message .= ob_get_contents();
		ob_end_clean();

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'To: '.$username.' <'.$email.'>' . "\r\n";
		$headers .= 'From: Vluds <no-reply@vluds.eu>' . "\r\n";

		mail($to, $subject, $message, $headers);
		
		$dataArray['result'] = true;

		return true;
	}
}

?>