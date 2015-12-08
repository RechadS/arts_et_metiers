<?php 

include_once("includes/header.php");
include_once("includes/footer.php");
$html="
		<div class='container'>
			<div class='video'>
			<iframe src='https://player.vimeo.com/video/138849847' class='video-player' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
			</div>
			<form action=' method='POST' >
			<div class='formulaire'>
				<p><u>Prise de contact:</u></p><br>
				<label for='pseudo'> Pseudo :</label>
					<input type='text' id='pseudo' name='pseudo' placeholder='Ici votre pseudo' value=' /><br /><br>
			    <label for='email'> Email :</label>
					<input type='email' id='email' name='user_email' placeholder='Ici votre adresse mail' value='/><br><br>
				<label for='message'> Message :</label>
					<textarea id='message' name='message' rows='5' cols='25' placeholder='Ici votre message'></textarea><br>
				<div class='envoyer'>
					<input type='submit' name='envoyer' value=	'Envoyer' />
				</div>
			</div>
			<div class='plan'>
					<p>
						<u>Plan d'accès:</u><br><br>
						RER A B D Châtelet- les Halles<br>
						Métro:<br>
						ligne 3- Art-et-Métiers, Temple,République<br>
						ligne 4- Réaumre Sébastopol<br>
						Bus:				
					</p>
			</div>
		</div>
		";


echo $html; 
