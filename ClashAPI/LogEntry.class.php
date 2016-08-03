<?php

class CoC_LogEntry
{
	protected $logEntry;
	
	/**
	 * Constructor of CoC_Warlog
	 * 
	 * @logEntry $logEntry, obtained by Warlog.class.php
	 */
	public function __construct($logEntry)
	{
		$this->logEntry = $logEntry;
	}
	
	protected function getLogEntry()
	{
		return $this->logEntry;
	}
	
	public function getResult()
	{
		return $this->getLogEntry()->result;
	}
	
	public function getEndTime()
	{
		return $this->getLogEntry()->endTime;
	}
	
	public function getTeamSize()
	{
		return $this->getLogEntry()->teamSize();
	}
	
	public function getClanTag()
	{
		return $this->getLogEntry()->clan->tag;
	}
	
	public function getClanName()
	{
		return $this->getLogEntry()->clan->name;
	}
	
	public function getClanBadeUrl($size = "")
	{
		switch ($size)
		{
			case "small":
				return $this->getLogEntry()->clan->badgeUrls->small; 
				break;
			case "medium":
				return $this->getLogEntry()->clan->badgeUrls->medium;
				break;
			case "large":
				return $this->getLogEntry()->clan->badgeUrls->large;
				break;
			default:
				return $this->getLogEntry()->clan->badgeUrls->large; //return the largest because it can be resized using HTML
				break;
		}
	}
	
	public function getClanLevel()
	{
		return $this->getLogEntry()->clan->clanLevel;
	}
	
	public function getClanAttacks()
	{
		return $this->getLogEntry()->clan->attacks;
	}
	
	public function getClanStars()
	{
		return $this->getLogEntry()->clan->stars;
	}
	
	public function getDestructionPercentage()
	{
		return $this->getLogEntry()->clan->destructionPercentage;
	}
	
	public function getExpEarned()
	{
		return $this->getLogEntry()->clan->expEarned;
	}
	
	public function getOpponentTag()
	{
		return $this->getLogEntry()->opponent->tag;
	}
	
	public function getOpponentName()
	{
		return $this->getLogEntry()->opponent->name;
	}
	
	public function getOpponentBadgeUrls($size = "")
	{
		switch ($size)
		{
			case "small":
				return $this->getLogEntry()->opponent->badgeUrls->small; 
				break;
			case "medium":
				return $this->getLogEntry()->opponent->badgeUrls->medium;
				break;
			case "large":
				return $this->getLogEntry()->opponent->badgeUrls->large;
				break;
			default:
				return $this->getLogEntry()->opponent->badgeUrls->large; //return the largest because it can be resized using HTML
				break;
		}
	}
	
	public function getOpponentLevel()
	{
		return $this->getLogEntry()->opponent->clanLevel;
	}
	
	public function getOpponentStars()
	{
		return $this->getLogEntry()->opponent->stars;
	}
	
	public function getOpponentDestructionPercentage()
	{
		return $this->getLogEntry()->opponent->destructionPercentage;
	}
}