<?php

class CoC_Member
{
	protected $memberObj;

	/**
	 * Constructor of CoC_Member
	 * 
	 * @param $memberObj, obtained by Clan.class.php
	 */
	public function __construct($memberObj)
	{
		$this->memberObj = $memberObj;
	}
	
	/**
	 * Gets the members tag (id)
	 *
	 * @return string, tag
	 */
	public function getTag()
	{
		return $this->memberObj->tag;
	}

	/**
	 * Gets the members name
	 *
	 * @return string, name
	 */
	public function getName()
	{
		return $this->memberObj->name;
	}

	/**
	 * Gets the members role ("member", "admin", "coLeader", "leader")
	 *
	 * @return string, role
	 */
	public function getRole()
	{
		return $this->memberObj->role;
	}

	/**
	 * Gets the members level
	 *
	 * @return int, level
	 */
	public function getLevel()
	{
		return $this->memberObj->expLevel;
	}

	/**
	 * Gets the members league ID
	 *
	 * @return int, league ID
	 */
	public function getLeagueId()
	{
		return $this->memberObj->league->id;
	}

	/**
	 * Gets the members league
 	 *
 	 * @return stdClass
 	 */
	public function getLeague()
	{
		return $this->memberObj->league;
	}

	/**
	 * Gets the members trophy-count
	 *
	 * @return int, trophies
	 */
	public function getTrophies()
	{
		return $this->memberObj->trophies;
	}

	/**
	 * Gets the members rank inside the clan-ranklist
	 *
	 * @return int, rank
	 */
	public function getClanRank()
	{
		return $this->memberObj->clanRank;
	}

	/**
	 * Gets the members previous rank inside the clan-ranklist
	 *
	 * @return int, rank
	 */
	public function getPreviousClanRank()
	{
		return $this->memberObj->previousClanRank;
	}

	/**
	 * Gets the amount of donations done by the member
	 *
	 * @return int, donations
	 */
	public function getDonations()
	{
		return $this->memberObj->donations;
	}

	/**
	 * Gets the amount of donations received by the member
	 *
	 * @return int, donations
	 */
	public function getDonationsReceived()
	{
		return $this->memberObj->donationsReceived;
	}
}

?>