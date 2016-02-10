<?php

class CoC_League
{
	protected $api;
	protected $leagueId;
	protected $league = NULL;
    
	/**
	 * Constructor of CoC_League
	 * 
	 * @param $leagueId
	 */
	public function __construct($league)
	{
		$this->api      = new ClashOfClans();
		if(is_object($league))
		{
			$this->league = $league;
		}
		else
		{
			$this->leagueId = $league;
			$this->getLeague();
		}
	}
    
	/**
	 * Gets an stdClass containing league-information
	 *
	 * @return stdClass, league
	 */
	protected function getLeague()
	{
		if($this->league == NULL)
		{
			foreach ($this->api->getLeagueList()->items as $league) 
			{
				if ($league->id == $this->leagueId) 
				{
					$this->league = $league;
					return $this->league;
				}
			}
			return 0;
		}
		else
		{
			return $this->league;
		}
		
	}
    
	/**
	 * Sets the league by providing it's exact name
	 *
	 * @param string, league name
	 * @return bool, success or fail
	 */
	public function setLeagueByName($name)
	{
		foreach ($this->api->getLeagueList()->items as $league) 
		{
			if ($league->name == $name) 
			{
				$this->leagueId = $league->id;
				$this->league = $league;
				return 1;
			}
		}
		return 0;
	}
    
	/**
	 * Gets the league ID
	 *
	 * @return int
	 */
	 public function getLeagueId()
	 {
		 return $this->getLeague()->id;
	 }
	
	/**
	 * Gets the league name
	 *
	 * @return string, name
	 */
	public function getLeagueName()
	{
		return $this->getLeague()->name;
	}
    
	/**
	 * Sets the league by providing it's exact name
	 *
	 * @param (optional) $size ("tiny", "small", "medium")
	 * @return string, URL to the picture
	 */
	public function getLeagueIcon($size = "") //small, tiny, medium
	{
		$league = $this->getLeague();
		switch ($size) {
			case "small":
				return $league->iconUrls->small;
				break;
			case "medium":
				return $league->iconUrls->medium;
				break;
			case "tiny":
				return $league->iconUrls->tiny;
				break;
			default:
				return $league->iconUrls->small; //medium is not always available, so lets chose small on default
				break;
		}
	}
}

?>