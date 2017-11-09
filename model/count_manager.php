<?php
class CountManager{

// Instance de PDO
  private $_db; 
  
  public function __construct($db) {
    $this->setDb($db);
  }
	public function setDb($db) 
	{
		$this->_db = $db;
	}
	
  	public function add($count){ // Add vehicle
	    $req = $this -> _db ->prepare('INSERT INTO counts (name) VALUES(:name)');
	    $req -> execute(array(
	    'name' => $_POST['name']
	    ));
	}

	public function getCounts(){ //sort the listing in home page
		$req = $this -> _db -> query('SELECT * FROM counts');
		$counts = $req -> fetchAll();
		return $counts;
	}
}