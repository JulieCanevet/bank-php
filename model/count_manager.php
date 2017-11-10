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

	public function getOneCount($id){
		$req = $this -> _db -> prepare('SELECT * FROM counts
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id
		));
		$oneCount = $req -> fetch();
		return $oneCount;
	}

	public function delete($id){
		$req = $this -> _db -> prepare('DELETE FROM counts
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id
		));
	}


	public function remove($id, $amount){ // Operation retrait
		$req = $this -> _db -> prepare('UPDATE counts SET amount = :amount
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id,
			'amount' => $amount
		));
	}
}









