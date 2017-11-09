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
	
  	public function add($vehicle){ // Add vehicle
	    $req = $this -> _db ->prepare('INSERT INTO vehicle (type, color, price, wheelsNb) VALUES(:type, :color, :price, :wheelsNb)');
	    $req -> execute(array(
	    'type' => $vehicle -> getType(),
	    'color' => $vehicle -> getColor(),
	    'price' => $vehicle -> getPrice(),
	    'wheelsNb' => $vehicle -> getWheelsNb()
	    ));
	}

	public function getVehicles($ordre){ //sort the listing in home page
		$sql = 'SELECT * FROM vehicle ORDER BY ';
		if ($ordre == 'type') {
			$sql .= 'type';
		} elseif ($ordre == 'price') {
			$sql .= 'price';
		} elseif ($ordre == 'color') {
			$sql .= 'color';
		}
		$req = $this->_db->query($sql);
		$details = $req -> fetchAll();
		return $details;
	}

	public function edit($vehicle, $id){ // edit cibling vehicle
		$req = $this -> _db -> prepare('UPDATE vehicle 
			SET type = :newtype, color = :newcolor, price = :newprice, wheelsNb = :wheelsNb
			WHERE id=:id');
		$req -> execute(array(
			'newtype' => $vehicle -> getType(),
			'newcolor' => $vehicle -> getColor(),
			'newprice' => $vehicle -> getPrice(),
			'wheelsNb' => $vehicle -> getWheelsNb(), 
			'id' => $id
		));
	}

	public function delete($id){ // delete cibling vehicle
		$req = $this -> _db -> prepare('DELETE FROM vehicle
		WHERE id = :id');
		$req -> execute(array(
			'id' => $id
		));
	}
}

}