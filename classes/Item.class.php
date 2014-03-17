<?php

class Item {

	private $key;
	private $expiration_timestamp;
	private $slab;
	private $size;
    private $content;

    public function __construct($key, $slab, $expiration_timestamp, $size, $content = ""){

		$this->key = $key;
		$this->slab = $slab;
		$this->expiration_timestamp = $expiration_timestamp;
		$this->size = $size;
        $this->content = $content;
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

	public function getTimestamp(){
		return $this->expiration_timestamp;
	}

    public function getContent()
    {
        return $this->content;
    }


	/*
	 * Returns a human-readable string of the timestamp. If a timestamp is passed,
	 * it is subtracted from the stored expiration date to give the remaining time
	 * and presented accordingly.
	 */
	public function getFormattedTime($timestamp = 0){

		if ($timestamp == 0)
			return date('r', $this->expiration_timestamp);
		else
			return self::getRemainingTime($timestamp, $this->expiration_timestamp);

	}//getTime


	private static function getRemainingTime($timestamp_from, $timestamp_to){

		$total = $timestamp_to - $timestamp_from;

		if ($total < 0) return "expired";

		$days = floor($total / (24 * 60 * 60));
		$total -= $days * (24 * 60 * 60);
		$hours = floor($total / (60 * 60));
		$total -= $hours * (60 * 60);
		$minutes = floor($total / 60);
		$total -= $minutes * 60;
		$seconds = $total;

		$output = '';
		if ($days > 0)
			$output .= "$days days";
		if ($hours > 0)
                        $output	.= ", $hours hrs";
		if ($minutes > 0)
                        $output	.= ", $minutes mins";
		if ($seconds > 0)
                        $output	.= ", $seconds secs";

		if (substr($output, 0, 2) == ', ')
			$output = substr($output, 2);

		return $output;

	}//getRemainingTime

}
