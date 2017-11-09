<?php
require 'model/connexion.php'; // Connexion to DB

require 'model/count_manager.php'; // call count manager model

$manager = new CountManager($db); // access to db function

require 'view/header_view.php';
//require 'view/add_view.php'; // formulaire caché d'ajout
require 'view/home_view.php';