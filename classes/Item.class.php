<?php

class Item {

	private $key;
	private $expiration_timestamp;
	private $slab;
	private $size;

	public __construct($key, $slab, $expiration_timestamp, $size){

		$this->key = $key;
		$this->slab = $slab;
		$this->expiration_timestamp = $expiration_timestamp;
		$this->size = $size;

	}//constructor

	public function getKey(){
		return $this->key;
	}

	public function getSlab(){
		return $this->slab;
	}

	public function getSize(){
		return $this->size;
	}

	public function getTime($timestamp = 0){
		return date('r', $this->expiration_timestamp - $timestamp);
	}

}//Item


?>
