<?php

/**
 * Class to get information about Clans. This class uses the data provided by the API.class.php
 */

class CoC_Clan
{
	protected $api;
	protected $tag; 

	/**
	 * Constructor of CoC_Clan
	 * 
	 * @param $tag, clantag as string (including #)
	 */
	public function __construct($tag) 
	{
		$this->api = new ClashOfClans();
		$this->tag = $tag;
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
		return $this->api->getClanByTag($this->tag)->name;
	}

	/**
	 * Gets the clan's description
	 *
	 * @return string, description
	 */
	public function getDescription()
	{
		return $this->api->getClanByTag($this->tag)->description;
	}

	/**
	 * Gets the clan's type
	 *
	 * @return string, type ("open", "inviteOnly" or "closed")
	 */
	public function getType()
	{
		return $this->api->getClanByTag($this->tag)->type;
	}

	/**
	 * Gets the clan's location ID. You can get more information about a location using the Location.class.php
	 *
	 * @return int, locationId
	 */
	public function getLocationId()
	{
		return $this->api->getClanByTag($this->tag)->location->id;
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

	/**
	 * Gets the clan's war frequency
	 *
	 * @return string, war-frequency ("always", "lessThanOncePerWeek", "once per week", "moreThanOncePerWeek" or "unknown")
	 */
	public function getWarFrequency()
	{
		return $this->api->getClanByTag($this->tag)->warFrequency;
	}

	/**
	 * Gets the clan's level
	 *
	 * @return int, level
	 */
	public function getLevel()
	{
		return $this->api->getClanByTag($this->tag)->clanLevel;
	}

	/**
	 * Gets the clan's war wins
	 *
	 * @return int, wins
	 */
	public function getWarWins()
	{
		return $this->api->getClanByTag($this->tag)->warWins;
	}

	/**
	 * Gets the clan's points (trophies)
	 *
	 * @return int, points
	 */
	public function getPoints()
	{
		return $this->api->getClanByTag($this->tag)->clanPoints;
	}

	/**
	 * Gets the clan's required trophies to join
	 *
	 * @return int, required trophies
	 */
	public function getRequiredTrophies()
	{
		return $this->api->getClanByTag($this->tag)->requiredTrophies;
	}

	/**
	 * Gets the amount of members in the clan
	 *
	 * @return int, membercount
	 */
	public function getMemberCount()
	{
		return $this->api->getClanByTag($this->tag)->members;
	}

	/**
	 * Gets a member from the clan by providing an index (usually clan-ranklist position - 1)
	 * Member.class.php will work with the returned class.
	 *
	 * @return stdClass, member
	 */
	public function getMemberByIndex($index)
	{
		return $this->api->getClanByTag($this->tag)->memberList[$index];
	}

	/**
	 * Gets an array of all members in the clan
	 *
	 * @return array (type of stdClass), all members
	 */
	public function getAllMembers()
	{
		return $this->api->getClanByTag($this->tag)->memberList;
	}

	/**
	 * Gets the first(!) member with the given name
	 * If there are multiple members using the same name inside the clan, use a different method.
	 *
	 * @return stdClass, member
	 */
	public function getMemberByName($name)
	{
		foreach ($this->api->getClanByTag($this->tag)->memberList as $member)
		{
			if ($member->name == $name)
			{
				return $member;
			}
		}
		return 0;
	} 
};