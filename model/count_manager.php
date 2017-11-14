<?php
class CountManager{

// PDO instance
  private $_db; 
  
  public function __construct($db) {
    $this->setDb($db);
  }
	public function setDb($db) 
	{
		$this->_db = $db;
	}
	
  	public function add($count){ // Add bank account
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

	public function getOneCount($id){ // Select only one account
		$req = $this -> _db -> prepare('SELECT * FROM counts
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id
		));
		$oneCount = $req -> fetch();
		return $oneCount;
	}

	public function delete($id){ // Delete one account
		$req = $this -> _db -> prepare('DELETE FROM counts
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id
		));
	}


	public function remove($id, $amount){ // Withdrawal operation
		$req = $this -> _db -> prepare('UPDATE counts SET amount = :amount
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id,
			'amount' => $amount
		));
	}

	public function addMoney($id, $amount){ // add money to an account
		$req = $this -> _db -> prepare('UPDATE counts SET amount = :amount
			WHERE id = :id');
		$req -> execute(array(
			'id' => $id,
			'amount' => $amount
		));
	}
}