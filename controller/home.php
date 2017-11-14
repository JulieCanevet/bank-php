<?php
require 'model/connexion.php'; // Connexion to DB

require 'model/count_manager.php'; // call count manager model

$manager = new CountManager($db); // access to db function

require 'view/header_view.php'; 
require 'view/add_view.php'; // add new account form


// ADD NEW ACCOUNT
if(isset($_POST['add']) && isset($_POST['name'])){ // if form is completed and sent
  	require 'model/entities/count.php';
  	$count = new Count(array('name' => $_POST['name']));
  	$manager -> add($count);
}



// WITHDRAW MONEY
if(isset($_POST['removeForm'])){ // whene we click on to remove money
  	require 'view/remove_view.php';	// display form
	$id = intval(htmlspecialchars($_POST['id'])); // clicked id retained
}

if(isset($_POST['remove']) && isset($_POST['id'])){
	  	require 'model/entities/count.php';

	$id = intval(htmlspecialchars($_POST['id'])); // clicked id retained
	$thisAmount = $manager -> getOneCount($id); // Select the right account
	$newAmount = $thisAmount['amount'] - $_POST['amount']; // subtract the new sum from the old
	$manager -> remove($id, $newAmount); // new sum in db
}

// ADD MONEY
if(isset($_POST['addMoneyForm'])){ // Whene we click on add money
  	require 'view/add_money_view.php';	// display form
	$id = intval(htmlspecialchars($_POST['id'])); // clicked id retained
}

if(isset($_POST['addMoney']) && isset($_POST['id'])){
	require 'model/entities/count.php';

	$id = intval(htmlspecialchars($_POST['id'])); // clicked id retained
	$thisAmount = $manager -> getOneCount($id); // Select the right account
	$newAmount = $thisAmount['amount'] + $_POST['amount']; // add the new sum to the old
	$manager -> addMoney($id, $newAmount); // new sum in db
}

// TRANSFER MONEY
if(isset($_POST['transferForm'])){
	require 'view/transfer_view.php';
}	
if(isset($_POST['transfer']) && !empty($_POST['transmitterCount']) && !empty($_POST['transferSum']) && !empty($_POST['receiverCount'])){
  	require 'model/entities/count.php';				
	
	$transmitterCount = floatval($_POST['transmitterCount']);
	$transferSum = floatval($_POST['transferSum']);
	$receiverCount = floatval($_POST['receiverCount']);

	if($transmitterCount != 0){ // check if every field is correctly filled
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




// DELETE AN ACCOUNT
if(isset($_POST['delete'])){
	$id = intval(htmlspecialchars($_POST['id']));
	$manager -> delete($id);
}

$counts = $manager -> getCounts(); // display count listing


require 'view/home_view.php';
require 'view/footer_view.php';

