<?php include("includes/header.php");?>

	<div class="container">
		

		<article class="container">
			<form id="addForm" action="upload.php">
				<div class="form-group">
				  	<label for="titreLieu">Titre</label>
				  	<input type="text" class="form-control" name="titreLieu" id="titreLieu" placeholder="Titre">
				</div>
				<div class="form-group">
				  	<label for="descriptionLieu">Description</label>
				  	<input type="text" class="form-control" name="descriptionLieu" id="descriptionLieu" placeholder="Desctiption">
				</div>
				<div class="form-group">
					<label for="imageLieu">Image</label>
					<input type="file" name="imageLieu" id="imageLieu">
					<p class="help-block">Image du lieu</p>
				</div>
				<div class="form-group">
					<label for="categorieLieu">Catégorie</label>
					<select name="categorieLieu" id="categorieLieu">
						<option value="street-art">Street Art</option>
						<option value="historique">Historique</option>
						<option value="sorties">Sorties</option>
						<option value="pratique">Pratique</option>
					</select>
				</div>
				<button id="envoi_button" class="btn btn-default">Ajouter</button>
				<p id="avancement"></p>
				<p id="end"></p>
				<div id="progressbar"></div>
			</form>
		</article>
	</div>

<?php include("includes/footer.php");?>


</body>
</html>