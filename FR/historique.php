<?php include_once("includes/header.php"); ?>
<?php include("includes/myPDO.include.php");

	
?>


	<div class="block">
		<div class="info">
				<img src="chemin" alt="description">
				<p> Bienvenue sur la rubrique historique .<br>
				
				</p>
		</div>	

		<article class="photo row masonry-container">
			<div class="gamma-container gamma-loading" id="gamma-container">

					<ul class="gamma-gallery">

						
			<?php
			$pdo = myPDO::getInstance();

			// On récupère tout le contenu de la table jeux_video
			$reponse = $pdo->query("SELECT * FROM lieu where categorie='historique'");

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>

			    <li>
			    	<div data-alt="<?php echo $donnees['titre']; ?>" data-description="<h3><?php echo $donnees['titre']; ?></h3>
			          <p><?php echo $donnees['contenu']; ?></p>>" data-max-width="1800" data-max-height="1350">
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="1300"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="1000"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="700"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="300"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="200"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg" data-min-width="140"></div>
						<div data-src="http://localhost/Arts_et_Metiers/img/metro1.jpg"></div>
						<noscript>
							<img src="http://localhost/Arts_et_Metiers/img/metro1.jpg" alt="img03"/>
						</noscript>
					</div>
			    </li>  


			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

			?>
		</article>
	</div>


<?php include("includes/footer.php");?>
<script type="text/javascript">
	
	$(document).ready(function() {

		var GammaSettings = {
				// order is important!
				viewport : [ {
					width : 1200,
					columns : 5
				}, {
					width : 900,
					columns : 4
				}, {
					width : 500,
					columns : 3
				}, { 
					width : 320,
					columns : 2
				}, { 
					width : 0,
					columns : 2
				} ]
		};

		Gamma.init( GammaSettings );

	});

</script>
</body>
</html>

