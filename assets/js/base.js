/*  Fichier : base.js */

/* CHERGER LES MESSAGES */
setInterval(function() {
	$('.messageBloc').load('./ajax/recevoirMessage.php'); 
}, 1000);

/* ENVOYER MESSAGE */
function envoyerMessage() {
	$('.submit').text('Envoie en cours');
	
	var pseudonyme_em 	= $('.pseudo').val();
	var message_em 		= $('.message').val();
	
	$.ajax({
		url: './ajax/envoyerMessage.php',
		type: 'POST',
		data: { em_pseudo : pseudonyme_em, em_message : message_em},		
		dataType: 'json',
		success : function(data) {
						$('.submit').text('Envoyer');
						
						switch(data.return) {
							case '1':
								$('.errorBloc').text('Merci de remplir les champs vides').slideDown(200);
							break;
							case '2':
								$('.errorBloc').text('VOus pouvez envoyer qu un message toutes les 2 secondes').slideDown(200);
							break;
							case '3':
								$('.errorBloc').text('Le chat a été vidé !!! ').slideDown(200);
								$('input,textarea').val('');
							break;
							case '4':
								$('input,textarea').val('');
							break;
										
							default:
								$('.errorBloc').text('Oupss, une erreur est survenue !').slideDown(200);
								break;
						}
					} 
		});					
}
