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
			<?php
			$pdo = myPDO::getInstance();

			// On récupère tout le contenu de la table jeux_video
			$reponse = $pdo->query("SELECT * FROM lieu where categorie='sortie'");

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>

			    <div class="col-sm-6 col-md-4">
			      <div class="thumbnail">
			        <img src="<?php echo $donnees['image']; ?>" alt="">
			        <div class="caption">
			          <h3><?php echo $donnees['titre']; ?></h3>
			          <p><?php echo $donnees['contenu']; ?></p>
			          
			        </div>
			      </div>
			    </div>  


			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

			?>
		</article>
	</div>


<?php include("includes/footer.php");?>

</body>
</html>