<?php
require_once('includes/myPDO.include.php');
header('Content-type: application/json') ;

function compress($source, $destination, $quality) {
 	$info = getimagesize($source); 
 	if ($info['mime'] == 'image/jpeg') 
 	$image = imagecreatefromjpeg($source); 
	
 	elseif ($info['mime'] == 'image/gif') 
 	$image = imagecreatefromgif($source); 
	
 	elseif ($info['mime'] == 'image/png') 
 	$image = imagecreatefrompng($source); 
	
 	return imagejpeg($image, $destination, $quality);
}

if(!empty($_POST['titreLieu']) && !empty($_POST['descriptionLieu']) && !empty($_POST['categorieLieu']) ) {
	$content_dir = '../img/';
	$tmp_file = $_FILES['lieuImage']['tmp_name'];
	
	if(isset($_FILES) && !is_uploaded_file($tmp_file)) {
		    echo "L'image ne peut pas être copiée, veuillez réessayer";
	}
	else {
		if($_FILES['lieuImage']['size'] > (8*1024*1024)) {
		echo "L'image ajoutée est trop volumineuse (8Mo maximum)";
		}
		else {
			// on vérifie maintenant l'extension
			$type_file = $_FILES['lieuImage']['type'];
		
			if(!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {
			    echo "Le format d'image n'est pas bon, veuillez la changer";
			}
			else {
				// on copie le fichier dans le dossier de destination
				$info = new SplFileInfo($_FILES['lieuImage']['name']);
				$extension = $info->getExtension();
				$idfile = md5(uniqid(rand(), true));
				$name_file = $idfile . '.' . $extension;
		
				if(!compress($tmp_file, $content_dir . $name_file, 80)) {
					echo "Impossible de copier l'image. Veuillez réessayer ou choisir une autre photo";
				}
				else {
					$pdo = myPDO::getInstance() ;
		
					$req = $pdo->prepare(
					    "INSERT INTO lieu(titre, contenu, image, categorie) VALUES (:titre, :contenu, :image, :categorie)"
					) ;
		
					$req->execute(array(':titre' => $_POST['titreLieu'], ':contenu' => $_POST['desciptionLieu'], ':image' => $name_file, ':categorie' => $_POST['categorieLieu'])) ;
					
					echo "Ajout Réussi";
				}
			}
		}
	}
}
else {
	echo "tous les champs n'ont pas été renseignés";
}