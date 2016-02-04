<?php

class CoC_Clan
{
	protected $api;
	protected $tag; 

	public function __construct($tag) 
	{
		$this->api = new ClashOfClans();
		$this->tag = $tag;
   	}
	
	//Clan
   	public function getTag()
   	{
   		return $this->tag;
   	}

	public function getName()
	{
		return $this->api->getClanByTag($this->tag)->name;
	}

	public function getDescription()
	{
		return $this->api->getClanByTag($this->tag)->description;
	}

	public function getType()
	{
		return $this->api->getClanByTag($this->tag)->type;
	}

	public function getLocationId()
	{
		return $this->api->getClanByTag($this->tag)->location->id;
	}

	public function getBadgeUrl($size = "") //small, large, medium.
	{
		switch($size)
		{
			case "small":
				return $this->api->getClanByTag($this->tag)->badgeUrls->small; 
				break;
			case "medium":
				return $this->api->getClanByTag($this->tag)->badgeUrls->medium;
				break;
			case "large":
				return $this->api->getClanByTag($this->tag)->badgeUrls->large;
				break;
			default:
				return $this->api->getClanByTag($this->tag)->badgeUrls->large; //return the largest because it can be resized using HTML
				break;
		}
		
	}

	public function getWarFrequency()
	{
		return $this->api->getClanByTag($this->tag)->warFrequency;
	}

	public function getLevel()
	{
		return $this->api->getClanByTag($this->tag)->clanLevel;
	}

	public function getWarWins()
	{
		return $this->api->getClanByTag($this->tag)->warWins;
	}

	public function getPoints()
	{
		return $this->api->getClanByTag($this->tag)->clanPoints;
	}

	public function getRequiredTrophies()
	{
		return $this->api->getClanByTag($this->tag)->requiredTrophies;
	}

	public function getMemberCount()
	{
		return $this->api->getClanByTag($this->tag)->members;
	}

	//Member
	public function getMemberByIndex($index)
	{
		return $this->api->getClanByTag($this->tag)->memberList[$index];
	}

	public function getAllMembers()
	{
		return $this->api->getClanByTag($this->tag)->memberList;
	}

	public function getMemberByName($name)
	{
		foreach($this->api->getClanByTag($this->tag)->memberList as $member)
		{
			if($member->name == $name)
			{
				return $member;
			}
		}
		return 0;
	} 
};
?>