<?php

/**
 * Class to get information about Clans. This class uses the data provided by the API.class.php
 */

class CoC_Clan
{
	protected $api;
	protected $tag; 
	protected $clan = NULL;

	/**
	 * Constructor of CoC_Clan
	 * Either pass the clan tag or a stdClass containing all clan information.
	 *
	 * @param $tagOrClass
	 * @param (optional) $isTag
	 */
	public function __construct($tagOrClass) 
	{
		$this->api = new ClashOfClans();
		if(is_string($tagOrClass))
		{
			$this->tag = $tagOrClass;
			$this->getClan();
		}
		else
		{
			$this->clan = $tagOrClass;
		}
		
   	}
	
   	protected function getClan()
   	{
   		if($this->clan == NULL)
		{
			$this->clan = $this->api->getClanByTag($this->tag);
		}
		return $this->clan;
   	}

	/**
	 * Gets the clantag
	 *
	 * @return string, clantag
	 */
   	public function getTag()
   	{
   		return $this->tag;
   	}

   	/**
   	 * Gets the clan's name
   	 *
   	 * @return string, name
   	 */
	public function getName()
	{
		return $this->getClan()->name;
	}

	/**
	 * Gets the clan's description
	 *
	 * @return string, description
	 */
	public function getDescription()
	{
		return $this->getClan()->description;
	}

	/**
	 * Gets the clan's type
	 *
	 * @return string, type ("open", "inviteOnly" or "closed")
	 */
	public function getType()
	{
		return $this->getClan()->type;
	}

	/**
	 * Gets the clan's location ID. You can get more information about a location using the Location.class.php
	 *
	 * @return int, locationId
	 */
	public function getLocationId()
	{
		return $this->getClan()->location->id;
	}
	
	/**
	 * Gets the clan's location.
	 *
	 * @return stdClass
	 */
	public function getLocation()
	{
		return $this->getClan()->location;
	}

	/**
	 * Get's the URL to the clan badge in the given size.
	 * 
	 * @param (optional) $size ("small", "medium", "large")
	 * @return string, URL to the picture
	 */
	public function getBadgeUrl($size = "") //small, large, medium.
	{
		switch ($size)
		{
			case "small":
				return $this->getClan()->badgeUrls->small; 
				break;
			case "medium":
				return $this->getClan()->badgeUrls->medium;
				break;
			case "large":
				return $this->getClan()->badgeUrls->large;
				break;
			default:
				return $this->getClan()->badgeUrls->large; //return the largest because it can be resized using HTML
				break;
		}
		
	}

	/**
	 * Gets the clan's war frequency
	 *
	 * @return string, war-frequency ("always", "lessThanOncePerWeek", "once per week", "moreThanOncePerWeek" or "unknown")
	 */
	public function getWarFrequency()
	{
		return $this->getClan()->warFrequency;
	}

	/**
	 * Gets the clan's level
	 *
	 * @return int, level
	 */
	public function getLevel()
	{
		return $this->getClan()->clanLevel;
	}

	/**
	 * Gets the clan's war wins
	 *
	 * @return int, wins
	 */
	public function getWarWins()
	{
		return $this->getClan()->warWins;
	}

	/**
	 * Gets the clan's war win streak
	 *
	 * @return int, win streak
	 */
	public function getWarWinStreak()
	{
		return $this->getClan()->warWinStreak;
	}

	/**
	 * Gets the clan's points (trophies)
	 *
	 * @return int, points
	 */
	public function getPoints()
	{
		return $this->getClan()->clanPoints;
	}

	/**
	 * Gets the clan's required trophies to join
	 *
	 * @return int, required trophies
	 */
	public function getRequiredTrophies()
	{
		return $this->getClan()->requiredTrophies;
	}

	/**
	 * Gets the amount of members in the clan
	 *
	 * @return int, membercount
	 */
	public function getMemberCount()
	{
		return $this->getClan()->members;
	}

	/**
	 * Gets a member from the clan by providing an index (usually clan-ranklist position - 1)
	 * Member.class.php will work with the returned class.
	 *
	 * @return stdClass, member
	 */
	public function getMemberByIndex($index)
	{
		return $this->getClan()->memberList[$index];
	}

	/**
	 * Gets an array of all members in the clan
	 *
	 * @return array (type of stdClass), all members
	 */
	public function getAllMembers()
	{
		return $this->getClan()->memberList;
	}

	/**
	 * Gets the first(!) member with the given name
	 * If there are multiple members using the same name inside the clan, use a different method.
	 *
	 * @return stdClass, member
	 */
	public function getMemberByName($name)
	{
		foreach ($this->api->getClan()->memberList as $member)
		{
			if ($member->name == $name)
			{
				return $member;
			}
		}
		return 0;
	} 
};