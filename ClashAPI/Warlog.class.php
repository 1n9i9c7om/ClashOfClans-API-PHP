<?php

class CoC_Warlog
{
	protected $logObj;

	/**
	 * Constructor of CoC_Warlog
	 * 
	 * @param $logObj, obtained by API.class.php
	 */
	public function __construct($logObj)
	{
		$this->logObj = $logObj;
	}
	
	public function getLog()
	{
		return $this->logObj;
	}
	
	/**
   	 * Gets the amount of recorded wars
   	 *
   	 * @return int
   	 */
	public function getLogEntryAmount()
	{
		return count($this->getLog()->items);
	}
	
	/**
   	 * Gets a log entry based on its index
   	 *
   	 * @return object
   	 */
	public function getLogEntryByIndex($index)
	{
		return $this->getLog()->items[$index];
	}
	
	/**
   	 * Gets a log entry based on its index
   	 *
	 * @param $result, can be 'win', 'draw' or 'lose'
   	 * @return object
   	 */
	public function getLatestByResult($result)
	{
		foreach($this->getLog()->items as $item)
		{
			if($item->result == $result)
			{
				return $item;
			}
			return "0";
		}
	}
}