<!-- Fichier : envoyerMessage -->

<?php
	include('../global.php');
	
	header('Content-type: application/json');
	/* Ligne ci-dessous rajoutée, à la base elle n'y est pas !!! */
	$db = new PDO('mysql:host=localhost;dbname=chat_tutoriel','root','');
	
	if(empty($_POST['em_pseudo']) || empty($_POST['em_message'])) {
		$return = '1';
	} else {
		$pseudo  = trim(htmlentities(htmlspecialchars($_POST['em_pseudo'])));
		$message = trim(htmlentities(htmlspecialchars($_POST['em_message'])));
		
		/*$getTimeSQL   = mysql_query('SELECT * FROM messages WHERE auteur = "'.$pseudo'" ORDER BY id DESC LIMIT 0,1');*/
		/* Nvlle version de la ligne ci-dessus : */
		$getTimeSQL = $db->query("SELECT * FROM messages WHERE auteur = "'.$pseudo'" ORDER BY id DESC LIMIT 0,1");
		
		/*$getTimeCOUNT = mysql_num_rows($getTimeSQL);*/
		/* Nvlle version de la ligne ci-dessus : */
		$getTimeCOUNT = $getTimeSQL->fetchAll();
		
		/*$getTime	  = mysql_fetch_assoc($getTimeSQL);*/
		/* Nvlle version de la ligne ci-dessus : */
		$getTime	  = $getTimeSQL->fetch(PDO::FETCH_ASSOC);
		
		/* ON VERIFIE SI UN MESSAGE A ETE ENVOYE 2 SECONDE AVANT. Si la personne ne SPANM PAS  */
		if($getTime+2 > time()){
			$return = '2';
		} else {
			if($message == '/clear') {
				/*mysql_query('TRUNCATE TABLE messages');*/
				/* NOUVELLE VERSION CI-DESSOUS : */
				$db->query("TRUNCATE TABLE messages");
				$return = '3';
			} else {
				/*mysql_query('INSERT INTO messages(auteur,message,time) VALUES("'.$pseudo.'","'.$message.'","'.time().'")');*/
				/* NOUVELLE VERSION CI-DESSOUS : */
				$db->query("INSERT INTO messages(auteur,message,time) VALUES("'.$pseudo.'","'.$message.'","'.time().'")");
				$return = '4';
			}
		}		
	
		
	}
	
	echo json_encode(array(
		'return' => $return
		));

?>