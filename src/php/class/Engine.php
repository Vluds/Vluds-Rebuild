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
}

?>