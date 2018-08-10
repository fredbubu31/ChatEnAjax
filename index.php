<!DOCTYPE html>
<html lang="fr">
<!-- LIEN DU TUTO : https://www.youtube.com/watch?v=DdfHgJUgFkE -->
	<head>
		<meta charset="utf-8">
		<!--<title><?php echo $sitename; ?></title>	-->
		<title>Mon chat en AJAX</title>	
		<link rel="stylesheet" type="text/css" href="./assets/css/base.css" >
		<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Roboto:300,500,400,600' >							
	</head>

	<body>
	  <div class='header'>Mon super chat en AJAX ! </div>
	  
	  <div class='content'>
		<!-- On afficvhe les erreurs -->
		<div class='errorBloc'>
			
		</div>
		<!-- Les messages seront affichés ICI -->
		<div class='messageBloc'>
			
		</div>
		
		<!-- Formulaire d'envoi   -->
		<div class='formBloc'>
			<input type='text' class='pseudo' name='pseudo' value='' placeholder="Nom d'utilisateur">
			<textarea class='message' name='message' value='' placeholder="Votre message"></textarea>
			<br />
			<br />
			<div class='submit' onclick="envoyerMessage()">Envoyer</div>
		</div>
		
	  </div>
	  
	  </div>
	  
	  
	  <!-- JS files -->
	  <script type='text/javascript' src='./assets/js/base.js'></script>
	  <script type='text/javascript' src='./assets/js/jquery.js'></script>
	</body>
</html>