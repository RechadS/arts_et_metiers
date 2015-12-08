<?php 

$html ="<!doctype html>
<html lang='fr'>
<head>
  <meta charset='utf-8'>
  <title>Arts & Métiers</title>
  <link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
  <link rel='stylesheet' type='text/css' href='../css/gamma.css'>
  <link rel='stylesheet' type='text/css' href='../css/style.css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
</head>
<body>
<header class='header'>
	<div class='logo'>
		<img src='../img/logo_site1.png' width='100%'>
	</div></br>
	<div class='menu'>
		<li class='active'><a href='index.php'>Accueil</a></li>
		<li><a href='art_streetart.php'>Art / StreetArt</a></li>
		<li><a href='historique.php'>Historique</a></li>
		<li><a href='sortie.php'>Sorties</a></li>
		<li><a href='lieux_pratique.php'>Lieux pratiques</a></li>
		<li><a href='information.php'>Informations</a></li>
		<li><a href='livre.php'>Livre d or</a></li>
	</div>
	<div class='lng'>
		<img src='../img/fr.png' class='flag'>
		<img src='../img/en.png' class='flag'>
		<img src='../img/imp.jpg' class='flag'>
	</div>
</header>";
echo $html;