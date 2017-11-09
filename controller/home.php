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

$counts = $manager -> getCounts(); // display count listing



require 'view/home_view.php';
require 'view/footer_view.php';