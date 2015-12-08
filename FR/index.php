<?php 

include_once("includes/header.php");


$html = "
	<div class='container'>
		
		<div class='slider'>
			<img src='../img/IMG_0137.jpg'>	
			<img class='logo_play' src='../img/play_logo.png'>
		</div>	
		
		<iframe src='https://www.google.com/maps/d/u/0/embed?mid=zWtSlTMSphxg.kIx5TmkZA0OA' class='maps'></iframe>
		<div class='information'>
						<div class='information-title'> <i class='fa fa-map-signs'></i> Autres quartiers à visiter</div>
						<div class='information-body'>
						<div href='#''>Le Marais</div>
						<div href='#'>Beaubourg</div>
						<div href='#'>Montorgeuil</div>
						</div>
						<div class='information-s-title'>     <i class='fa fa-search'></i>


Information complémentaires</div>
						
		</div>
	</div>
";

echo $html; 


include_once("includes/footer.php");