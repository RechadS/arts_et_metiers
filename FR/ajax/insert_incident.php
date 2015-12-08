<?php
require_once('../includes/myPDO.include.php');
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
		    echo <<<JSON
		    [{"STATUS":"ERREUR_FICHIER","MESSAGE":"L'image ne peut pas être copiée, veuillez réessayer"}]
JSON;
	}
	else {
		if($_FILES['lieuImage']['size'] > (8*1024*1024)) {
		echo <<<JSON
		    [{"STATUS":"ERREUR_TAILLE","MESSAGE":"L'image ajoutée est trop volumineuse (8Mo maximum)"}]
JSON;
		}
		else {
			// on vérifie maintenant l'extension
			$type_file = $_FILES['lieuImage']['type'];
		
			if(!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {
			    echo <<<JSON
			    [{"STATUS":"ERREUR_FORMAT","MESSAGE":"Le format d'image n'est pas bon, veuillez la changer"}]
JSON;
			}
			else {
				// on copie le fichier dans le dossier de destination
				$info = new SplFileInfo($_FILES['lieuImage']['name']);
				$extension = $info->getExtension();
				$idfile = md5(uniqid(rand(), true));
				$name_file = $idfile . '.' . $extension;
		
				if(!compress($tmp_file, $content_dir . $name_file, 80)) {
					echo <<<JSON
					[{"STATUS":"ERREUR_COPIE","MESSAGE":"Impossible de copier l'image. Veuillez réessayer ou choisir une autre photo"}]
JSON;
				}
				else {
					$pdo = myPDO::getInstance() ;
		
					$req = $pdo->prepare(<<<SQL
					    INSERT INTO lieu(titre, contenu, image, categorie) VALUES (:titre, :contenu, :image, :categorie)
SQL
					) ;
		
					$req->execute(array(':titre' => $_POST['titreLieu'], ':contenu' => $_POST['desciptionLieu'], ':image' => $name_file, ':categorie' => $_POST['categorieLieu'])) ;
					
					echo <<<JSON
					[{"STATUS":"OK","MESSAGE":"L'enregistrement a bien été effectué"}]
JSON;
		
					
				}
			}
		}
	}
}
else {
	echo <<<JSON
	[{"STATUS":"ERREUR_INCOMPLET","MESSAGE":"Informations manquantes dans le formulaire, veuillez les préciser"}]
JSON;
}