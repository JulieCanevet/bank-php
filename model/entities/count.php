<?php
class Count {
	protected $_id;
	protected $_name;
	protected $_amount;

	public function __construct(array $data){
		$this -> hydrate($data);
	}

	public function hydrate(array $data){
		foreach ($data as $key => $value) {
	 	    	$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)) {
	    		$this -> $method($value);
			}
		}
	}

// SETTERS
	public function setId($id){
		$this -> _id = (int)$id;
	}
	public function setName($name){
		if(is_string($name)){
			$this -> _name = $name;
		}
	}
	public function setAmount($amount){
		$this -> _amount = $amount;
	}

// GETTERS 
	public function getId(){return $this -> _id;}
	public function getName(){return $this -> _name;}
	public function getAmout(){return $this -> _amount;}
}