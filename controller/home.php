<?php
require 'model/connexion.php'; // Connexion to DB

require 'model/count_manager.php'; // call count manager model

$manager = new CountManager($db); // access to db function

require 'view/header_view.php'; 
require 'view/add_view.php'; // formulaire caché d'ajout


// AJOUTER DE NOUVEAUX COMPTES
if(isset($_POST['add']) && isset($_POST['name'])){ // if form is completed and sent
  	require 'model/entities/count.php';
  	$count = new Count(array('name' => $_POST['name']));
  	$manager -> add($count);
}



// RETIRER DE L'ARGENT
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

// AJOUTER DE L'ARGENT
if(isset($_POST['addMoneyForm'])){ // Quand on clique sur retrait
  	require 'view/add_money_view.php';	// Affichage du formulaire
	$id = intval(htmlspecialchars($_POST['id'])); // Retient l'id cliqué
}

if(isset($_POST['addMoney']) && isset($_POST['id'])){
	require 'model/entities/count.php';

	$id = intval(htmlspecialchars($_POST['id'])); // Retient l'id cliqué
	$thisAmount = $manager -> getOneCount($id); // Selectionne le bon compte
	$newAmount = $thisAmount['amount'] + $_POST['amount']; // soustrait la nouvelle somme de l'ancienne
	$manager -> addMoney($id, $newAmount); // nouvelle somme en bdd
}

// EFFECTUER UN VIREMENT
if(isset($_POST['transferForm'])){
	require 'view/transfer_view.php';
}	
if(isset($_POST['transfer']) && !empty($_POST['transmitterCount']) && !empty($_POST['transferSum']) && !empty($_POST['receiverCount'])){
  	require 'model/entities/count.php';				
	$transmitterCount = floatval($_POST['transmitterCount']);
	$transferSum = floatval($_POST['transferSum']);
	$receiverCount = floatval($_POST['receiverCount']);

	if($transmitterCount != 0){
		if($transferSum != 0){
			if($receiverCount != 0){
				$comptemeteur = $manager -> getOneCount($transmitterCount);
				$newAmountTransmitter = $comptemeteur['amount'] - $transferSum;

				$comptereceveur = $manager -> getOneCount($receiverCount);
				$newAmountReceiver = $comptereceveur['amount'] + $transferSum;

				$manager -> addMoney($receiverCount, $newAmountReceiver);
				$manager -> remove($transmitterCount, $newAmountTransmitter);
			}
			else {
				echo 'le numéro de compte receveur doit être un nombre (différent de zéro)';
			}
		}
		else {
			echo 'la somme transferée doit être un nombre (différent de zéro)';
		}
	}
	else {
		echo 'le compte emmeteur doit être un nombre (différent de zéro)';
	}
}




// SUPPRIMER UN COMPTE
if(isset($_POST['delete'])){
	$id = intval(htmlspecialchars($_POST['id']));
	$manager -> delete($id);
}

$counts = $manager -> getCounts(); // display count listing


require 'view/home_view.php';
require 'view/footer_view.php';

