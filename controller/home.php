<?php
require 'model/connexion.php'; // Connexion to DB

require 'model/count_manager.php'; // call count manager model

$manager = new CountManager($db); // access to db function

require 'view/header_view.php'; 
require 'view/add_view.php'; // formulaire caché d'ajout



if(isset($_POST['add']) && isset($_POST['name'])){ // if form is completed and sent
  	require 'model/entities/count.php';
  	$count = new Count(array('name' => $_POST['name']));
  	$manager -> add($count);
}




if(isset($_POST['removeForm'])){ // Quand on clique sur retrait
  	require 'view/remove_view.php';	// Affichage du formulaire
	$id = intval(htmlspecialchars($_POST['id'])); // Retient l'id cliqué
}

if(isset($_POST['remove']) && isset($_POST['id'])){
	  	require 'model/entities/count.php';

	$id = intval(htmlspecialchars($_POST['id'])); // Retient l'id cliqué
	$thisAmount = $manager -> getOneCount($id); // Selectionne le bon compte
	$newAmount = $thisAmount['amount'] - $_POST['amount']; // soustrait la nouvelle somme de l'ancienne
	$manager -> remove($id, $newAmount); // nouvelle somme en bdd
}



if(isset($_POST['delete'])){
	$id = intval(htmlspecialchars($_POST['id']));
	$manager -> delete($id);
}

$counts = $manager -> getCounts(); // display count listing


require 'view/home_view.php';
require 'view/footer_view.php';