<?php
	$sitename = 'Mon chat en AJAX';
	
	/* ANCIENNE VERSION */
	
	/*$dbef = mysqli_connect('localhost','root','') or die(mysqli_error());
	mysqli_select_db($dbef,'chat_tutoriel') or die(mysqli_error()); */
	
	/* Depuis PHP 7, il faut mettre mysqli au lieu de mysql */
	
	/*  NOUVELLE VERSION : UTILISATION DE PDO  */
	$db = new PDO('mysql:host=localhost;dbname=chat_tutoriel','root','');
	
	$query = $db->query("SELECT * FROM messages");
	
	while($chat = $query->fetch())
	{
		echo $chat['auteur']." "." : ".$chat['message']."<br />";
	
	}
	
?>