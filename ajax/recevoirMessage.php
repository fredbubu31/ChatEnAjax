<!-- Fichier : recevoirMessage -->

<?php
	include('../global.php');
	
	/* ON SELECTIONNE LES MESSAGES DANS LA BDD */  
	
	$db = new PDO('mysql:host=localhost;dbname=chat_tutoriel','root','');
	
	$resultats = $db->query("SELECT * FROM messages ORDER BY id LIMIT 0,22");
	$messages = $resultats->fetchAll();
	
	/* Ce qui avait à la BASE  */
	
	/*$getMessagesSQL 	= mysqli_query('SELECT * FROM messages ORDER BY id LIMIT 0,22');    /* On va afficher les 22 derniers */
	/*$getMessagesCOUNT	= mysqli_num_rows($getMessagesSQL);*/
	
	if($messages < 1){
	/*if($getMessagesCOUNT < 1) {*/
		echo 'aucun messages !';
	} else {
		$i;
		/* ANCIENNE LIGNE ci-dessous : */
		/*while($getMessages = mysql_fetch_assoc($getMessagesSQL))*/
		while($messages = $resultats->fetch(PDO::FETCH_ASSOC)) {
			$i++;
			
			if($i%2 == 0){
				$grey = 'gris';
			}else {
				$grey = '';
			}
			
			$id 	 = htmlentities($resultats['id']);
			$auteur  = htmlentities($resultats['auteur']);
			$message = htmlentities($resultats['message']);
			$time 	 = htmlentities($resultats['time']);
			
			echo $auteur.' a envoyé '.$message;
		}
	}
	
?>	
		
		
		