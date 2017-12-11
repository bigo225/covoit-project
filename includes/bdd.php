<?php
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=db_covoit', 'root', '');
	}catch (Exception $e)
	{
	die('Erreur : ' . $e->getMessage());
	}
?>