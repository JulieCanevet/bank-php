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

if(isset($_POST['remove'])){
  	require 'view/remove_view.php';	
	$id = intval(htmlspecialchars($_POST['id']));
	
	if(isset($_POST['amount'])){
		if(isint($_POST['amount'])){
			$manager -> remove($id, $_POST['amount']);

		}
		else {
			echo 'entrez un nombre';
		}
	}
	else {
		echo 'entrez un nombre';
	}
}

if(isset($_POST['delete'])){
	$id = intval(htmlspecialchars($_POST['id']));
	$manager -> delete($id);
}

$counts = $manager -> getCounts(); // display count listing


require 'view/home_view.php';
require 'view/footer_view.php';