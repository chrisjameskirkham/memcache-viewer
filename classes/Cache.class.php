<?php

define('ASC_TIME', 'ASC_TIME');

class Cache {

	public $items = array();

	public function addCacheItem($item){
		$this->items[] = $item;
	}


	public static function item_timestamp_sort($a, $b){

		if ($a->getTimestamp() == $b->getTimestamp())
			return 0;

		return ($a->getTimestamp() < $b->getTimestamp()) ? -1 : 1;

	}


	public function itemSort($order){

		if ($order == ASC_TIME){
			usort($this->items, array($this, "item_timestamp_sort"));
		}

	}//itemSort

}//Cache

?>
